<div class="feature_header">
    <span>{{ \App\CPU\translate('shopping_cart') }}</span>
</div>

<!-- Grid-->
<hr class="view_border">
@php($shippingMethod = \App\CPU\Helpers::get_business_settings('shipping_method'))
@php(
    $cart = \App\Model\Cart::where(['customer_id' => auth('customer')->id()])
                            ->get()
                            ->groupBy('cart_group_id')
)

<div class="row">
    <style>
       @media (max-width: 400px) {
            .max_width{
            width: max-content !important;
            }
            .max_width {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 160px;
            }
            .max_width_2 {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 148px;
            }
        }
    </style>
    <!-- List of items-->
    <section class="col-lg-8">
        

        @foreach ($cart as $group_key => $group)
            <div class="cart_information mb-3">
                @foreach ($group as $cart_key => $cartItem)
                    @if ($shippingMethod == 'inhouse_shipping')
                        <?php
                        
                        $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                        $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                        
                        ?>
                    @else
                        <?php
                        if ($cartItem->seller_is == 'admin') {
                            $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                            $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                        } else {
                            $seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                            $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                        }
                        ?>
                    @endif

                    @if ($cart_key == 0)
                        @if ($cartItem->seller_is == 'admin')
                            <b>
                                <span>{{ \App\CPU\translate('shop_name') }} : </span>
                                <a
                                    href="{{ route('shopView', ['id' => 0]) }}">{{ \App\CPU\Helpers::get_business_settings('company_name') }}</a>
                            </b>
                        @else
                            <b>
                                <span>{{ \App\CPU\translate('shop_name') }}:</span>
                                <a href="{{ route('shopView', ['id' => $cartItem->seller_id]) }}">
                                    {{ \App\Model\Shop::where(['seller_id' => $cartItem['seller_id']])->first()->name }}
                                </a>
                            </b>
                        @endif
                    @endif
                @endforeach
                <div class="table-responsive">
                    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        style="width: 100%">
                        <thead class="">
                            <tr class="">
                                <th class="font-weight-bold d-none" style="width: 5%;">{{ \App\CPU\translate('SL#') }}</th>
                                @if ($shipping_type != 'order_wise')
                                    <th class="font-weight-bold" style="width: 30%;">
                                        {{ \App\CPU\translate('product_details') }}</th>
                                @else
                                    <th class="font-weight-bold" style="width: 45%;">
                                        {{ \App\CPU\translate('product_details') }}</th>
                                @endif
                                <th class="font-weight-bold d-none d-md-block" style="width: 15%;">{{ \App\CPU\translate('unit_price') }}
                                </th>
                                <th class="font-weight-bold" style="width: 15%;">{{ \App\CPU\translate('qty') }}</th>
                                <th class="font-weight-bold" style="width: 15%;">{{ \App\CPU\translate('price') }}</th>
                                @if ($shipping_type != 'order_wise')
                                    <th class="font-weight-bold" style="width: 15%;">
                                        {{ \App\CPU\translate('shipping_cost') }} </th>
                                @endif
                                <th class="font-weight-bold" style="width: 5%;"></th>
                            </tr>
                        </thead>

                     {{-- @php($product =  \App\Model\Product::where() ) --}}
                        @foreach ($group as $cart_key => $cartItem)
                       
                       

                        @php($Product = \App\Model\Product::select('unit')->where('products.id','=',$cartItem['product_id'])->first())

                   
                            <tbody>
                                <tr>
                                    <td class="d-none">{{ $cart_key + 1 }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div style="width: 30%;" class="d-none d-md-block">
                                                <a href="{{ route('product', $cartItem['slug']) }}">
                                                    <img style="height: 62px;"
                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                        src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $cartItem['thumbnail'] }}"
                                                        alt="Product">
                                                </a>
                                            </div>
                                            <div class="ml-2 text-break max_width" style="width:70%;">
                                                <a
                                                    href="{{ route('product', $cartItem['slug']) }}">{{ $cartItem['name'] }}</a>

                                            </div>

                                        </div>
                                        <div class="d-flex">

                                            
                                            @foreach (json_decode($cartItem['variations'], true) as $key1 => $variation)
                                                <div class="text-muted mr-2">
                                                    <span
                                                        class="{{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"
                                                        style="font-size: 12px;">
                                                        {{ $key1 }} : {{ $variation }} {{$Product->unit}}</span>

                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="d-none d-md-block">
                                        <div class=" text-accent">
                                            {{ \App\CPU\Helpers::currency_converter($cartItem['price'] - $cartItem['discount']) }}
                                            @if ($cartItem['discount'] > 0)
                                                <strike style="font-size: 12px!important;color: grey!important;">
                                                    {{ \App\CPU\Helpers::currency_converter($cartItem['price']) }}
                                                </strike>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            @php($minimum_order = \App\Model\Product::select('minimum_order_qty')->find($cartItem['product_id']))
                                            {{-- <select name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"
                                                onchange="updateCartQuantity('{{$cartItem['id']}}')">
                                            @for ($i = $minimum_order_limit ?? 1; $i <= 10; $i++)
                                                <option
                                                    value="{{$i}}" {{$cartItem['quantity'] == $i?'selected':''}}>
                                                    {{$i}}
                                                </option>
                                            @endfor
                                        </select> --}}
                                            <input style="width: 75px;" type="number"
                                                name="quantity[{{ $cartItem['id'] }}]"
                                                id="cartQuantity{{ $cartItem['id'] }}"
                                                onchange="updateCartQuantity('{{ $minimum_order->minimum_order_qty }}', '{{ $cartItem['id'] }}')"
                                                min="{{ $minimum_order->minimum_order_qty ?? 1 }}"
                                                value="{{ $cartItem['quantity'] }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ \App\CPU\Helpers::currency_converter(($cartItem['price'] - $cartItem['discount']) * $cartItem['quantity']) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($shipping_type != 'order_wise')
                                            {{ \App\CPU\Helpers::currency_converter($cartItem['shipping_cost']) }}
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-link px-0 text-danger"
                                            onclick="removeFromCart({{ $cartItem['id'] }})" type="button"><i
                                                class="czi-close-circle {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"></i>
                                        </button>
                                    </td>
                                </tr>

                                @if ($shippingMethod == 'sellerwise_shipping' && $shipping_type == 'order_wise')
                                    @php($choosen_shipping = \App\Model\CartShipping::where(['cart_group_id' => $cartItem['cart_group_id']])->first())
                                    @php($minumum_cart_value = \App\Model\CartShipping::select('minimum_cart_value','free_shipping_status')->where(['cart_group_id' => $cartItem['cart_group_id']])->join('shipping_methods','shipping_methods.id','cart_shippings.shipping_method_id')->first())

                                    @if (isset($choosen_shipping) == false)
                                        @php($choosen_shipping['shipping_method_id'] = 0)
                                    @endif

                                    @php($shippings = \App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'], $cartItem['seller_is']))
                                    
                                    
                                    <tr>
                                        <td colspan="4">

                                            @if ($cart_key == $group->count() - 1)
                                                <!-- choosen shipping method-->

                                                <div class="row">

                                                    <div class="col-12">
                                                        <select class="form-control"
                                                            onchange="set_shipping_id(this.value,'{{ $cartItem['cart_group_id'] }}')">
                                                            <option>{{ \App\CPU\translate('choose_shipping_method') }}
                                                            </option>
                                                            @foreach ($shippings as $shipping)
                                                                <option value="{{ $shipping['id'] }}"
                                                                    {{ $choosen_shipping['shipping_method_id'] == $shipping['id'] ? 'selected' : '' }}>
                                                                    {{ $shipping['title'] . ' ( ' . $shipping['duration'] . ' ) ' . \App\CPU\Helpers::currency_converter($shipping['cost']) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <div>     
                                                          {{-- {{isset($cart_shipping->minimum_cart_value) ? $cart_shipping->minimum_cart_value : 0}}                   
                                                          {{isset($cart_shipping->free_shipping_status) ? $cart_shipping->free_shipping_status : 0}}                    --}}
                                            <input type="hidden" class="minimum_cart_value" value="{{isset($cart_shipping->minimum_cart_value) ? $cart_shipping->minimum_cart_value : 0}}">
                                            <input type="hidden" class="free_shipping_status" value=" {{isset($cart_shipping->free_shipping_status) ? $cart_shipping->free_shipping_status : 0}} ">
                                        </div>
                                        {{-- <td colspan="3">
                                            @if ($cart_key == $group->count() - 1)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>
                                                            <b>{{ \App\CPU\translate('shipping_cost') }} : </b>
                                                        </span>
                                                        {{ \App\CPU\Helpers::currency_converter($choosen_shipping['shipping_method_id'] != 0 ? $choosen_shipping->shipping_cost : 0) }}
                                                    </div>
                                                </div>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endif
                            </tbody>
                        @endforeach
                    </table>
                    <div class="mt-3">
                    </div>

                </div>
            </div>


        @if ($shippingMethod == 'inhouse_shipping')
            <?php
            $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
            $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
            ?>
            @if ($shipping_type == 'order_wise')
                @php($shippings = \App\CPU\Helpers::get_shipping_methods(1, 'admin'))
                @php($choosen_shipping = \App\Model\CartShipping::where(['cart_group_id' => $cartItem['cart_group_id']])->first())

                @if (isset($choosen_shipping) == false)
                    @php($choosen_shipping['shipping_method_id'] = 0)
                @endif
                <div class="row">
                    <div class="col-12">
                        <select class="form-control" onchange="set_shipping_id(this.value,'all_cart_group')">
                            <option>{{ \App\CPU\translate('choose_shipping_method') }}</option>
                            @foreach ($shippings as $shipping)
                                <option value="{{ $shipping['id'] }}"
                                    {{ $choosen_shipping['shipping_method_id'] == $shipping['id'] ? 'selected' : '' }}>
                                    {{ $shipping['title'] . ' ( ' . $shipping['duration'] . ' ) ' . \App\CPU\Helpers::currency_converter($shipping['cost']) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endif

        @if ($cart->count() == 0)
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="text-danger text-capitalize">{{ \App\CPU\translate('cart_empty') }}</h4>
            </div>
        @endif


        <form method="get">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="phoneLabel" class="form-label input-label">{{ \App\CPU\translate('order_note') }}
                            <span class="input-label-secondary">({{ \App\CPU\translate('Optional') }})</span></label>
                        <textarea class="form-control" id="order_note" name="order_note" style="width:100%;">{{ session('order_note') }}</textarea>
                    </div>
                </div>
            </div>
        </form>


        <div class="row pt-2">
            <div class="col-6">
                <a href="{{ route('home') }}" class="btn btn-primary max_width_2">
                    <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'forward' : 'backward' }} px-1"></i>
                    {{ \App\CPU\translate('continue_shopping') }}
                </a>
            </div>

            <div class="col-6">
                <a onclick="checkout()"
                    class="btn btn-primary pull-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}">
                    {{ \App\CPU\translate('checkout') }}
                    <i class="fa fa-{{ Session::get('direction') === 'rtl' ? 'backward' : 'forward' }} px-1"></i>
                </a>
            </div>
        </div>
                @endforeach
    </section>
    <!-- Sidebar-->
    @include('web-views.partials._order-summary')
</div>


<script>
    cartQuantityInitialize();

    function set_shipping_id(id, cart_group_id) {
        
        $.get({
            url: '{{ url('/') }}/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                location.reload();
            },
            complete: function() {
                $('#loading').hide();
            },
        });
    }
</script>
<script>
    function checkout() {
        let order_note = $('#order_note').val();
        let compare_price_1 = $('.compare_price').val();
        let compare_price = compare_price_1.replace("\u20b9",'');
        let minimum_cart_value = $('.minimum_cart_value').val();
        let free_shipping_status = $('.free_shipping_status').val();
        //console.log(order_note);
        console.log(compare_price, minimum_cart_value, free_shipping_status);

        if(free_shipping_status == 1){
            // if(compare_price > minimum_cart_value){
            //     Swal.fire({
            //     title: '{{\App\CPU\translate('Wow')}}',
            //     text: "{{\App\CPU\translate('Congratulation you are eligible for free shipping')}}",
            //     showCancelButton: false,
            //     showConfirmButton: false,
            //     timer: 2000,
            //     // confirmButtonColor: '#377dff',
            //     // cancelButtonColor: 'secondary',
            //     // confirmButtonText: '{{\App\CPU\translate('Yes, Change it')}}!'
            // }).then((result) => {
                        $.post({
                            url: "{{ route('order_note') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                order_note: order_note,

                            },
                            beforeSend: function() {
                                $('#loading').show();
                            },
                            success: function(data) {
                                let url = "{{ route('checkout-details') }}";
                                location.href = url;

                            },
                            complete: function() {
                                $('#loading').hide();
                            },
                });
            // })
            // }
        }else{
                    $.post({
                            url: "{{ route('order_note') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                order_note: order_note,

                            },
                            beforeSend: function() {
                                $('#loading').show();
                            },
                            success: function(data) {
                                let url = "{{ route('checkout-details') }}";
                                location.href = url;

                            },
                            complete: function() {
                                $('#loading').hide();
                            },
                });
        }
        
    }
</script>
