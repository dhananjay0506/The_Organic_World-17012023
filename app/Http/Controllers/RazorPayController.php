<?php

namespace App\Http\Controllers;

use App\CPU\CartManager;
use App\CPU\CustomerManager;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Model\Order;
use App\Model\Product;
use App\Model\OrderTransaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Redirect;
use Session;
use App\CPU\SMS_module;
use App\User;
use Illuminate\Support\Facades\Mail;

class RazorPayController extends Controller
{
    public function payWithRazorpay()
    {
        return view('razor-pay');
    }

    public function payment(Request $request)
    {
        try {
            $api = new Api(config('razor.razor_key'), config('razor.razor_secret'));
            $payment = $api->payment->fetch($request['razorpay_payment_id']);
            /*$api->transfer->create(array('account' => 'acc_id', 'amount' => 500, 'currency' => 'INR'));*/

            if (count($request->all()) && !empty($request['razorpay_payment_id'])) {
                $response = $api->payment->fetch($request['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $unique_id = OrderManager::gen_unique_id();
                $order_ids = [];
                foreach (CartManager::get_cart_group_ids() as $group_id) {
                    $data = [
                        'payment_method'    => 'razor_pay',
                        'order_status'      => 'confirmed',
                        'payment_status'    => 'paid',
                        'transaction_ref'   => $response['id'],
                        'order_group_id'    => $unique_id,
                        'cart_group_id'     => $group_id
                    ];
                    $order_id = OrderManager::generate_order($data);
                   
                    array_push($order_ids, $order_id);
                }

            //   return $order_id;
                //for minus the cart balanece
                    if($request['wallet_balence']  != 0){
                    $cartTotal = CartManager::cart_grand_total();
                    $user = auth('customer')->user();
                    $wallet_balence = $request['wallet_balence'];
                    CustomerManager::create_wallet_transaction($user->id, Convert::default($wallet_balence), 'order_place','order payment');
                    }
            
                // for the sms
                // $token     = rand(1000, 9999);
                // $customer  = User::where('phone', 'like', auth('customer')->user()->phone)->first();
                // $status    = "Payment_succeeded";
                // SMS_module::send($customer->phone, $token, $status, $order_id, $customer->email);
              
                

             
            }


                $token     = rand(1000, 9999);
                $customer  = User::where('phone', 'like', auth('customer')->user()->phone)->first();
                $status    = "Payment_succeeded";
                SMS_module::send($customer->phone, $token, $status, $order_id, $customer->email);
                
                CartManager::cart_clean();

                if (session()->has('payment_mode') && session('payment_mode') == 'app') {
                    return redirect()->route('payment-success');
                }

                return view('web-views.checkout-complete');


        } catch (\Exception $exception) {
            Toastr::error('Payment process failed');
            $token     = rand(1000, 9999);
            $customer  = User::where('phone', 'like', auth('customer')->user()->phone)->first();
            $status    = "Payment_failed";
            SMS_module::send($customer->phone, $token, $status, $order_id ='', $customer->email);
            return back();
        }


    }

    public function success()
    {
        //  $token = rand(1000, 9999); 
        if (auth('customer')->check()) {
            // $token = rand(1000, 9999);
            // $customer = User::where('phone', 'like', auth('customer')->user())->first();
            // $status = "Payment_succeeded";
            // SMS_module::send($customer->phone, $token, $status);
            Toastr::success('Payment success.');
            return redirect('/account-oder');
        }
        return response()->json(['message' => 'Payment succeeded'], 200);
    }

    public function fail()
    {
        //  $token = rand(1000, 9999); 
        if (auth('customer')->check()) {
            // $customer = User::where('phone', 'like', auth('customer')->user()->phone)->first();
            // $token = rand(1000, 9999);
            // $status = "Payment_failed";
            // SMS_module::send($customer->phone, $token, $status);
            Toastr::error('Payment failed.');
            return redirect('/account-oder');
        }
        return response()->json(['message' => 'Payment failed'], 403);
    }
}
