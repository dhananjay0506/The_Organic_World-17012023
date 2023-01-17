<?php

namespace App\Model;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ShopPincode extends Model
{
    protected $table = "shop_pincodes";
    protected $fillable = ['shop_id', 'pincode'];
    
}
