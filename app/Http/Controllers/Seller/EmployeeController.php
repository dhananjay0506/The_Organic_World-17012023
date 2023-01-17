<?php

namespace App\Http\Controllers\Seller;

use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\CPU\BackEndHelper;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\Seller;
use App\Model\WithdrawRequest;
use App\Model\SellerWallet;
use App\Model\City;
use App\Model\Pincode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Review;
use App\Model\OrderTransaction;
use App\Model\DeliveryMan;
use Auth;

class EmployeeController extends Controller
{

    public function add_emplyoee()
    {

        $cities = City::all();

        $pincode = Pincode::all();
        
        return view('seller-views.emplyoee.add-new-emplyoee',compact('cities','pincode'));
    }
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
            // 'shop_address' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            // 'shop_name' => 'required',
            // 'pincode' => 'required|unique:shop_pincodes,pincode',
            //'city' => 'required',
            //'phone' => 'required',
            'password' => 'required|min:8',
        ]);

        try {
            //code...
        
            $seller = new Seller();
            $seller->f_name            = $request->f_name;
            $seller->l_name            = $request->l_name;
            $seller->phone             = $request->phone;
            $seller->email             = $request->email;
            $seller->parent_id         = $request->parent_id;
            $seller->image             = ImageManager::upload('seller/', 'png', $request->file('image'));
            $seller->password          = bcrypt($request->password);
            $seller->status            =  $request->status == 'approved'?'approved': "pending";
            $seller->save();
 
          
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

           

        if($request->status == 'approved'){
            Toastr::success('Employee Added successfully!');
            return back();
        }else{
            Toastr::success('Employee Added successfully!');
            return redirect()->route('seller.auth.login');
        }
    } catch (\Exception $th) {
        Toastr::error($th->getMessage());
            return back();
    }
        

    }

    public function index(Request $request)
    {
       $seller_id = auth('seller')->user();
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $sellers = Seller::with(['orders', 'product'])
                ->where('parent_id', $seller_id->id)
                ->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->orWhere('f_name', 'like', "%{$value}%")
                            ->orWhere('l_name', 'like', "%{$value}%")
                            ->orWhere('phone', 'like', "%{$value}%")
                            ->orWhere('email', 'like', "%{$value}%");
                    }
                });
            $query_param = ['search' => $request['search']];
        } else {
            $sellers = Seller::where('parent_id', $seller_id->id)->with(['orders', 'product']);
        }
        $sellers = $sellers->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('seller-views.emplyoee.index', compact('sellers', 'search'));
    }

    public function add_new()
    {
        $cat        = Category::where(['parent_id' => 0])->get();
        $br         = Brand::orderBY('name', 'ASC')->get();

      
        return $seller_id   = auth('seller')->id(); 
        $shop        = Shop::where('seller_id', $seller_id)->first();
        return view('seller-views.product.add-new', compact('cat', 'br','shop'));
    }
}
