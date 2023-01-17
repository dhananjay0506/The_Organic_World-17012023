{{-- 04-10-2022 --}}
{{-- @if (isset($product))

@if (isset($name))
@if ($name == 'fruitsVeges')
    @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
    <div class="flash_deal_product rtl" style="border:#0000000d 1px solid;cursor: pointer; height:150px;{{Session::get('direction') === "rtl" ? 'margin-right:6px;' : 'margin-left:6px;'}}"
         onclick="location.href='{{route('product',$product->slug)}}'">
        @if ($product->discount > 0)
        <div class="d-flex" style="top:0;position:absolute;">
            <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                @if ($product->discount_type == 'percent')
                    {{round($product->discount,$decimal_point_settings)}}%
                @elseif($product->discount_type =='flat')
                    {{\App\CPU\Helpers::currency_converter($product->discount)}}
                @endif {{\App\CPU\translate('off')}}
            </span>
        </div>
        @endif
        <div class=" d-flex" style="">
            <div class="d-flex align-items-center justify-content-center"
                 style="padding-{{Session::get('direction') === "rtl" ?'right:12px':'left:12px'}};padding-top:12px;">
                <div class="flash-deals-background-image">
                    <img style="height: 125px!important;width:125px!important;border-radius:5px;"
                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                     onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"/>
                </div>
            </div>
            <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                <div>
                    <div>
                        <span class="flash-product-title">
                            {{$product['name']}}
                        </span>
                    </div>
                    <div class="flash-product-review">
                        @for ($inc = 0; $inc < 5; $inc++)
                            @if ($inc < $overallRating[0])
                                <i class="sr-star czi-star-filled active"></i>
                            @else
                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                            @endif
                        @endfor
                        <label class="badge-style2">
                            ( {{$product->reviews->count()}} )
                        </label>
                    </div>
                    <div>
                        @if ($product->discount > 0)
                            <strike
                                style="font-size: 12px!important;color: #E96A6A!important;">
                                {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                            </strike>
                        @endif
                    </div>
                    <div class="flash-product-price">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))}}
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    @elseif($name == 'fruitsVeges')
    @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
    <div class="flash_deal_product rtl" style="border:#0000000d 1px solid;cursor: pointer; height:150px;{{Session::get('direction') === "rtl" ? 'margin-right:6px;' : 'margin-left:6px;'}}"
         onclick="location.href='{{route('product',$product->slug)}}'">
        @if ($product->discount > 0)
        <div class="d-flex" style="top:0;position:absolute;">
            <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                @if ($product->discount_type == 'percent')
                    {{round($product->discount,$decimal_point_settings)}}%
                @elseif($product->discount_type =='flat')
                    {{\App\CPU\Helpers::currency_converter($product->discount)}}
                @endif {{\App\CPU\translate('off')}}
            </span>
        </div>
        @endif
        <div class=" d-flex" style="">
            <div class="d-flex align-items-center justify-content-center"
                 style="padding-{{Session::get('direction') === "rtl" ?'right:12px':'left:12px'}};padding-top:12px;">
                <div class="flash-deals-background-image">
                    <img style="height: 125px!important;width:125px!important;border-radius:5px;"
                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                     onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"/>
                </div>
            </div>
            <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                <div>
                    <div>
                        <span class="flash-product-title">
                            {{$product['name']}}
                        </span>
                    </div>
                    <div class="flash-product-review">
                        @for ($inc = 0; $inc < 5; $inc++)
                            @if ($inc < $overallRating[0])
                                <i class="sr-star czi-star-filled active"></i>
                            @else
                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                            @endif
                        @endfor
                        <label class="badge-style2">
                            ( {{$product->reviews->count()}} )
                        </label>
                    </div>
                    <div>
                        @if ($product->discount > 0)
                            <strike
                                style="font-size: 12px!important;color: #E96A6A!important;">
                                {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                            </strike>
                        @endif
                    </div>
                    <div class="flash-product-price">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))}}
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endif

    @endif
@endif --}}
{{-- /04-10-2022 --}}

@if (isset($product))
    @if (isset($name))
        @if ($name == 'organic')

            @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
            <div class="flash_deal_product rtl"
                style="cursor: pointer;{{ Session::get('direction') === 'rtl' ? 'margin-right:6px;' : 'margin-left:6px;' }}">
                {{-- <div class="prodDif_3529 position-absolute end-0 top-0">
                <span class="product-discount-label"><b class="font-13 catOff_3529">25</b> % <span class="d-block">OFF</span></span>
            </div> --}}
                {{-- height:150px; --}}
                @if ($product->discount > 0)
                    <div class="d-flex" style="top:0;position:absolute;">
                        <span class="for-discoutn-value p-1 pl-2 pr-2"
                            style="{{ Session::get('direction') === 'rtl' ? 'border-radius:0px 5px' : 'border-radius:5px 0px' }};">
                            @if ($product->discount_type == 'percent')
                                {{ round($product->discount) }}%
                            @elseif($product->discount_type == 'flat')
                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                            @endif {{ \App\CPU\translate('off') }}
                        </span>
                    </div>

                @endif
                <div class="" style="">

                    {{-- d-flex --}}
                    <div class="d-flex align-items-center justify-content-center"
                        onclick="location.href='{{ route('product', $product->slug) }}'"
                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right:1.5rem' : 'left:1.5rem' }};padding-top:12px;">
                        <div class="flash-deals-background-image" style="width: 100% !important;height:100%">

                            {{-- height:125px !important --}}
                            {{-- height: 125px!important;width:125px!important; --}}
                            <img style="border-radius:5px;width:100%;height:100%;"
                                src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                        </div>
                    </div>
                    <div class="flash_deal_product_details pl-3 pr-3 pr-1  align-items-center">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                                <div>
                                    <a
                                        href="{{ route('products', ['id' => $product['brand_id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                        <span class="flash-product-title"
                                            style="font-weight: 600 !important;font-size: 11px !important;color: #69863c!important;">
                                            <u> {{ $product['brand_name'] }} </u>
                                        </span>
                                    </a>
                                </div>
                                <div onclick="location.href='{{ route('product', $product->slug) }}'">
                                    <span class="flash-product-title"
                                        style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                        {{ $product['name'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="flash-product-review">
                                    {{-- @for ($inc = 0; $inc < 5; $inc++)
                                        @if ($inc < $overallRating[0])
                                            <i class="sr-star czi-star-filled active"></i>
                                        @else
                                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                        @endif
                                    @endfor --}}
                                    <i class="sr-star czi-star-filled active" style="color:#fea569 !important"></i>
                                    <label class="badge-style2">
                                        {{-- ( --}}
                                        {{ $product->reviews->count() }}
                                        {{-- ) --}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                         
                        </div>

                         <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
                                @if ($product->discount > 0)
                                    <strike class="text-muted"
                                        style="font-size: 12px!important;    font-weight: 700 !important;">
                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                    </strike>
                                @endif
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-right">
                                <div class="flash-product-price">
                                    {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                                </div>
                            </div>
                        </div>
                        {{-- <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'"> --}}
                            {{-- <div class="product-price flash-product-price">
                                <strong id="chosen_price">
                                    {{\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))}}
                    </strong>
                </div> --}}
                            {{-- <div class="flash-product-price">
                                {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                            </div> --}}

                        {{-- </div> --}}
                        {{-- <div class="my-2">

                            <select id="selectbox"
                                style="font-size: 14px;     margin-bottom: 2rem; height: 34px;
                        background-color: #f7f7f8;
                        width: 197px;">
                                <option value="" title="Title for Item 1">Pack of 6 </option>
                                <option value="" title="Title for Item 2">Pack of 12 </option>
                            </select>
                        </div> --}}
 <a class="btn btn-primary btn-sm m-2"
                                    style="margin-top:0px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;"
                                    href="javascript:" onclick="quickView('{{ $product->id }}')">
                                    <i
                                        class="czi-eye align-middle {{ Session::get('direction') === 'rtl' ? 'ml-1' : 'mr-1' }}"></i>
                                    {{ \App\CPU\translate('Quick') }} {{ \App\CPU\translate('View') }}
                                </a>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-center align-items-center" style="width: 100;color: #69863c">
                    <div>
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3" style="width: 140px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="minus"
                                        data-field="quantity_organic_{{ $key }}" disabled="disabled"
                                        style="padding: 10px">
                                        <i class="tio-remove  font-weight-bold"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity_organic_{{ $key }}"
                                    class="form-control input-number text-center cart-qty-field" placeholder="1"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="plus"
                                        data-field="quantity_organic_{{ $key }}" style="padding: 10px">
                                        <i class="tio-add  font-weight-bold"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm"
                            style="margin-top: 10px;margin-bottom: 10px;    border-top-left-radius: 2px !important;
                border-top-right-radius: 8px !important;
                border-bottom-right-radius: 2px !important;
                border-bottom-left-radius: 8px !important;"
                            onclick="quickView({{ $product->id }})"> Add to cart</button>
                    </div>
                </div> --}}
            </div>
        @elseif($name == 'mango')
            @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
            <div class="flash_deal_product rtl"
                style="cursor: pointer;{{ Session::get('direction') === 'rtl' ? 'margin-right:6px;' : 'margin-left:6px;' }}">
                @if ($product->discount > 0)
                    <div class="d-flex" style="top:0;position:absolute;">
                        <span class="for-discoutn-value p-1 pl-2 pr-2"
                            style="{{ Session::get('direction') === 'rtl' ? 'border-radius:0px 5px' : 'border-radius:5px 0px' }};">
                            @if ($product->discount_type == 'percent')
                                {{ round($product->discount) }}%
                            @elseif($product->discount_type == 'flat')
                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                            @endif {{ \App\CPU\translate('off') }}
                        </span>
                    </div>

                @endif
                <div class="" style="">

                    <div class="d-flex align-items-center justify-content-center"
                        onclick="location.href='{{ route('product', $product->slug) }}'"
                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right:1.5rem' : 'left:1.5rem' }};padding-top:12px;">
                        <div class="flash-deals-background-image" style="width: 100% !important;height:100%">
                            @if ($key == 0)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/3468/whatsapp-image-2022-06-11-at-10.43?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 1)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/3465/untitled-design-24.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 2)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2112/untitled-design-25.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 3)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/3296/untitled-design-6.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 4)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/3295/untitled-design-7.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @else
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @endif

                        </div>
                    </div>
                    <div class="flash_deal_product_details pl-3 pr-3 pr-1  align-items-center">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                                <div>
                                    <a
                                        href="{{ route('products', ['id' => $product['brand_id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                        <span class="flash-product-title"
                                            style="font-weight: 600 !important;font-size: 11px !important;color: #69863c!important;">
                                            <u> {{ $product['brand_name'] }} </u>
                                        </span>
                                    </a>
                                </div>
                                <div onclick="location.href='{{ route('product', $product->slug) }}'">
                                    @if ($key == 0)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Mango Alphonso
                                        </span>
                                    @elseif ($key == 1)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Mango Thotapuri
                                        </span>
                                    @elseif ($key == 2)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Mango Kesar
                                        </span>
                                    @elseif ($key == 3)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Mango Banganpalli
                                        </span>
                                    @elseif ($key == 4)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Mango Sindhura
                                        </span>
                                    @else
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            {{ $product['name'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="flash-product-review">
                                    <i class="sr-star czi-star-filled active" style="color:#fea569 !important"></i>
                                    <label class="badge-style2">
                                        {{ $product->reviews->count() }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            @if ($product->discount > 0)
                                <strike class="text-muted"
                                    style="font-size: 12px!important;    font-weight: 700 !important;">
                                    {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                </strike>
                            @endif
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            <div class="flash-product-price">
                                {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                            </div>

                        </div>
                        <div class="my-2">

                            <select id="selectbox"
                                style="font-size: 14px;     margin-bottom: 2rem; height: 34px;
                        background-color: #f7f7f8;
                        width: 197px;">
                                <option value="" title="Title for Item 1">Pack of 6 </option>
                                <option value="" title="Title for Item 2">Pack of 12 </option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width: 100;color: #69863c">
                    <div>
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3" style="width: 140px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="minus"
                                        data-field="quantity_mango_{{ $key }}" disabled="disabled"
                                        style="padding: 10px">
                                        <i class="tio-remove  font-weight-bold"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity_mango_{{ $key }}"
                                    class="form-control input-number text-center cart-qty-field" placeholder="1"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="plus"
                                        data-field="quantity_mango_{{ $key }}" style="padding: 10px">
                                        <i class="tio-add  font-weight-bold"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm"
                            style="margin-top: 10px;margin-bottom: 10px;    border-top-left-radius: 2px !important;
                border-top-right-radius: 8px !important;
                border-bottom-right-radius: 2px !important;
                border-bottom-left-radius: 8px !important;"
                            onclick="quickView({{ $product->id }})"> Add to cart</button>
                    </div>
                </div>
            </div>
        @elseif($name == 'fruitsVeges')
            @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
            <div class="flash_deal_product rtl"
                style="cursor: pointer;{{ Session::get('direction') === 'rtl' ? 'margin-right:6px;' : 'margin-left:6px;' }}">
                @if ($product->discount > 0)
                    <div class="d-flex" style="top:0;position:absolute;">
                        <span class="for-discoutn-value p-1 pl-2 pr-2"
                            style="{{ Session::get('direction') === 'rtl' ? 'border-radius:0px 5px' : 'border-radius:5px 0px' }};">
                            @if ($product->discount_type == 'percent')
                                {{ round($product->discount) }}%
                            @elseif($product->discount_type == 'flat')
                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                            @endif {{ \App\CPU\translate('off') }}
                        </span>
                    </div>

                @endif
                <div class="" style="">

                    <div class="d-flex align-items-center justify-content-center"
                        onclick="location.href='{{ route('product', $product->slug) }}'"
                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right:1.5rem' : 'left:1.5rem' }};padding-top:12px;">
                        <div class="flash-deals-background-image" style="width: 100% !important;height:100%">
                            @if ($key == 0)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2139/methi-1.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 1)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2411/img_5575.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 2)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2168/img_5615-1.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 3)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2245/img_5492-copy.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 4)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/2101/img_5638.png?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @else
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @endif

                        </div>
                    </div>
                    <div class="flash_deal_product_details pl-3 pr-3 pr-1  align-items-center">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                                <div>
                                    <a
                                        href="{{ route('products', ['id' => $product['brand_id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                        <span class="flash-product-title"
                                            style="font-weight: 600 !important;font-size: 11px !important;color: #69863c!important;">
                                            <u> {{ $product['brand_name'] }} </u>
                                        </span>
                                    </a>
                                </div>
                                <div onclick="location.href='{{ route('product', $product->slug) }}'">
                                    @if ($key == 0)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Methi
                                        </span>
                                    @elseif ($key == 1)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Tomato
                                        </span>
                                    @elseif ($key == 2)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Bhendi
                                        </span>
                                    @elseif ($key == 3)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Potato
                                        </span>
                                    @elseif ($key == 4)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Banana
                                        </span>
                                    @else
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            {{ $product['name'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="flash-product-review">
                                    <i class="sr-star czi-star-filled active" style="color:#fea569 !important"></i>
                                    <label class="badge-style2">
                                        {{ $product->reviews->count() }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">

                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
                                @if ($product->discount > 0)
                                    <strike class="text-muted"
                                        style="font-size: 12px!important;    font-weight: 700 !important;">
                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                    </strike>
                                @endif
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-right">
                                <div class="flash-product-price">
                                    {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width: 100;color: #69863c">
                    <div>
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3" style="width: 140px;">
                                {{-- <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="minus"
                                        data-field="quantity_fruitsVeges_{{ $key }}" disabled="disabled"
                                        style="padding: 10px">
                                        <i class="tio-remove  font-weight-bold"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity_fruitsVeges_{{ $key }}"
                                    class="form-control input-number text-center cart-qty-field" placeholder="1"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="plus"
                                        data-field="quantity_fruitsVeges_{{ $key }}" style="padding: 10px">
                                        <i class="tio-add  font-weight-bold"></i>
                                    </button>
                                </span> --}}


                                {{-- <form id="add-to-cart-form_{{ $product->id }}" class="mb-2 add-cart-form">
                                    @csrf

                                     <div class="my-2">

                            <select id="selectbox"
                                style="font-size: 14px;     margin-bottom: 2rem; height: 34px;
                        background-color: #f7f7f8;
                        width: 197px;">
                                <option value="" title="Title for Item 1">Pack of 6 </option>
                                <option value="" title="Title for Item 2">Pack of 12 </option>
                            </select>
                        </div>
                                    <div class="row no-gutters">
                                       
                                        <div class="col-10">
                                            <div class="product-quantity d-flex align-items-center">
                                                <div class="input-group input-group--style-2 pr-3"
                                                    style="width: 160px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button"
                                                            data-type="minus" data-field="quantity_{{$product->id}}"
                                                            disabled="disabled" style="padding: 10px">
                                                            -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity_{{ $product->id }}"
                                                        class="form-control input-number text-center cart-qty-field"
                                                        placeholder="1"
                                                        value="{{ $product->minimum_order_qty ?? 1 }}"
                                                        min="{{ $product->minimum_order_qty ?? 1 }}" max="100">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button"
                                                            data-type="plus" data-field="quantity_{{$product->id}}" 
                                                            style="padding: 10px">
                                                            +
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row no-gutters d-none mt-2" id="chosen_price_div">
                                        <div class="col-2">
                                            <div class="product-description-label">
                                                {{ \App\CPU\translate('Total Price') }}:</div>
                                        </div>
                                        <div class="col-10">
                                            <div class="product-price">
                                                <strong id="chosen_price"></strong>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            @if ($product['current_stock'] <= 0)
                                                <h5 class="mt-3" style="color: red">
                                                    {{ \App\CPU\translate('out_of_stock') }}</h5>
                                            @endif
                                        </div>
                                    </div>

                                </form> --}}

                                <a class="btn btn-primary btn-sm m-2"
                                    style="margin-top:0px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;"
                                    href="javascript:" onclick="quickView('{{ $product->id }}')">
                                    <i
                                        class="czi-eye align-middle {{ Session::get('direction') === 'rtl' ? 'ml-1' : 'mr-1' }}"></i>
                                    {{ \App\CPU\translate('Quick') }} {{ \App\CPU\translate('View') }}
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <button class="btn btn-primary btn-sm"
                            style="margin-top: 10px;margin-bottom: 10px;    border-top-left-radius: 2px !important;
                border-top-right-radius: 8px !important;
                border-bottom-right-radius: 2px !important;
                border-bottom-left-radius: 8px !important;"
                            onclick="quickView({{ $product->id }})"> Add to cart</button>
                    </div> --}}
                </div>
            </div>
        @elseif($name == 'staples')
            @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
            <div class="flash_deal_product rtl"
                style="cursor: pointer;{{ Session::get('direction') === 'rtl' ? 'margin-right:6px;' : 'margin-left:6px;' }}">
                @if ($product->discount > 0)
                    <div class="d-flex" style="top:0;position:absolute;">
                        <span class="for-discoutn-value p-1 pl-2 pr-2"
                            style="{{ Session::get('direction') === 'rtl' ? 'border-radius:0px 5px' : 'border-radius:5px 0px' }};">
                            @if ($product->discount_type == 'percent')
                                {{ round($product->discount) }}%
                            @elseif($product->discount_type == 'flat')
                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                            @endif {{ \App\CPU\translate('off') }}
                        </span>
                    </div>

                @endif
                <div class="" style="">

                    <div class="d-flex align-items-center justify-content-center"
                        onclick="location.href='{{ route('product', $product->slug) }}'"
                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right:1.5rem' : 'left:1.5rem' }};padding-top:12px;">
                        <div class="flash-deals-background-image" style="width: 100% !important;height:100%">
                            @if ($key == 0)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/1571/11473_1.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 1)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/1570/11472_1.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 2)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/1523/11414_1.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 3)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/1578/11480_1.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @elseif ($key == 4)
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="https://img.theorganicworld.com/ORG-0/img/product/1611/11521_1.jpg?s=180x180"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @else
                                <img style="border-radius:5px;width:100%;height:100%;"
                                    src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                            @endif

                        </div>
                    </div>
                    <div class="flash_deal_product_details pl-3 pr-3 pr-1  align-items-center">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                                <div>
                                    <a
                                        href="{{ route('products', ['id' => $product['brand_id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                        <span class="flash-product-title"
                                            style="font-weight: 600 !important;font-size: 11px !important;color: #69863c!important;">
                                            <u> {{ $product['brand_name'] }} </u>
                                        </span>
                                    </a>
                                </div>
                                <div onclick="location.href='{{ route('product', $product->slug) }}'">
                                    @if ($key == 0)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Jaggery Powder
                                        </span>
                                    @elseif ($key == 1)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Idali Rice
                                        </span>
                                    @elseif ($key == 2)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Brown Sugar
                                        </span>
                                    @elseif ($key == 3)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Moong Yellow Dal
                                        </span>
                                    @elseif ($key == 4)
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            Urad White Whole
                                        </span>
                                    @else
                                        <span class="flash-product-title"
                                            style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                            {{ $product['name'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="flash-product-review">
                                    <i class="sr-star czi-star-filled active" style="color:#fea569 !important"></i>
                                    <label class="badge-style2">
                                        {{ $product->reviews->count() }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">

                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
                                @if ($product->discount > 0)
                                    <strike class="text-muted"
                                        style="font-size: 12px!important;    font-weight: 700 !important;">
                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                    </strike>
                                @endif
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-right">
                                <div class="flash-product-price">
                                    {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                                </div>
                            </div>

                        </div>
                        {{-- <div class="my-2">

                            <select id="selectbox"
                                style="font-size: 14px;     margin-bottom: 2rem; height: 34px;
                        background-color: #f7f7f8;
                        width: 197px;">
                                <option value="" title="Title for Item 1">Pack of 6 </option>
                                <option value="" title="Title for Item 2">Pack of 12 </option>
                            </select>
                        </div> --}}

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width: 100;color: #69863c">
                    <div>
                        <div class="product-quantity d-flex align-items-center">
                            {{-- <div class="input-group input-group--style-2 pr-3" style="width: 140px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="minus"
                                        data-field="quantity_staples_{{ $key }}" disabled="disabled"
                                        style="padding: 10px">
                                        <i class="tio-remove  font-weight-bold"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity_staples_{{ $key }}"
                                    class="form-control input-number text-center cart-qty-field" placeholder="1"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="plus"
                                        data-field="quantity_staples_{{ $key }}" style="padding: 10px">
                                        <i class="tio-add  font-weight-bold"></i>
                                    </button>
                                </span>
                            </div> --}}

                            <a class="btn btn-primary btn-sm m-2"
                                style="margin-top:0px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;"
                                href="javascript:" onclick="quickView('{{ $product->id }}')">
                                <i
                                    class="czi-eye align-middle {{ Session::get('direction') === 'rtl' ? 'ml-1' : 'mr-1' }}"></i>
                                {{ \App\CPU\translate('Quick') }} {{ \App\CPU\translate('View') }}
                            </a>
                        </div>
                    </div>
                    {{-- <div>
                        <button class="btn btn-primary btn-sm"
                            style="margin-top: 10px;margin-bottom: 10px;    border-top-left-radius: 2px !important;
                border-top-right-radius: 8px !important;
                border-bottom-right-radius: 2px !important;
                border-bottom-left-radius: 8px !important;"
                            onclick="quickView({{ $product->id }})"> Add to cart</button>
                    </div> --}}
                </div>
            </div>
        @else
            @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
            <div class="flash_deal_product rtl"
                style="cursor: pointer;{{ Session::get('direction') === 'rtl' ? 'margin-right:6px;' : 'margin-left:6px;' }}">
                {{-- <div class="prodDif_3529 position-absolute end-0 top-0">
                <span class="product-discount-label"><b class="font-13 catOff_3529">25</b> % <span class="d-block">OFF</span></span>
            </div> --}}
                {{-- height:150px; --}}
                @if ($product->discount > 0)
                    <div class="d-flex" style="top:0;position:absolute;">
                        <span class="for-discoutn-value p-1 pl-2 pr-2"
                            style="{{ Session::get('direction') === 'rtl' ? 'border-radius:0px 5px' : 'border-radius:5px 0px' }};">
                            @if ($product->discount_type == 'percent')
                                {{ round($product->discount) }}%
                            @elseif($product->discount_type == 'flat')
                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                            @endif {{ \App\CPU\translate('off') }}
                        </span>
                    </div>

                @endif
                <div class="" style="">

                    {{-- d-flex --}}
                    <div class="d-flex align-items-center justify-content-center"
                        onclick="location.href='{{ route('product', $product->slug) }}'"
                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right:1.5rem' : 'left:1.5rem' }};padding-top:12px;">
                        <div class="flash-deals-background-image" style="width: 100% !important;height:100%">

                            {{-- height:125px !important --}}
                            {{-- height: 125px!important;width:125px!important; --}}
                            <img style="border-radius:5px;width:100%;height:100%;"
                                src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                        </div>
                    </div>
                    <div class="flash_deal_product_details pl-3 pr-3 pr-1  align-items-center">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                                <div>
                                    <a
                                        href="{{ route('products', ['id' => $product['brand_id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                        <span class="flash-product-title"
                                            style="font-weight: 600 !important;font-size: 11px !important;color: #69863c!important;">
                                            <u> {{ $product['brand_name'] }} </u>
                                        </span>
                                    </a>
                                </div>
                                <div onclick="location.href='{{ route('product', $product->slug) }}'">
                                    <span class="flash-product-title"
                                        style="font-weight: 700 !important;font-size: 12px !important;color: #333!important;">
                                        {{ $product['name'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="flash-product-review">
                                    {{-- @for ($inc = 0; $inc < 5; $inc++)
                                        @if ($inc < $overallRating[0])
                                            <i class="sr-star czi-star-filled active"></i>
                                        @else
                                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                        @endif
                                    @endfor --}}
                                    <i class="sr-star czi-star-filled active" style="color:#fea569 !important"></i>
                                    <label class="badge-style2">
                                        {{-- ( --}}
                                        {{ $product->reviews->count() }}
                                        {{-- ) --}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            @if ($product->discount > 0)
                                <strike class="text-muted"
                                    style="font-size: 12px!important;    font-weight: 700 !important;">
                                    {{-- color: #E96A6A!important; --}}
                                    {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                </strike>
                            @endif
                        </div>
                        <div class="row" onclick="location.href='{{ route('product', $product->slug) }}'">
                            {{-- <div class="product-price flash-product-price">
                                <strong id="chosen_price">
                                    {{\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))}}
                    </strong>
                </div> --}}
                            <div class="flash-product-price">
                                {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                            </div>

                        </div>
                        <div class="my-2">

                            <select id="selectbox"
                                style="font-size: 14px;     margin-bottom: 2rem; height: 34px;
                        background-color: #f7f7f8;
                        width: 197px;">
                                <option value="" title="Title for Item 1">Pack of 6 </option>
                                <option value="" title="Title for Item 2">Pack of 12 </option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width: 100;color: #69863c">
                    <div>
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3" style="width: 140px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="minus"
                                        data-field="quantity{{ $key }}" disabled="disabled"
                                        style="padding: 10px">
                                        <i class="tio-remove  font-weight-bold"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity{{ $key }}"
                                    class="form-control input-number text-center cart-qty-field" placeholder="1"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button class="btn btn-number text-dark" type="button" data-type="plus"
                                        data-field="quantity{{ $key }}" style="padding: 10px">
                                        <i class="tio-add  font-weight-bold"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm"
                            style="margin-top: 10px;margin-bottom: 10px;    border-top-left-radius: 2px !important;
                border-top-right-radius: 8px !important;
                border-bottom-right-radius: 2px !important;
                border-bottom-left-radius: 8px !important;"
                            onclick="quickView({{ $product->id }})"> Add to cart</button>
                    </div>
                </div>
            </div>
        @endif

    @endif
@endif
