<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Subscription;
use App\Model\BusinessSetting;

class CustomerController extends Controller
{
    public function customer_list(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $customers = User::with(['orders'])
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
            $customers = User::with(['orders']);
        }
        $customers = $customers->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.customer.list', compact('customers', 'search'));
    }

    public function status_update(Request $request)
    {
        User::where(['id' => $request['id']])->update([
            'is_active' => $request['status']
        ]);

        DB::table('oauth_access_tokens')
            ->where('user_id', $request['id'])
            ->delete();

        return response()->json([], 200);
    }

    public function view(Request $request, $id)
    {

        $customer = User::find($id);
        if (isset($customer)) {
            $query_param = [];
            $search = $request['search'];
            $orders = Order::where(['customer_id' => $id]);
            if ($request->has('search')) {

                $orders = $orders->where('id', 'like', "%{$search}%");
                $query_param = ['search' => $request['search']];
            }
            $orders = $orders->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
            return view('admin-views.customer.customer-view', compact('customer', 'orders', 'search'));
        }
        Toastr::error('Customer not found!');
        return back();
    }
    public function edit(Request $request, $id)
    {

        $customer = User::find($id);

        return view('admin-views.customer.customer-edit', compact('customer'));

       
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
      
        $userDetails = [
            'name'      => $request->name,
            'f_name'    => $request->f_name,
            'l_name'    => $request->l_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            
        ];
        
            User::where(['id' => $user->id])->update($userDetails);
            Toastr::info(\App\CPU\translate('updated_successfully'));
            return redirect()->route('admin.customer.list');
        
    }

    public function delete($id)
    {
        $customer = User::find($id);
        $customer->delete();
        Toastr::success('Customer deleted successfully!');
        return back();
    }

    public function subscriber_list(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $subscription_list = Subscription::where('email','like', "%{$search}%");
            
            $query_param = ['search' => $request['search']];
        } else {
        $subscription_list = new Subscription;
        }
        $subscription_list = $subscription_list->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.customer.subscriber-list',compact('subscription_list','search'));
    }
    public function customer_settings()
    {
        $data = BusinessSetting::where('type','like','wallet_%')->orWhere('type','like','loyalty_point_%')->get();
        $data = array_column($data->toArray(), 'value','type');
    
        return view('admin-views.customer.customer-settings', compact('data'));
    }

    public function customer_update_settings(Request $request)
    {
        if (env('APP_MODE') == 'demo') {
            Toastr::info(\App\CPU\translate('update_option_is_disable_for_demo'));
            return back();
        }
        
        $request->validate([
            'add_fund_bonus'=>'nullable|numeric|max:100|min:0',
            'loyalty_point_exchange_rate'=>'nullable|numeric',
        ]);
        BusinessSetting::updateOrInsert(['type' => 'wallet_status'], [
            'value' => $request['customer_wallet']??0
        ]);
        BusinessSetting::updateOrInsert(['type' => 'loyalty_point_status'], [
            'value' => $request['customer_loyalty_point']??0
        ]);
        BusinessSetting::updateOrInsert(['type' => 'wallet_add_refund'], [
            'value' => $request['refund_to_wallet']??0
        ]);
        BusinessSetting::updateOrInsert(['type' => 'loyalty_point_exchange_rate'], [
            'value' => $request['loyalty_point_exchange_rate']??0
        ]);
        BusinessSetting::updateOrInsert(['type' => 'loyalty_point_item_purchase_point'], [
            'value' => $request['item_purchase_point']??0
        ]);
        BusinessSetting::updateOrInsert(['type' => 'loyalty_point_minimum_point'], [
            'value' => $request['minimun_transfer_point']??0
        ]);
        
        Toastr::success(\App\CPU\translate('customer_settings_updated_successfully'));
        return back();
    }

    public function get_customers(Request $request){
        $key = explode(' ', $request['q']);
        $data = User::where('id','!=',0)->
        where(function ($q) use ($key) {
            foreach ($key as $value) {
                // $q->orWhere('f_name', 'like', "%{$value}%")
                $q->orWhereRaw('COALESCE(f_name,"") like '."'%{$value}%'") 
                ->orWhereRaw('COALESCE(l_name,"") like '."'%{$value}%'") 
                // ->orWhere('l_name', 'like', "%{$value}%") 
                ->orWhere('phone', 'like', "%{$value}%");
            }
        })
        ->limit(50)
        ->get([DB::raw('id, CONCAT( COALESCE(f_name,"") , " ", COALESCE(l_name,"") , " (", phone ,")") as text')]);
        if($request->all) $data[]=(object)['id'=>false, 'text'=>trans('messages.all')];
        

        return response()->json($data);
    }

}
