<?php

namespace App\Http\Controllers\Customer;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\CartShipping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Cart;
use App\Model\ShippingType;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        // return "hii";
        $validator = Validator::make($request->all(), [
            'billing_address_id' => 'required',
            'customer_id' => 'required',
        ]);

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

       

        session()->put('customer_id', $request['customer_id']);
        session()->put('order_note', $request['order_note']);
        session()->put('address_id', $request['address_id']);
        session()->put('billing_address_id', $request['billing_address_id']);
        session()->put('coupon_code', $request['coupon_code']);
        session()->put('payment_mode', 'app');

        $discount = Helpers::coupon_discount($request);
        if ($discount > 0) {
            session()->put('coupon_code', $request['coupon_code']);
            session()->put('coupon_discount', $discount);
        }

        $cart_group_ids = CartManager::get_cart_group_ids();
        // if (CartShipping::whereIn('cart_group_id', $cart_group_ids)->count() != count($cart_group_ids)) {
        //     return response()->json(['errors' => ['code' => 'shipping-method', 'message' => 'Data not found']], 403);
        // }
        $shippingMethod = Helpers::get_business_settings('shipping_method');
        $carts = Cart::whereIn('cart_group_id', $cart_group_ids)->get();
        foreach($carts as $cart)
        {
            if ($shippingMethod == 'inhouse_shipping') {
                $admin_shipping = ShippingType::where('seller_id',0)->first();
                $shipping_type = isset($admin_shipping)==true?$admin_shipping->shipping_type:'order_wise';
            } else {
                if($cart->seller_is == 'admin'){
                    $admin_shipping = ShippingType::where('seller_id',0)->first();
                    $shipping_type = isset($admin_shipping)==true?$admin_shipping->shipping_type:'order_wise';
                }else{
                    $seller_shipping = ShippingType::where('seller_id',$cart->seller_id)->first();
                    $shipping_type = isset($seller_shipping)==true?$seller_shipping->shipping_type:'order_wise';
                }
            }
            
            if($shipping_type == 'order_wise'){
                $cart_shipping_data = CartShipping::where('cart_group_id', $cart->cart_group_id)->first();
                if (!isset($cart_shipping_data)) {
                    return response()->json(['errors' => ['code' => 'shipping-method', 'message' => 'Data not found']], 403);
                }
            }
        }

        $customer = User::find($request['customer_id']);

        if (isset($customer)) {
            $cart = Cart::where(['customer_id' => $customer->id])->first();
            if(isset($cart->cart_group_id)){
              $cart_shipping = CartShipping::where('cart_group_id', $cart->cart_group_id)->leftJoin('shipping_methods','cart_shippings.shipping_method_id','shipping_methods.id')->first();
            }
            else{
                $cart_shipping = [];
            }
    
            if($cart_shipping == null){
        
                $cart_shipping = array('minimum_cart_value' => 0, 'free_shipping_status' => 0);
                $cart_shipping = json_encode($cart_shipping);
                $cart_shipping = json_decode($cart_shipping);
            }
            
            return view('web-views.mobile-app-view.payment',compact('cart_shipping'));
        }

        return response()->json(['errors' => ['code' => 'order-payment', 'message' => 'Data not found']], 403);
    }

    public function success()
    {
        $token = rand(1000, 9999); 
        $customer = User::where('phone', 'like', auth('customer')->user())->first();
        $current_state = "Payment_succeeded";
        SMS_module::send($customer->phone, $token, $current_state);
        return response()->json(['message' => 'Payment succeeded'], 200);
    }

    public function fail()
    {
        $token = rand(1000, 9999); 
        $customer = User::where('phone', 'like', auth('customer')->user())->first();
        $current_state = "Payment_failed";
        SMS_module::send($customer->phone, $token, $current_state);
        return response()->json(['message' => 'Payment failed'], 403);
    }
}
