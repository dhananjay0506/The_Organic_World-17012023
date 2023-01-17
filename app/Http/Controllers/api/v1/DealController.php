<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\FlashDeal;
use Illuminate\Http\Request;
use App\Model\FlashDealProduct;
use App\Model\Product;

class DealController extends Controller
{
    public function get_featured_deal(Request $request)
    {
        $pincode = $request->pincode;
        $featured_deal = FlashDeal::where(['status' => 1])
            ->where(['deal_type' => 'feature_deal'])->first();

        $p_ids = array();
        if ($featured_deal) {
            $p_ids = FlashDealProduct::with(['product'])
                ->whereHas('product', function ($q) {
                    $q->active();
                })
                ->whereHas('product.shop_pincode',function($q) use($pincode){
                    $q->where('pincode',$pincode);
                })
                ->where(['flash_deal_id' => $featured_deal->id])
                ->pluck('product_id')->toArray();
        }

        return response()->json(Helpers::product_data_formatting(Product::select('products.*','shop_pincodes.pincode')
                                                                        ->with(['rating'])
                                                                        ->join('shop_pincodes','shop_pincodes.shop_id','products.shop_id')
                                                                        ->whereIn('products.id', $p_ids)
                                                                        ->get(), true), 200);
    }

}
