<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DealOfTheDay;
use App\Model\Product;
use App\CPU\Helpers;

class DealOfTheDayController extends Controller
{
    public function get_deal_of_the_day_product(Request $request)
    {
        $pincode = $request->pincode;
        $deal_of_the_day = DealOfTheDay::where('deal_of_the_days.status', 1)->first();
        
        if(isset($deal_of_the_day)){
            
            $product = Product::select('products.*','shop_pincodes.pincode')
                                ->join('shop_pincodes','products.shop_id','shop_pincodes.shop_id')
                                ->where('pincode',$pincode)
                                ->active()
                                ->find($deal_of_the_day->product_id);
            
            if(!isset($product))
            {
                $product = Product::select('products.*','shop_pincodes.pincode')
                                    ->join('shop_pincodes','products.shop_id','shop_pincodes.shop_id')
                                    ->where('pincode',$pincode)
                                    ->active()
                                    ->inRandomOrder()
                                    ->first();
            }
            $product = Helpers::product_data_formatting($product);
            return response()->json($product, 200);
        }else{
            $product = Product::select('products.*','shop_pincodes.pincode')
                                ->join('shop_pincodes','products.shop_id','shop_pincodes.shop_id')
                                ->where('pincode',$pincode)
                                ->active()
                                ->inRandomOrder()
                                ->first();
            $product = Helpers::product_data_formatting($product);
            return response()->json($product, 200);
        }
        
    }
}
