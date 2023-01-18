<?php

namespace App\Http\Controllers\Customer\Auth;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\Wishlist;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\DB;
use App\CPU\SMS_module;
use function App\CPU\translate;

class LoginController extends Controller
{
    public $company_name;

    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function captcha($tmp)
    {

        $phrase = new PhraseBuilder;
        $code = $phrase->build(4);
        $builder = new CaptchaBuilder($code, $phrase);
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        $builder->build($width = 100, $height = 40, $font = null);
        $phrase = $builder->getPhrase();

        if(Session::has('default_captcha_code')) {
            Session::forget('default_captcha_code');
        }
        Session::put('default_captcha_code', $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function login()
    {
        session()->put('keep_return_url', url()->previous());
        return view('customer-view.auth.login');
    }

    public function submit(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required',
        //     'password' => 'required|min:8'
        // ]);

        //recaptcha validation
        // $recaptcha = Helpers::get_business_settings('recaptcha');
        // if (isset($recaptcha) && $recaptcha['status'] == 1) {
        //     try {
        //         $request->validate([
        //             'g-recaptcha-response' => [
        //                 function ($attribute, $value, $fail) {
        //                     $secret_key = Helpers::get_business_settings('recaptcha')['secret_key'];
        //                     $response = $value;
        //                     $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;
        //                     $response = \file_get_contents($url);
        //                     $response = json_decode($response);
        //                     if (!$response->success) {
        //                         $fail(\App\CPU\translate('ReCAPTCHA Failed'));
        //                     }
        //                 },
        //             ],
        //         ]);
        //     } catch (\Exception $exception) {}
        // } else {
        //     if (strtolower($request->default_captcha_value) != strtolower(Session('default_captcha_code'))) {
        //         Session::forget('default_captcha_code');
        //         return back()->withErrors(\App\CPU\translate('Captcha Failed'));
        //     }
        // }

        $remember = ($request['remember']) ? true : false;

        $user = User::where(['phone' => $request->user_id])->orWhere(['email' => $request->user_id])->first();

        if (isset($user) == false) {
            Toastr::error('Credentials do not match or account has been suspended.');
            return back()->withInput();
        }

        $phone_verification = Helpers::get_business_settings('phone_verification');
        $email_verification = Helpers::get_business_settings('email_verification');
        if ($phone_verification && !$user->is_phone_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }
        if ($email_verification && !$user->is_email_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }

        if (isset($user) && $user->is_active && auth('customer')->attempt(['email' => $user->email, 'password' => $request->password], $remember)) {
            session()->put('wish_list', Wishlist::where('customer_id', auth('customer')->user()->id)->pluck('product_id')->toArray());
            Toastr::info('Welcome to ' . Helpers::get_business_settings('company_name') . '!');
            CartManager::cart_to_db();
            return redirect(session('keep_return_url'));
        }

        Toastr::error('Credentials do not match or account has been suspended.');
        return back()->withInput();
    }

    public function logout(Request $request)
    {
        auth()->guard('customer')->logout();
        session()->forget('wish_list');
        Toastr::info('Come back soon, ' . '!');
        return redirect()->route('home');
    }

    public function otp_verification(Request $request)
    {

        $request->validate([
            'identity' => 'required',
        ]);

        session()->put('forgot_password_identity', $request['identity']);
        $verification_by = Helpers::get_business_settings('forgot_password_verification');

        DB::table('password_resets')->where('user_type','customer')->where('identity', 'like', "%{$request['identity']}%")->delete();

        if ($verification_by == 'email') {
            $customer = User::Where(['email' => $request['identity']])->first();
            if (isset($customer)) {
                $token = Str::random(120);
                DB::table('password_resets')->insert([
                    'identity' => $customer['email'],
                    'token' => $token,
                    'user_type'=>'customer',
                    'created_at' => now(),
                ]);
                $reset_url = url('/') . '/customer/auth/reset-password?token=' . $token;
                Mail::to($customer['email'])->send(new \App\Mail\PasswordResetMail($reset_url));
                Toastr::success('Check your email. Password reset url sent.');
                return back();
            }
        } elseif ($verification_by == 'phone') {
             $customer = User::where('phone', 'like', "%{$request['identity']}%")->first();
            if (isset($customer)) {
                $token = rand(1000, 9999);
                DB::table('password_resets')->insert([
                    'identity' => $customer['phone'],
                    'token' => $token,
                    'user_type'=>'customer',
                    'created_at' => now(),
                ]);
                SMS_module::send($customer->phone, $token);
                $data = [
                    "otp" => $token
                ];
                // Toastr::success('',$token);
                return response()->json(["success"=>true,"message"=>"Check your phone. Password reset otp sent. $token","data"=>$data], 200);

            }
        }

        Toastr::error('No such user found!');
        return response()->json(["success"=>false,"message"=>"No such user found!"], 400);

        // return back();
    }

    public function login_otp_verification_submit(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $id = session('forgot_password_identity');
        $data = DB::table('password_resets')->where('user_type','customer')->where(['token' => $request['otp']])
            ->where('identity', 'like', "%{$id}%")
            ->first();


        $data = DB::table('users')
                    ->where('users.phone', '=', $data->identity)
                    ->first();
        if (isset($data)) {
            $token = $request['otp'];
            // return redirect()->route('customer.auth.reset-password', ['token' => $token]);
            if (isset($user) && $user->is_active && auth('customer')->attempt(['phone' => $user->phone, 'password' => $user->password], $remember)) {
                session()->put('wish_list', Wishlist::where('customer_id', auth('customer')->user()->id)->pluck('product_id')->toArray());
                Toastr::info('Welcome to ' . Helpers::get_business_settings('company_name') . '!');
                CartManager::cart_to_db();
                return redirect(session('keep_return_url'));
            }
        }

        Toastr::error(translate('invalid_otp'));
        return back();
    }

}
