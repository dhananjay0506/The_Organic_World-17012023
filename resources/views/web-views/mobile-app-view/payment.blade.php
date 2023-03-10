<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Viewport-->
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <link rel="icon" type="image/png" sizes="32x32" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="">

    {{-- <link rel="stylesheet" href="{{asset('public/assets/back-end')}}/css/toastr.css"/> --}}
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/theme.min.css">
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('public/assets/back-end')}}/css/toastr.css"/>
    @stack('css_or_js')

    {{--stripe--}}
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    {{--stripe--}}
</head>
<!-- Body-->
<body class="toolbar-enabled">

{{--loader--}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="loading" style="display: none;">
                <div style="position: fixed;z-index: 9999; left: 40%;top: 37% ;width: 100%">
                    <img width="200"
                         src="{{asset('storage/app/public/company')}}/{{\App\CPU\Helpers::get_business_settings('loader_gif')}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/loader.gif')}}'">
                </div>
            </div>
        </div>
    </div>
</div>
{{--loader--}}

<!-- Page Content-->
<div class="checkout_details container pb-5 mb-2 mb-md-4">
    <div class="row mt-5">
        @php($User = \App\User::where('id','=',$_GET['customer_id'])->first())
       

        @php($coupon_discount = session()->has('coupon_discount') ? session('coupon_discount') : 0)
        @php($amount = \App\CPU\CartManager::cart_grand_total() - $coupon_discount)

        {{-- 17-01-2023 --}}
         @php($sub_total = 0)
         @php($total_tax = 0)
         @php($total_shipping_cost = 0)
         @php($total_discount_on_product = 0)
         @php($cart = \App\CPU\CartManager::get_cart())
         @php($shipping_cost = \App\CPU\CartManager::get_shipping_cost())
         @if ($cart->count() > 0)
             @foreach ($cart as $key => $cartItem)
                 @php($sub_total += $cartItem['price'] * $cartItem['quantity'])
                 @php($total_tax += $cartItem['tax'] * $cartItem['quantity'])
                 @php($total_discount_on_product += $cartItem['discount'] * $cartItem['quantity'])
             @endforeach
             @php($total_shipping_cost = $shipping_cost)
         @else
             <span>{{ \App\CPU\translate('empty_cart') }}</span>
         @endif


         @if (session()->has('coupon_discount'))
             @php($coupon_dis = session()->has('coupon_discount') ? session('coupon_discount') : 0)
         @else
             @php($coupon_dis = 0)
         @endif
         {{-- @php($total_price = $sub_total + $total_tax + $total_shipping_cost - $coupon_dis - $total_discount_on_product) --}}
         @php($total_price = $sub_total + $total_tax  - $coupon_dis - $total_discount_on_product)

         @if ($cart_shipping->free_shipping_status == 1)
             @if ($total_price > $cart_shipping->minimum_cart_value)
                 @php($amount = \App\CPU\CartManager::cart_grand_total() - $coupon_discount - $cart_shipping->shipping_cost)
             @else
                 @php($amount = \App\CPU\CartManager::cart_grand_total() - $coupon_discount)
             @endif
         @endif
        {{-- 17-01-2023 --}}
        
        @php($config=\App\CPU\Helpers::get_business_settings('wallet_status'))
        @if($config==1)
            {{-- <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        
                            <button class="btn btn-block click-if-alone" type="submit"
                            data-toggle="modal" data-target="#wallet_submit_button">
                            
                                <img width="150" style="margin-top: -10px"
                                        src="{{asset('public/assets/front-end/img/wallet.png')}}"/>
                            </button>
                        
                    </div>
                </div>
            </div> --}}


            {{-- 17-01-2023 --}}
            <div class="col-md-12 mb-4" style="cursor: pointer">
                <div>
                    <input type="checkbox" class="wallet_payment">
                    &nbsp;<label>{{ \App\CPU\translate('Pay_using_wallet') }}</label>
                </div>
                @php($wltBalance = $User->wallet_balance)
                @php($remain_balance = $wltBalance - $amount)

                <div class="row" id="available_balence">
                    <div class="col-lg-6" >
                        <label for="">{{ \App\CPU\translate('Available_balance') }}</label>

                        <label>{{ \App\CPU\Helpers::currency_converter($wltBalance) }}</label>
                    </div>
                </div>
               
                     
                <div class="row" id="wallet_balence_checked">
                    <div class="col-lg-6">
                        <label>{{ \App\CPU\translate('remaining_balance :') }}</label>

                        {{-- for send value in razorpay, this value is wallet amount --}}

                        @php($razorpay_amount = ($wltBalance > $amount) ? 0 : $amount - $wltBalance) 
                        @php ($wallet =  $amount - $razorpay_amount)
                        
                     

                       
                        @if($wltBalance < $amount)
                            @php( $wltBalance = $wltBalance)
                        @else
                            @php( $wltBalance = $wltBalance - $remain_balance)
                        @endif

                        @if($remain_balance < 0)
                            @php($remain_balance = 0)
                        @endif

                        <label >{{ \App\CPU\Helpers::currency_converter($remain_balance) }}</label>
                        <input class="remain_balance" type="hidden" value="{{ round(\App\CPU\Convert::usdToinr($remain_balance)) * 100 }}">
                       
                    </div>
                    <div class="col-lg-6" >
                       
                            <label for="">{{\App\CPU\translate('You_used : ')}}</label>
                            <label> {{\App\CPU\Helpers::currency_converter($wltBalance)}}</label>
                            <input class="used_balance" type="hidden" value="{{\App\CPU\Helpers::currency_converter($wltBalance)}}">
                            <input class="wallet_paybale" type="hidden" value="{{\App\CPU\Helpers::currency_converter($wltBalance)}}">
                            <input type="hidden" name="user_phone" value="{{!empty($user->phone) ? $user->phone : '' }}">

                       
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-body" > --}}
                {{-- <form action="{{route('checkout-complete-wallet')}}" method="get" class="needs-validation"> --}}
                <button class="btn btn-block click-if-alone" type="submit">
                </button>


                <form action="{{ route('checkout-complete-wallet') }}" method="get"
                    class="needs-validation" id="wallet_payment">
                    @csrf
                </form>

                {{-- </form> --}}
                {{-- </div>
                </div> --}}
            </div>
            {{-- 17-01-2023 --}}
        @endif
        
        @php($user=\App\CPU\Helpers::get_customer())
        @php($config=\App\CPU\Helpers::get_business_settings('ssl_commerz_payment'))
        @if($config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <form action="{{ url('/pay-ssl') }}" method="POST" class="needs-validation">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                            <button class="btn btn-block click-if-alone" type="submit">
                                <img width="150"
                                     src="{{asset('public/assets/front-end/img/sslcomz.png')}}"/>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('paypal'))
        @if($config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <form class="needs-validation" method="POST" id="payment-form"
                              action="{{route('pay-paypal')}}">
                            {{ csrf_field() }}
                            <button class="btn btn-block click-if-alone" type="submit">
                                <img width="150"
                                     src="{{asset('public/assets/front-end/img/paypal.png')}}"/>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif


        @php($config=\App\CPU\Helpers::get_business_settings('stripe'))
        @if($config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <button class="btn btn-block click-if-alone" type="button" id="checkout-button">
                            <i class="czi-card"></i> {{\App\CPU\translate('Credit / Debit card ( Stripe )')}}
                        </button>
                        <script type="text/javascript">
                            // Create an instance of the Stripe object with your publishable API key
                            var stripe = Stripe('{{$config['published_key']}}');
                            var checkoutButton = document.getElementById("checkout-button");
                            checkoutButton.addEventListener("click", function () {
                                fetch("{{route('pay-stripe')}}", {
                                    method: "GET",
                                }).then(function (response) {
                                    console.log(response)
                                    return response.text();
                                }).then(function (session) {
                                    /*console.log(JSON.parse(session).id)*/
                                    return stripe.redirectToCheckout({sessionId: JSON.parse(session).id});
                                }).then(function (result) {
                                    if (result.error) {
                                        alert(result.error.message);
                                    }
                                }).catch(function (error) {
                                    console.error("{{\App\CPU\translate('Error')}}:", error);
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        @endif

       
        @php($config=\App\CPU\Helpers::get_business_settings('razor_pay'))
        @php($inr=\App\Model\Currency::where(['symbol'=>'???'])->first())
        @php($usd=\App\Model\Currency::where(['code'=>'usd'])->first())
        @if(isset($inr) && isset($usd) && $config['status'])

            <div class="col-md-6 mb-4 d-none" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        {{-- <form action="{!!route('payment-razor')!!}" method="POST">
                        @csrf
                        <!-- Note that the amount is in paise = 50 INR -->
                            <!--amount need to be in paisa-->
                            <input type="hidden" name="user_phone" value="{{!empty($User->phone) ? $User->phone : ''}}">
                            <input type="hidden" name="user_id" value="{{!empty($User->id) ? $User->id : ''}}">
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ \Illuminate\Support\Facades\Config::get('razor.razor_key') }}"
                                    data-amount="{{(round(\App\CPU\Convert::usdToinr($amount)))*100}}"
                                    data-buttontext="Pay {{(\App\CPU\Convert::usdToinr($amount))*100}} INR"
                                    data-name="{{\App\Model\BusinessSetting::where(['type'=>'company_name'])->first()->value}}"
                                    data-description=""
                                    data-image="{{asset('storage/app/public/company/'.\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value)}}"
                                    data-prefill.name="{{$user->f_name}}"
                                    data-prefill.email="{{$user->email}}"
                                    data-theme.color="#ff7529">
                            </script>
                        </form> --}}
                        <form action="{!! route('payment-razor-mobile') !!}" method="POST" id="razorpay_payment_form">
                            @csrf
                            <!-- Note that the amount is in paise = 50 INR -->
                            <!--amount need to be in paisa-->
                            <input type="" name="user_phone" value="{{!empty($user->phone) ? $user->phone : '' }}">
                            <input type="" name="wallet_balence" value="{{ $wallet }}">
                            <input type="" name="user_id" value="{{!empty($user->id) ? $user->id : '' }}">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" id="razorpay_script"
                                data-key="{{ \Illuminate\Support\Facades\Config::get('razor.razor_key') }}"
                                data-amount="{{ round(\App\CPU\Convert::usdToinr($razorpay_amount)) * 100 }}"
                                data-wallet="{{ $wallet }}"
                                data-buttontext="Pay {{ \App\CPU\Convert::usdToinr($razorpay_amount) * 100 }} INR"
                                data-name="{{ \App\Model\BusinessSetting::where(['type' => 'company_name'])->first()->value }}" data-description=""
                                data-image="{{ asset('storage/app/public/company/' . \App\Model\BusinessSetting::where(['type' => 'company_web_logo'])->first()->value) }}"
                                data-prefill.name="{{$user->f_name}}"
                                data-prefill.email="{{$user->email}}" data-theme.color="#ff7529" ></script>
                        </form>
                        <form action="{!! route('payment-razor-mobile') !!}" method="POST" id="razorpay_payment_form_2">
                            @csrf
                            <!-- Note that the amount is in paise = 50 INR -->
                            <!--amount need to be in paisa-->
                            <input type="hidden" name="user_phone" value="{{!empty($user->phone) ? $user->phone : '' }}">
                            <input type="hidden" name="wallet_balence" value="0">
                            <input type="" name="user_id" value="{{!empty($user->id) ? $user->id : '' }}">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" id="razorpay_script"
                                data-key="{{ \Illuminate\Support\Facades\Config::get('razor.razor_key') }}"
                                data-amount="{{ round(\App\CPU\Convert::usdToinr($amount)) * 100 }}"
                                data-wallet="0"
                                data-buttontext="Pay {{ \App\CPU\Convert::usdToinr($amount) * 100 }} INR"
                                data-name="{{ \App\Model\BusinessSetting::where(['type' => 'company_name'])->first()->value }}" data-description=""
                                data-image="{{ asset('storage/app/public/company/' . \App\Model\BusinessSetting::where(['type' => 'company_web_logo'])->first()->value) }}"
                                data-prefill.name="{{$user->f_name}}"
                                data-prefill.email="{{$user->email}}" data-theme.color="#ff7529" ></script>
                        </form>
                        <button class="btn btn-block click-if-alone" type="button"
                                onclick="$('.razorpay-payment-button').click()">
                            <img width="150"
                                 src="{{asset('public/assets/front-end/img/razor.png')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif


        @php($config=\App\CPU\Helpers::get_business_settings('paystack'))
        @if($config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        @php($config=\App\CPU\Helpers::get_business_settings('paystack'))
                        @php($order=\App\Model\Order::find(session('order_id')))
                        <form method="POST" action="{{ route('paystack-pay') }}" accept-charset="UTF-8"
                              class="form-horizontal"
                              role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="hidden" name="email"
                                           value="{{$user->email}}"> {{-- required --}}
                                    <input type="hidden" name="orderID"
                                           value="{{session('cart_group_id')}}">
                                    <input type="hidden" name="amount"
                                           value="{{\App\CPU\Convert::usdTozar($amount*100)}}"> {{-- required in kobo --}}
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency"
                                           value="{{\App\CPU\Helpers::currency_code()}}">
                                    <input type="hidden" name="metadata"
                                           value="{{ json_encode($array = ['key_name' => 'value',]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                    <input type="hidden" name="reference"
                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                    <p>
                                        <button class="paystack-payment-button" style="display: none"
                                                type="submit"
                                                value="Pay Now!"></button>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-block click-if-alone" type="button"
                                onclick="$('.paystack-payment-button').click()">
                            <img width="100"
                                 src="{{asset('public/assets/front-end/img/paystack.png')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif


        @php($myr=\App\Model\Currency::where(['code'=>'MYR'])->first())
        @php($usd=\App\Model\Currency::where(['code'=>'usd'])->first())
        @php($config=\App\CPU\Helpers::get_business_settings('senang_pay'))
        @if(isset($myr) && isset($usd) && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        @php($config=\App\CPU\Helpers::get_business_settings('senang_pay'))
                        @php($secretkey = $config['secret_key'])
                        @php($data = new \stdClass())
                        @php($data->merchantId = $config['merchant_id'])
                        @php($data->detail = 'payment')
                        @php($data->order_id = session('cart_group_id'))
                        @php($data->amount = \App\CPU\Convert::usdTomyr($amount))
                        @php($data->name = $user->f_name.' '.$user->l_name)
                        @php($data->email = $user->email)
                        @php($data->phone = $user->phone)
                        @php($data->hashed_string = md5($secretkey . urldecode($data->detail) . urldecode($data->amount) . urldecode($data->order_id)))

                        <form name="order" method="post"
                              action="https://{{env('APP_MODE')=='live'?'app.senangpay.my':'sandbox.senangpay.my'}}/payment/{{$config['merchant_id']}}">
                            <input type="hidden" name="detail" value="{{$data->detail}}">
                            <input type="hidden" name="amount" value="{{$data->amount}}">
                            <input type="hidden" name="order_id" value="{{$data->order_id}}">
                            <input type="hidden" name="name" value="{{$data->name}}">
                            <input type="hidden" name="email" value="{{$data->email}}">
                            <input type="hidden" name="phone" value="{{$data->phone}}">
                            <input type="hidden" name="hash" value="{{$data->hashed_string}}">
                        </form>

                        <button class="btn btn-block click-if-alone" type="button"
                                onclick="document.order.submit()">
                            <img width="100"
                                 src="{{asset('public/assets/front-end/img/senangpay.png')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('paymob_accept'))
        @if($config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <form class="needs-validation" method="POST" id="payment-form-paymob"
                              action="{{route('paymob-credit')}}">
                            {{ csrf_field() }}
                            <button class="btn btn-block click-if-alone" type="submit">
                                <img width="150"
                                     src="{{asset('public/assets/front-end/img/paymob.png')}}"/>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('bkash'))
        @if(isset($config)  && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <button class="btn btn-block click-if-alone" id="bKash_button" onclick="BkashPayment()">
                            <img width="100" src="{{asset('public/assets/front-end/img/bkash.png')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('paytabs'))
        @if(isset($config)  && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <button class="btn btn-block click-if-alone" onclick="location.href='{{route('paytabs-payment')}}'" style="margin-top: -11px">
                            <img width="150" src="{{asset('public/assets/front-end/img/paytabs.png')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{--@php($config=\App\CPU\Helpers::get_business_settings('fawry_pay'))
        @if(isset($config)  && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <button class="btn btn-block" onclick="location.href='{{route('fawry')}}'" style="margin-top: -11px">
                            <img width="150" src="{{asset('public/assets/front-end/img/fawry.svg')}}"/>
                        </button>
                    </div>
                </div>
            </div>
        @endif--}}

        @php($config=\App\CPU\Helpers::get_business_settings('mercadopago'))
        @if(isset($config)  && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <a class="btn btn-block click-if-alone" onclick="location.href='{{route('mercadopago.index')}}'">
                            <img width="150" src="{{asset('public/assets/front-end/img/MercadoPago_(Horizontal).svg')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('flutterwave'))
        @if(isset($config)  && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <form method="POST" action="{{ route('flutterwave_pay') }}">
                            {{ csrf_field() }}

                            <button class="btn btn-block click-if-alone" type="submit">
                                <img width="200"
                                    src="{{asset('public/assets/front-end/img/fluterwave.png')}}"/>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('paytm'))
        @if(isset($config) && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <a class="btn btn-block click-if-alone" href="{{route('paytm-payment')}}">
                            <img style="max-width: 150px; margin-top: -10px"
                                 src="{{asset('public/assets/front-end/img/paytm.png')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @php($config=\App\CPU\Helpers::get_business_settings('liqpay'))
        @if(isset($config) && $config['status'])
            <div class="col-md-6 mb-4" style="cursor: pointer">
                <div class="card">
                    <div class="card-body" style="height: 100px">
                        <a class="btn btn-block click-if-alone" href="{{route('liqpay-payment')}}">
                            <img style="max-width: 150px; margin-top: 0px"
                                 src="{{asset('public/assets/front-end/img/liqpay4.png')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-4"> 
            <button class="btn btn-primary btn-block submit_payment" >
                <span class="" >{{ \App\CPU\translate('Pay') }}</span>
                <span  class="button_amount text-white">{{$amount }}</span>
               
            </button>
    </div>
        {{-- <div class="col-4">
            <a class="btn btn-block bg-custome-warming text-white" href="{{ route('checkout-details') }}">
                <span class="d-none d-sm-inline ">{{ \App\CPU\translate('Back to Shipping') }}</span>
                <span class="d-inline d-sm-none">{{ \App\CPU\translate('Back') }}</span>
            </a>
        </div> --}}
        <div class="col-4"></div>
    </div>

     <!-- Modal -->
  {{-- <div class="modal fade" id="wallet_submit_button" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{\App\CPU\translate('wallet_payment')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php($customer_balance = $user->wallet_balance)
        @php($remain_balance = $customer_balance - $amount)
        <form action="{{route('checkout-complete-wallet')}}" method="get" class="needs-validation">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="">{{\App\CPU\translate('your_current_balance')}}</label>
                        <input class="form-control" type="text" value="{{\App\CPU\Helpers::currency_converter($customer_balance)}}" readonly>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="">{{\App\CPU\translate('order_amount')}}</label>
                        <input class="form-control" type="text" value="{{\App\CPU\Helpers::currency_converter($amount)}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="">{{\App\CPU\translate('remaining_balance')}}</label>
                        <input class="form-control" type="text" value="{{\App\CPU\Helpers::currency_converter($remain_balance)}}" readonly>
                        @if ($remain_balance<0)
                        <label style="color: crimson">{{\App\CPU\translate('you do not have sufficient balance for pay this order!!')}}</label>
                        @endif
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{\App\CPU\translate('close')}}</button>
            <button type="submit" class="btn btn-primary" {{$remain_balance>0? '':'disabled'}}>{{\App\CPU\translate('submit')}}</button>
            </div>
        </form>
      </div>
    </div>
  </div> --}}
</div>

<script src="{{asset('public/assets/front-end')}}/vendor/jquery/dist/jquery-2.2.4.min.js"></script>
<script src="{{asset('public/assets/front-end')}}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
{{--Toastr--}}
<script src={{asset("public/assets/back-end/js/toastr.js")}}></script>
<script src="{{asset('public/assets/front-end')}}/js/sweet_alert.js"></script>
{!! Toastr::message() !!}
@php($mode = \App\CPU\Helpers::get_business_settings('bkash')['environment']??'sandbox')
@if($mode=='live')
    <script id="myScript"
            src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
@else
    <script id="myScript"
            src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
@endif

<script>
    setInterval(function () {
        $('.stripe-button-el').hide()
    }, 10)

    setTimeout(function () {
        $('.stripe-button-el').hide();
        $('.razorpay-payment-button').hide();
    }, 10)
</script>

<script>
    $(document).ready(function() {
     let used_balance_data       = $('.used_balance').val();
     let used_balance            = used_balance_data.replace("\u20b9",'');
     let remain_balance_data     = $('.remain_balance').val();
     let remain_balance          = remain_balance_data.replace("\u20b9",'');

     

     $('#wallet_balence_checked').hide();
     $('.button_amount').hide();
     $(".wallet_payment").click(function() {
       
         var checked = $(this).is(':checked');
         if (checked) {
             
             $('#available_balence').hide();
             $('#wallet_balence_checked').show();
             // $('.submit_payment_button').prop("disabled", false);
             if(used_balance < remain_balance_data){
                 $('#razorpay_payment').hide();
             }
         } else {
             $('#available_balence').show();
             $('#wallet_balence_checked').hide();
             $('#razorpay_payment').show();
             // $('.submit_payment_button').prop("disabled", true);
         }
         console.log({{ $razorpay_amount}});
         console.log({{ $amount}});
     });
 });
 $(document).ready(function() {
     let used_balance_data       = $('.used_balance').val();
     let used_balance            = used_balance_data.replace("\u20b9",'');
     let remain_balance_data     = $('.remain_balance').val();
     let remain_balance          = remain_balance_data.replace("\u20b9",'');
     let wallet_paybale_data     = $('.wallet_paybale').val();
     let wallet_paybale          = wallet_paybale_data.replace("\u20b9",'');
     let amount = <?php echo json_encode($amount); ?>;

    

     $(".submit_payment").click(function() {
         var checked =  $(".wallet_payment:checkbox").is(':checked');
        //  console.log(used_balance, remain_balance);
         if (checked) {
             if(remain_balance > 0){
                 // alert("wallet_payment");

                 $("#wallet_payment").submit();
             }
             else{
                 // alert("razorpay_payment_form");
                 $("#razorpay_payment_form").submit();
                 
             }
         } else {  
         
             $("#razorpay_payment_form_2").submit();
         }
     });
 });
 </script>

<script type="text/javascript">
    function BkashPayment() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#loading').show();
        // get token
        $.ajax({
            url: "{{ route('bkash-get-token') }}",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                $('#loading').hide();
                $('pay-with-bkash-button').trigger('click');
                if (data.hasOwnProperty('msg')) {
                    showErrorMessage(data) // unknown error
                }
            },
            error: function (err) {
                $('#loading').hide();
                showErrorMessage(err);
            }
        });
    }

    let paymentID = '';
    bKash.init({
        paymentMode: 'checkout',
        paymentRequest: {},
        createRequest: function (request) {
            setTimeout(function () {
                createPayment(request);
            }, 2000)
        },
        executeRequestOnAuthorization: function (request) {
            $.ajax({
                url: '{{ route('bkash-execute-payment') }}',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    "paymentID": paymentID
                }),
                success: function (data) {
                    if (data) {
                        if (data.paymentID != null) {
                            BkashSuccess(data);
                        } else {
                            showErrorMessage(data);
                            bKash.execute().onError();
                        }
                    } else {
                        $.get('{{ route('bkash-query-payment') }}', {
                            payment_info: {
                                payment_id: paymentID
                            }
                        }, function (data) {
                            if (data.transactionStatus === 'Completed') {
                                BkashSuccess(data);
                            } else {
                                createPayment(request);
                            }
                        });
                    }
                },
                error: function (err) {
                    bKash.execute().onError();
                }
            });
        },
        onClose: function () {
            // for error handle after close bKash Popup
        }
    });

    function createPayment(request) {
        // because of createRequest function finds amount from this request
        request['amount'] = "{{round(\App\CPU\Convert::usdTobdt($amount),2)}}"; // max two decimal points allowed
        $.ajax({
            url: '{{ route('bkash-create-payment') }}',
            data: JSON.stringify(request),
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                $('#loading').hide();
                if (data && data.paymentID != null) {
                    paymentID = data.paymentID;
                    bKash.create().onSuccess(data);
                } else {
                    bKash.create().onError();
                }
            },
            error: function (err) {
                $('#loading').hide();
                showErrorMessage(err.responseJSON);
                bKash.create().onError();
            }
        });
    }

    function BkashSuccess(data) {
        $.post('{{ route('bkash-success') }}', {
            payment_info: data
        }, function (res) {
            @if(session()->has('payment_mode') && session('payment_mode') == 'app')
                location.href = '{{ route('payment-success')}}';
            @else
                location.href = '{{route('order-placed')}}';
            @endif
        });
    }

    function showErrorMessage(response) {
        let message = 'Unknown Error';
        if (response.hasOwnProperty('errorMessage')) {
            let errorCode = parseInt(response.errorCode);
            let bkashErrorCode = [2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014,
                2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030,
                2031, 2032, 2033, 2034, 2035, 2036, 2037, 2038, 2039, 2040, 2041, 2042, 2043, 2044, 2045, 2046,
                2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056, 2057, 2058, 2059, 2060, 2061, 2062,
                2063, 2064, 2065, 2066, 2067, 2068, 2069, 503,
            ];
            if (bkashErrorCode.includes(errorCode)) {
                message = response.errorMessage
            }
        }
        Swal.fire("Payment Failed!", message, "error");
    }
</script>

<script>
    function click_if_alone() {
        let total = $('.checkout_details .click-if-alone').length;
        if (Number.parseInt(total) < 2) {
            $('.click-if-alone').click()
            $('.checkout_details').html('<h1>{{\App\CPU\translate('Redirecting_to_the_payment_page')}}......</h1>');
        }
    }
    click_if_alone();
</script>

</body>
</html>
