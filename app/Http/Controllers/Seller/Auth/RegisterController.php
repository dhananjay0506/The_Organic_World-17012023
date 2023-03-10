<?php

namespace App\Http\Controllers\Seller\Auth;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Seller;
use App\Model\ShopPincode;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CPU\Helpers;
use function App\CPU\translate;

class RegisterController extends Controller
{
    public function create()
    {
        // return "hii";
        $business_mode=Helpers::get_business_settings('business_mode');
        $seller_registration=Helpers::get_business_settings('seller_registration');
        if((isset($business_mode) && $business_mode=='single') || (isset($seller_registration) && $seller_registration==0))
        {
            Toastr::warning(translate('access_denied!!'));
            return redirect('/');
        }
        return view('seller-views.auth.register');
    }

    public function store(Request $request)
    {

       
         
        $this->validate($request, [
            'email' => 'required|unique:sellers',
            'shop_address' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'shop_name' => 'required',
            'pincode' => 'required|unique:shop_pincodes,pincode',
            //'city' => 'required',
            //'phone' => 'required',
            'password' => 'required|min:8',
        ]);

        try {
            //code...
        

        // DB::transaction(function ($r) use ($request) {
            // return $request->all();
            $seller = new Seller();
            $seller->f_name = $request->f_name;
            $seller->l_name = $request->l_name;
            $seller->phone = $request->phone;
            $seller->email = $request->email;
            $seller->parent_id = 0;
            $seller->image = ImageManager::upload('seller/', 'png', $request->file('image'));
            $seller->password = bcrypt($request->password);
            $seller->status =  $request->status == 'approved'?'approved': "pending";
            $seller->save();

            $shop = new Shop();
            $shop->seller_id = $seller->id;
            $shop->name = $request->shop_name;
            $shop->address = $request->shop_address;
            $shop->contact = $request->phone;
            // $shop->geo_boundry = $request->geo_boundry;
            $shop->lat = $request->lat;
            $shop->long = $request->longt;
            $shop->city_id = $request->city;
            $shop->image = ImageManager::upload('shop/', 'png', $request->file('logo'));
            $shop->banner = ImageManager::upload('shop/banner/', 'png', $request->file('banner'));
            $shop->save();

           
            
            foreach ($request->pincode as $p) {
                $sp  = new ShopPincode();
                $sp->shop_id       = $shop->id;
                $sp->pincode            = $p;
                $sp->save();
            }
          
          
            DB::table('seller_wallets')->insert([
                'seller_id' => $seller['id'],
                'withdrawn' => 0,
                'commission_given' => 0,
                'total_earning' => 0,
                'pending_withdraw' => 0,
                'delivery_charge_earned' => 0,
                'collected_cash' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

           

        // });
    

       

        if($request->status == 'approved'){
            Toastr::success('Shop apply successfully!');
            return back();
        }else{
            Toastr::success('Shop apply successfully!');
            return redirect()->route('seller.auth.login');
        }
    } catch (\Exception $th) {
        Toastr::error($th->getMessage());
            return back();
    }
        

    }

}
