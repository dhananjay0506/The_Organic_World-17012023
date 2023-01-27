<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\AdminWallet;
use App\Model\BusinessSetting;
use App\Model\DeliveryMan;
use App\Model\Order;
use App\Model\Brand;
use App\Model\Category;
use App\Model\OrderDetail;
use App\Model\OrderTransaction;
use App\Model\Product;
use App\Model\Seller;
use App\User;
use App\Model\SellerWallet;
use App\Model\ShippingAddress;
use App\Model\ShippingMethod;
use App\Model\Shop;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use function App\CPU\translate;
use App\CPU\CustomerManager;
use App\CPU\Convert;
use Rap2hpoutre\FastExcel\FastExcel;

class OrderController extends Controller
{
    public function list(Request $request, $status)
    {
        // return "hii";
        $search = $request['search'];
        $from = $request['from'];
        $to = $request['to'];

        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            $query = Order::whereHas('details', function ($query) {
                $query->whereHas('product', function ($query) {
                    $query->where('added_by', 'admin');
                });
            })->with(['customer']);

        if ($status != 'all') {

            $orders = Order::when(session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1,function($q){
                        $q->whereHas('details', function ($query) {
                    $query->whereHas('product', function ($query) {
                    $query->where('added_by', 'admin');
            });
        });
            })->with(['customer'])->where(function($query) use ($status){
                    $query->orWhere('order_status',$status)
                          ->orWhere('payment_status',$status);
                });
        } else {

                $orders = $query;
            }
        } else {

            if ($status != 'all') {

                $orders = Order::select('orders.*','shops.name as shop_name')->when(session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1,function($q){
                    $q->whereHas('details', function ($query) {
                $query->whereHas('product', function ($query) {
                $query->where('added_by', 'admin');
            });
        });
            })->with(['customer'])
                ->join('shops','orders.seller_id','shops.seller_id')
                ->where(function($query) use ($status){
                    $query->orWhere('order_status',$status)
                          ->orWhere('payment_status',$status);
                });
            } else {

                $orders = Order::select('orders.*','shops.name as shop_name')
                                ->with(['customer'])
                                ->join('shops','orders.seller_id','shops.seller_id');
            }
        }
        Order::where(['checked' => 0])->update(['checked' => 1]);


            $key = $request['search'] ? explode(' ', $request['search']) : '';
            $orders = $orders->when($request->has('search') && $search!=null,function ($q) use ($key) {
                $q->where(function($qq) use ($key){
                    foreach ($key as $value) {
                        $qq->where('orders.id', 'like', "%{$value}%")
                            ->orWhere('order_status', 'like', "%{$value}%")
                            ->orWhere('transaction_ref', 'like', "%{$value}%")
                            ->orWhere('shops.name', 'like', "%{$value}%");
                }});
                })->when(!empty($from) && !empty($to), function($dateQuery) use($from, $to) {
                    $dateQuery->whereDate('shipping_date', '>=',$from)
                                ->whereDate('shipping_date', '<=',$to);
                    });



        $orders = $orders->where('order_type','default_type')->orderBy('orders.id','desc')->paginate(Helpers::pagination_limit())->appends(['search'=>$request['search'],'from'=>$request['from'],'to'=>$request['to']]);
        return view('admin-views.order.list', compact('orders', 'search','from','to','status'));
    }

    public function tommarowlist(Request $request)
    {
        try {
            $date=now();
            $tomorrow = $date->modify('+1 day')->toDateString();
            // $search = $request['search'];
            // $from = $request['from'];
            // $to = $request['to'];
            $success = array();
            $failed =  array();
            $orders = Order::select('orders.id as onlineReferenceNo','orders.order_status as status','orders.discount_amount as totalDiscountAmount',
                                        'orders.order_note as orderRemarks',
                                        'shipping_addresses.contact_person_name as shippingName',
                                        'shipping_addresses.address as shippingAddress1','shipping_addresses.city as shippingPlace',
                                        'shipping_addresses.state as shippingState','shipping_addresses.country as shippingCountry','shipping_addresses.zip as shippingPincode',
                                        'shipping_addresses.phone as shippingPhone','shipping_addresses.phone as shippingMobile','users.email as shippingEmail','orders.shipping_cost as shippingCharge',
                                        'shipping_methods.title as shippingMethod','orders.coupon_code as discountCoupon','orders.shipping_date as deliveryDate','users.id as customerId',
                                        'users.f_name AS customerName','orders.customer_type as customerType','shipping_addresses.address as customerAddressLine1',
                                        'users.street_address as customerArea','shipping_addresses.city as customerCity','shipping_addresses.state as customerState',
                                        'shipping_addresses.country as customerCountry','shipping_addresses.zip as customerPincode','users.phone as customerPhone',
                                        'users.phone as customerMobile','users.email as customerEmail','orders.order_amount as totalAmount','orders.payment_method as paymentMode',)
                            ->where('shipping_date','=',$tomorrow)
                            ->join('shipping_addresses','orders.shipping_address','shipping_addresses.id')
                            ->join('shipping_methods','orders.shipping_method_id','shipping_methods.id')
                            ->join('users','orders.customer_id','users.id')->get();

            foreach ($orders as $order) {
                $output['salesOrder']= $order;
                $output['salesOrder']->shippingId = strval($output['salesOrder']->onlineReferenceNo);
                $output['salesOrder']->onlineChildReferenceNo = strval($output['salesOrder']->onlineReferenceNo);
                $output['salesOrder']->courierPartner = "";
                $output['salesOrder']->ShippingAddress2 = "";
                $output['salesOrder']->shippingCharge = strval($output['salesOrder']->shippingCharge);
                $output['salesOrder']->ShipmentPointsUsed = 0.0;
                $output['salesOrder']->packingCharge = "0.0";
                $output['salesOrder']->shipmentABN ="";
                $output['salesOrder']->shipmentWeight = 0.0;
                $output['salesOrder']->locationId = 1;
                $output['salesOrder']->userId = "ecomm";
                $output['salesOrder']->outletId = 2;
                $output['salesOrder']->customerAddressLine2 = "";
                $output['salesOrder']->customerAddressLine3 = "";
                $output['salesOrder']->invoiceNo = "";
                $id = $output['salesOrder']->onlineReferenceNo;
                $date= strtotime($output['salesOrder']->deliveryDate);
                $date = date('Y-m-d h:i:s',$date);
                $output['salesOrder']->deliveryDate = $date;
                $output['salesOrder']->status = "pending";
                $output['salesOrder']->totalFreeQty = 0.0;
                $orderItems = OrderDetail::select('order_details.id as itemReferenceCode','products.name as itemName',
                                    'products.unit_price as salePrice','order_details.qty as quantity','order_details.tax as taxPercentage',
                                    'products.tax_type as itemTaxType','order_details.discount as discountPercentage','products.unit_price as itemMarketPrice',
                                    'order_details.variant as weight')
                                ->where('order_id','=',$id)
                                ->join('products','order_details.product_id','products.id')->get();
                // return $orderItems;
                $rowNo = 1;
                $quantity = 0;
                $discount = 0;
                $itemsAmount = 0;
                $tax = 0;
                foreach($orderItems as $orderItem){
                    $orderItem->rowNo = $rowNo;
                    $orderItem->itemId = 449;
                    $orderItem->itemReferenceCode = strval($orderItem->itemReferenceCode);
                    $orderItem->suppliedQty = "0";
                    $orderItem->itemAmount = $orderItem->salePrice * $orderItem->quantity;
                    $orderItem->iBarU = 0;
                    $orderItem->itemRemarks = "";
                    $orderItem->freeQty = 0;
                    $itemsAmount = $itemsAmount + $orderItem->itemAmount;
                    $rowNo++;
                    $quantity = $quantity + $orderItem->quantity;
                    $discount = $discount + $orderItem->discountPercentage;
                    $tax = $tax + $orderItem->taxPercentage;
                }
                $output['salesOrder']->orderDiscAmt = $itemsAmount - $output['salesOrder']->totalAmount;
                $output['salesOrder']->totalQuantity = $quantity;
                $output['salesOrder']->shipmentItems = count($orderItems);
                if($output['salesOrder']->discountCoupon == "0"){
                    $output['salesOrder']->discountCoupon = " ";
                }
                else{
                    $output['salesOrder']->discountCoupon;
                }
                if($tax != 0){
                    $output['salesOrder']->orderDiscPerc = $discount / count($orderItems);
                    $output['salesOrder']->totalTaxAmount = ($output['salesOrder']->totalAmount*($tax/count($orderItems)))/100;

                }
                else{
                    $output['salesOrder']->orderDiscPerc = 0;
                    $output['salesOrder']->totalTaxAmount = 0;

                }
                $output['salesOrder']->orderItems = $orderItems;

                // return json_encode($output);

                $ch = curl_init();

                $options = array(
                    CURLOPT_URL => 'http://toweuaterp.gofrugal.com/GoFrugalERPAdapter/rest/sales-order/create-order?mode=Create',
                    CURLOPT_POST => 1,
                    CURLOPT_POSTFIELDS => json_encode($output),
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: Application/json',
                        'X-Auth-Token: BF604D23360D1F523C0D444BB463D3E996F12C1A7EF1793454E85B2ADF8F8AACB59C3521B61AB17B')
                );
                curl_setopt_array($ch, $options);
                $response = curl_exec($ch);
                curl_close($ch);
                $response = json_encode($response);
                // return $response;
                if($response == 'false'){
                     $failed[] =  $output['salesOrder']->shippingId;
                }
                else{
                    $success[] = $output['salesOrder']->shippingId;
                }
            }

            $data['Success_orderId']=$success;
            $data['Fail_orderId']= $failed;
            return $data;

        } catch (\Throwable $th) {
            return ($th->getMessage());
        }

    }

    public function details($id)
    {
        // return "hii";
        $order = Order::with('details', 'shipping', 'seller')->where(['id' => $id])->first();

        $linked_orders = Order::where(['order_group_id' => $order['order_group_id']])
            ->whereNotIn('order_group_id', ['def-order-group'])
            ->whereNotIn('id', [$order['id']])
            ->get();

        $shipping_method = Helpers::get_business_settings('shipping_method');
        $delivery_men = DeliveryMan::where('is_active', 1)->when($order->seller_is == 'admin', function ($query) {
            $query->where(['seller_id' => 0]);
        })->when($order->seller_is == 'seller' && $shipping_method == 'sellerwise_shipping', function ($query) use ($order) {
            $query->where(['seller_id' => $order['seller_id']]);
        })->when($order->seller_is == 'seller' && $shipping_method == 'inhouse_shipping', function ($query) use ($order) {
            $query->where(['seller_id' => 0]);
        })->get();

        $shipping_address = ShippingAddress::find($order->shipping_address);
        if($order->order_type == 'default_type')
        {
            return view('admin-views.order.order-details', compact('shipping_address','order', 'linked_orders', 'delivery_men'));
        }else{

            return view('admin-views.pos.order.order-details', compact('order'));
        }

    }

    public function add_delivery_man($order_id, $delivery_man_id)
    {
        if ($delivery_man_id == 0) {
            return response()->json([], 401);
        }
        $order = Order::find($order_id);
        /*if($order->order_status == 'delivered' || $order->order_status == 'returned' || $order->order_status == 'failed' || $order->order_status == 'canceled' || $order->order_status == 'scheduled') {
            return response()->json(['status' => false], 200);
        }*/
        $order->delivery_man_id = $delivery_man_id;
        $order->delivery_type = 'self_delivery';
        $order->delivery_service_name = null;
        $order->third_party_delivery_tracking_id = null;
        $order->save();

        $fcm_token = $order->delivery_man->fcm_token;
        $value = Helpers::order_status_update_message('del_assign') . " ID: " . $order['id'];
        try {
            if ($value != null) {
                $data = [
                    'title' => translate('order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token, $data);
            }
        } catch (\Exception $e) {
            Toastr::warning(\App\CPU\translate('Push notification failed for DeliveryMan!'));
        }

        return response()->json(['status' => true], 200);
    }

    public function status(Request $request)
    {
    //    return $request->all();
         $order = Order::find($request->id);
         $customer = User::find($order->customer_id);
        //  $delivery_man_name = User::find($request->delvery_man_id);
         $customer->name =  $customer->f_name . ' ' . $customer->l_name;
         $order_id = $order->id;
        if(!isset($order->customer))
        {
            return response()->json(['customer_status'=>0],200);
        }

        $wallet_status = Helpers::get_business_settings('wallet_status');
        $loyalty_point_status = Helpers::get_business_settings('loyalty_point_status');

        if($request->order_status=='delivered' && $order->payment_status !='paid'){

            return response()->json(['payment_status'=>0],200);
        }
        $fcm_token = $order->customer->cm_firebase_token;
        $value = Helpers::order_status_update_message($request->order_status,$customer->phone,$customer->name, $order_id);

        return  $value; die;

        try {
            if ($value) {
                $data = [
                    'title' => translate('Order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token, $data);
            }
        } catch (\Exception $e) {
        }


        try {
            $fcm_token_delivery_man = $order->delivery_man->fcm_token;
            if ($value != null) {
                $data = [
                    'title' => translate('order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token_delivery_man, $data);
            }
        } catch (\Exception $e) {
        }

        $order->order_status = $request->order_status;
        OrderManager::stock_update_on_order_status_change($order, $request->order_status);
        $order->save();

        if($loyalty_point_status == 1)
        {
            if($request->order_status == 'delivered' && $order->payment_status =='paid'){
                CustomerManager::create_loyalty_point_transaction($order->customer_id, $order->id, Convert::default($order->order_amount-$order->shipping_cost), 'order_place');
            }
        }

        $transaction = OrderTransaction::where(['order_id' => $order['id']])->first();
        if (isset($transaction) && $transaction['status'] == 'disburse') {
            return response()->json($request->order_status);
        }

        if ($request->order_status == 'delivered' && $order['seller_id'] != null) {
            OrderManager::wallet_manage_on_order_status_change($order, 'admin');
            OrderDetail::where('order_id', $order->id)->update(
                ['delivery_status'=>'delivered']
            );
        }

        return response()->json($request->order_status);
    }

    public function payment_status(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::find($request->id);

            if(!isset($order->customer))
            {
                return response()->json(['customer_status'=>0],200);
            }

            $order = Order::find($request->id);
            $order->payment_status = $request->payment_status;
            $order->save();
            $data = $request->payment_status;
            return response()->json($data);
        }
    }

    public function generate_invoice($id)
    {
        $order = Order::with('seller')->with('shipping')->with('details')->where('id', $id)->first();
        $seller = Seller::find($order->details->first()->seller_id);
        $data["email"] = $order->customer !=null?$order->customer["email"]:\App\CPU\translate('email_not_found');
        $data["client_name"] = $order->customer !=null? $order->customer["f_name"] . ' ' . $order->customer["l_name"]:\App\CPU\translate('customer_not_found');
        $data["order"] = $order;

        $mpdf_view = View::make('admin-views.order.invoice')->with('order', $order)->with('seller', $seller);
        Helpers::gen_mpdf($mpdf_view, 'order_invoice_', $order->id);
    }

    public function inhouse_order_filter()
    {
        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            session()->put('show_inhouse_orders', 0);
        } else {
            session()->put('show_inhouse_orders', 1);
        }
        return back();
    }
    public function update_deliver_info(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->delivery_type = 'third_party_delivery';
        $order->delivery_service_name = $request->delivery_service_name;
        $order->third_party_delivery_tracking_id = $request->third_party_delivery_tracking_id;
        $order->delivery_man_id = null;
        $order->save();

        Toastr::success(\App\CPU\translate('updated_successfully!'));
        return back();
    }

    public function bulk_export_data(Request $request, $status)
    {
        $from = $request['from'];
        $to = $request['to'];

        $orders = Order::select('orders.*')->with(['customer','shipping','shippingAddress','delivery_man','billingAddress'])
                        ->where('order_type', 'default_type')
                        ->when($status !='all', function($q) use($status){
                            $q->where(function($query) use ($status){
                                $query->orWhere('order_status',$status)
                                    ->orWhere('payment_status',$status);
                            });
                        })
                        ->when(session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1,function($q){
                            $q->whereHas('details', function ($query) {
                                $query->whereHas('product', function ($query) {
                                    $query->where('added_by', 'admin');
                                    });
                                });
                        })
                        ->when($from!=null && $to!=null,function($query) use($from,$to){
                            $query->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
                        })->orderBy('id', 'DESC')->get();

        if ($orders->count()==0) {
            Toastr::warning(\App\CPU\translate('Data is Not available!!!'));
            return back();
        }

        $storage = array();

        foreach ($orders as $item) {

            $order_amount = $item->order_amount;
            $discount_amount = $item->discount_amount;
            $shipping_cost = $item->shipping_cost;
            $extra_discount = $item->extra_discount;

            $storage[] = [
                'order_id'=>$item->id,
                'Customer Id' => $item->customer_id,
                'Customer Name'=> isset($item->customer) ? $item->customer->f_name. ' '.$item->customer->l_name:'not found',
                'Order Group Id' => $item->order_group_id,
                'Order Status' => $item->order_status,
                'Order Amount' => Helpers::currency_converter($order_amount),
                'Order Type' => $item->order_type,
                'Coupon Code' => $item->coupon_code,
                'Discount Amount' => Helpers::currency_converter($discount_amount),
                'Discount Type' => $item->discount_type,
                'Extra Discount' => Helpers::currency_converter($extra_discount),
                'Extra Discount Type' => $item->extra_discount_type,
                'Payment Status' => $item->payment_status,
                'Payment Method' => $item->payment_method,
                'Transaction_ref' => $item->transaction_ref,
                'Verification Code' => $item->verification_code,
                'Billing Address' => isset($item->billingAddress)? $item->billingAddress->address:'not found',
                'Billing Address Data' => $item->billing_address_data,
                'Shipping Type' => $item->shipping_type,
                'Shipping Address' => isset($item->shippingAddress)? $item->shippingAddress->address:'not found',
                'Shipping Method Id' => $item->shipping_method_id,
                'Shipping Method Name' => isset($item->shipping)? $item->shipping->title:'not found',
                'Order Date' =>  isset($item->created_at) ? date_format($item->created_at,"d-m-Y h:i:s A") : "-",
                'Shipping Date' => isset($item->shipping_date) ? $item->shipping_date : "-",
                'Shipping Cost' => Helpers::currency_converter($shipping_cost),
                'Seller Id' => $item->seller_id,
                'Seller Name' => isset($item->seller)? $item->seller->f_name. ' '.$item->seller->l_name:'not found',
                'Seller Email'  => isset($item->seller)? $item->seller->email:'not found',
                'Seller Phone'  => isset($item->seller)? $item->seller->phone:'not found',
                'Seller Is' => $item->seller_is,
                'Shipping Address Data' => $item->shipping_address_data,
                'Delivery Type' => $item->delivery_type,
                'Delivery Man Id' => $item->delivery_man_id,
                'Delivery Service Name' => $item->delivery_service_name,
                'Third Party Delivery Tracking Id' => $item->third_party_delivery_tracking_id,
                'Checked' => $item->checked,

            ];
        }

        return (new FastExcel($storage))->download('Order_All_details.xlsx');

    }

    public function detail_bulk_export_data(Request $request, $status)
    {
        $from = $request['from'];
        $to = $request['to'];

        $orders = Order::select('orders.*','shops.name as shop_name')->with(['customer','shipping','shippingAddress','delivery_man','billingAddress','details'])
                        ->where('order_type', 'default_type')
                        ->join('shops','shops.seller_id','orders.seller_id')
                        ->when($status !='all', function($q) use($status){
                            $q->where(function($query) use ($status){
                                $query->orWhere('order_status',$status)
                                    ->orWhere('payment_status',$status);
                            });
                        })
                        ->when(session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1,function($q){
                            $q->whereHas('details', function ($query) {
                                $query->whereHas('product', function ($query) {
                                    $query->where('added_by', 'admin');
                                    });
                                });
                        })
                        ->when($from!=null && $to!=null,function($query) use($from,$to){
                            $query->whereBetween('shipping_date', [$from . ' 00:00:00', $to . ' 23:59:59']);
                        })->orderBy('id', 'DESC')->get();

        if ($orders->count()==0) {
            Toastr::warning(\App\CPU\translate('Data is Not available!!!'));
            return back();
        }

        return $orders;

        $storage = array();

        foreach ($orders as $item) {

            $order_amount = $item->order_amount;
            $discount_amount = $item->discount_amount;
            $shipping_cost = $item->shipping_cost;
            $extra_discount = $item->extra_discount;
            // return $item;
            // $product_detail->variation = gettype($product_detail->variation) == "string" ? json_decode($product_detail->variation) : $product_detail->variation;
            // return $item;
            foreach ($item->details as $od_i => $od_dtls) {
                $sku = "";
                $p_name = "";
                $p_code ="";
                $p_cat ="";
                $mrp = 0;
                $sell_price = 0;


                // $product_detail = json_decode($od_dtls->product_details);
                return $pDtls = gettype($od_dtls->product_details) == "string" ? json_decode($od_dtls->product_details) : $od_dtls->product_details;

                if(isset($pDtls->variation))
                {
                    $vrtns = gettype($pDtls->variation) == "string" ? json_decode($pDtls->variation) : $pDtls->variation;
                }
                $vartns_dtls =  array_values(array_filter($vrtns, function($f) use ($od_dtls){
                    return $f->type == $od_dtls->variant;}));
                // return $od_dtls;
                if(isset($vartns_dtls) && is_array($vartns_dtls) && count($vartns_dtls) > 0)
                {
                    $sku = isset($vartns_dtls[0]->sku) ? $vartns_dtls[0]->sku : "";
                }
                if(isset($vartns_dtls) && is_array($vartns_dtls) && count($vartns_dtls) > 0)
                {
                    $mrp = isset($vartns_dtls[0]->price) ? $vartns_dtls[0]->price : 0;
                }
                if(isset($od_dtls->price) && isset($od_dtls->tax) && isset($od_dtls->discount))
                {
                    $sell_price = ($od_dtls->price + $od_dtls->tax ) -  $od_dtls->discount;
                }
                $p_name = isset($pDtls->name) ?  $pDtls->name : "";
                $p_code = isset($pDtls->code) ?  $pDtls->code : "";
                $p_cat = isset($pDtls->code) ?  $pDtls->code : "";

                // return $mrp * $od_dtls->qty;

                // die;
                $storage[] = [
                    'Order Date' =>  isset($item->created_at) ? date_format($item->created_at,"d-m-Y h:i:s A") : "-",
                    'Shippind  Date' =>  isset($item->shipping_date) ? $item->shipping_date : "-",
                    'Store  Name' =>  $item->shop_name,
                    'order_id'=>$item->id,
                    'Customer Name'=> isset($item->customer) ? $item->customer->f_name. ' '.$item->customer->l_name:'not found',
                    'Customer Phone Number'=> isset($item->customer->phone) ? $item->customer->phone :'not found',
                    'Customer Email'=> isset($item->customer->email) ? $item->customer->email :'not found',
                    'SKU Code'=>   $sku,
                    'Item Name'=>   $p_name,
                    'Size'=>  ( isset($od_dtls->variant) ?  $od_dtls->variant : "" ) . ( isset($pDtls->unit) ?  $pDtls->unit : "" ),
                    'Quantity'=>   isset($od_dtls->qty) ?  $od_dtls->qty : "",
                    'MRP'=>   Helpers::currency_converter($mrp),
                    'Selling Price'=>   Helpers::currency_converter($sell_price),
                    'Shipping Cost' => Helpers::currency_converter($shipping_cost),
                    'Total Amount' => Helpers::currency_converter($mrp * $od_dtls->qty),
                    'Discount Amount' => Helpers::currency_converter($discount_amount),
                    'Payment Method' => $item->payment_method,
                    'Shipping Method Id' => $item->shipping_method_id,
                    'Shipping Method Name' => isset($item->shipping)? $item->shipping->title:'not found',
                    'Order Status' => $item->order_status,
                    'Latitude' => isset($item->shippingAddress)? $item->shippingAddress->latitude:'not found',
                    'Longitude' => isset($item->shippingAddress)? $item->shippingAddress->longitude:'not found',
                    'Order Type' => $item->order_type,
                    'City' => isset($item->shippingAddress)? $item->shippingAddress->city:'not found',
                    'Pincode' => isset($item->shippingAddress)? $item->shippingAddress->zip:'not found',
                    'Category'=>   $p_cat,
                    'Sub Category'=>   $p_cat,
                    'Sub Sub Category'=>   $p_cat,
                    'Product Code'=>   $p_code,
                    // 'Order channnel'=>   $product_detail  variation,


                    // 'Coupon Code' => $item->coupon_code,

                    'Discount Type' => $item->discount_type,
                    'Extra Discount' => Helpers::currency_converter($extra_discount),
                    'Extra Discount Type' => $item->extra_discount_type,
                    'Payment Status' => $item->payment_status,
                    'Transaction_ref' => $item->transaction_ref,
                    // //'Verification Code' => $item->verification_code,
                    'Billing Address' => isset($item->billingAddress)? $item->billingAddress->address:'not found',
                    'Billing Address Data' => $item->billing_address_data,
                    'Shipping Type' => $item->shipping_type,
                    'Shipping Address' => isset($item->shippingAddress)? $item->shippingAddress->address:'not found',


                    // // 'Seller Id' => $item->seller_id,
                    // // 'Seller Name' => isset($item->seller)? $item->seller->f_name. ' '.$item->seller->l_name:'not found',
                    // // 'Seller Email'  => isset($item->seller)? $item->seller->email:'not found',
                    // // 'Seller Phone'  => isset($item->seller)? $item->seller->phone:'not found',
                    // // 'Seller Is' => $item->seller_is,
                    // // 'Shipping Address Data' => $item->shipping_address_data,
                    // // 'Delivery Type' => $item->delivery_type,
                    // // 'Delivery Man Id' => $item->delivery_man_id,
                    // // 'Delivery Service Name' => $item->delivery_service_name,
                    // // 'Third Party Delivery Tracking Id' => $item->third_party_delivery_tracking_id,
                    // // 'Checked' => $item->checked,

                ];
            }
            // $fltrd_variant = array_values(array_filter($product_detail->variation, function($f) use ($item){
            //     return $f->type == $item->variant;}));
            //     return $fltrd_variant;
            // $storage[] = [
            //     'Order Date' =>  isset($item->created_at) ? date_format($item->created_at,"d-m-Y h:i:s A") : "-",
            //     'Shippind  Date' =>  isset($item->shipping_date) ? $item->shipping_date : "-",
            //     'Store  Name' =>  $item->shop_name,
            //     'order_id'=>$item->id,
            //     // // 'Customer Id' => $item->customer_id,s
            //     'Customer Name'=> isset($item->customer) ? $item->customer->f_name. ' '.$item->customer->l_name:'not found',
            //     // // 'Order Group Id' => $item->order_group_id,
            //     'Customer Phone Number'=> isset($item->customer->phone) ? $item->customer->phone :'not found',
            //     'Customer Email'=> isset($item->customer->email) ? $item->customer->email :'not found',
            //     // 'Size'=>   $product_detail  variation,
            //     // 'Quantity'=>   $product_detail  variation,
            //     // 'MRP'=>   $product_detail  variation,
            //     // 'Selling Price'=>   $product_detail  variation,
            //     'Shipping Cost' => Helpers::currency_converter($shipping_cost),
            //     'Order Amount' => Helpers::currency_converter($order_amount),
            //     'Discount Amount' => Helpers::currency_converter($discount_amount),
            //     'Payment Method' => $item->payment_method,
            //     'Shipping Method Name' => isset($item->shipping)? $item->shipping->title:'not found',
            //     'Order Status' => $item->order_status,
            //     'Latitude' => isset($item->shippingAddress)? $item->shippingAddress->latitude:'not found',
            //     'Longitude' => isset($item->shippingAddress)? $item->shippingAddress->longitude:'not found',
            //     'Order Type' => $item->order_type,
            //     'City' => isset($item->shippingAddress)? $item->shippingAddress->city:'not found',
            //     'Pincode' => isset($item->shippingAddress)? $item->shippingAddress->zip:'not found',
            //     // 'Category'=>   $product_detail  variation,
            //     // 'Sub Category'=>   $product_detail  variation,
            //     // 'Sub Sub Category'=>   $product_detail  variation,
            //     // 'Product Code'=>   $product_detail  variation,
            //     // 'Order channnel'=>   $product_detail  variation,


            //     'Coupon Code' => $item->coupon_code,

            //     'Discount Type' => $item->discount_type,
            //     'Extra Discount' => Helpers::currency_converter($extra_discount),
            //     'Extra Discount Type' => $item->extra_discount_type,
            //     'Payment Status' => $item->payment_status,
            //     'Transaction_ref' => $item->transaction_ref,
            //     // //'Verification Code' => $item->verification_code,
            //     'Billing Address' => isset($item->billingAddress)? $item->billingAddress->address:'not found',
            //     'Billing Address Data' => $item->billing_address_data,
            //     'Shipping Type' => $item->shipping_type,
            //     'Shipping Address' => isset($item->shippingAddress)? $item->shippingAddress->address:'not found',
            //     'Shipping Method Id' => $item->shipping_method_id,


            //     // // 'Seller Id' => $item->seller_id,
            //     // // 'Seller Name' => isset($item->seller)? $item->seller->f_name. ' '.$item->seller->l_name:'not found',
            //     // // 'Seller Email'  => isset($item->seller)? $item->seller->email:'not found',
            //     // // 'Seller Phone'  => isset($item->seller)? $item->seller->phone:'not found',
            //     // // 'Seller Is' => $item->seller_is,
            //     // // 'Shipping Address Data' => $item->shipping_address_data,
            //     // // 'Delivery Type' => $item->delivery_type,
            //     // // 'Delivery Man Id' => $item->delivery_man_id,
            //     // // 'Delivery Service Name' => $item->delivery_service_name,
            //     // // 'Third Party Delivery Tracking Id' => $item->third_party_delivery_tracking_id,
            //     // // 'Checked' => $item->checked,

            // ];
        }

        return (new FastExcel($storage))->download('Order_All_details.xlsx');


    }
}
