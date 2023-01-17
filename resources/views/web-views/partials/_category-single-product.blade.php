@php

$overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    $productReviews = \App\CPU\ProductManager::get_product_review($product->id);

    @endphp
<style>
    /* .quick-view{
        display: none;
        padding-bottom: 8px;
    } */
    /* .product-single-hover{
        box-shadow: 0px 0px 5px rgba(0, 113, 220, 0.15);
        border-radius: 5px;
    } */
    .quick-view , .single-product-details{
        background: #ffffff;
    }
    /* .product-single-hover:hover > .single-product-details {
        
        margin-top:-39px;
    } */
    /* .product-single-hover:hover >  .quick-view{
        display: block;
    } */
.border_product-single-hover
    {
        background: #FFFFFF;
    border: 1px solid #ABABAB;
    border-radius: 20px;
    }
    
</style>

{{-- quick view hovr run properly only add the product-single-hover class in below --}}
<div class=" border_product-single-hover" >
    <div class=" inline_product clickable d-flex justify-content-center" 
            style="cursor: pointer;max-height: 195px;">
        @if($product->discount > 0)
            <div class="d-flex" style="left:5px;top:30px;position: absolute">
                    <span class="for-discoutn-value p-1 pl-2 pr-2">
                    @if ($product->discount_type == 'percent')
                            {{round($product->discount,$decimal_point_settings)}}%
                        @elseif($product->discount_type =='flat')
                            {{\App\CPU\Helpers::currency_converter($product->discount)}}
                        @endif
                        {{\App\CPU\translate('off')}}
                    </span>
            </div>
        @else
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
        @endif
        <div class="d-flex d-block " style="text-align: -webkit-center;cursor: pointer;">
            <a href="{{route('product',$product->slug)}}">
                <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                    style="width: 80%;border-radius: 30px 30px 0px 0px;">
            </a>
        </div>
    </div>
    <div class="single-product-details" style="position:relative;min-height:105px;border-radius: 0px 0px 20px 20px;">
        <div class="text-center p-1" style="height: 55px;">
            <a href="{{route('product',$product->slug)}}" style="font-weight: 500;
                font-size: 14px; ">
                {{ Str::limit($product['name'], 50) }}
            </a>
        </div>
        {{-- <div class="rating-show justify-content-between text-center">
            <span class="d-inline-block font-size-sm text-body" style="font-weight: 400;
            font-size: 10px;">
                @for($inc=0;$inc<5;$inc++)
                    @if($inc<$overallRating[0])
                        <i class="sr-star czi-star-filled active"></i>
                    @else
                        <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                    @endif
                @endfor
                <label class="badge-style">( {{$product->reviews_count}} )</label>
            </span>
        </div> --}}
        {{-- <div class="justify-content-between text-center">
            <div class="product-price text-center" style="font-weight: 400;
            font-size: 12px;">
                @if($product->discount > 0)
                    <strike style="font-size: 12px!important;color: #E96A6A!important;">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                    </strike><br>
                @endif
                <span class="text-accent">
                    {{\App\CPU\Helpers::currency_converter(
                        $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                    )}}
                </span>
            </div>
        </div> --}}

        {{-- 24-11-2022 --}}
        {{-- <form id="add-to-cart-form" class="mb-2">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
        
        @foreach (json_decode($product->choice_options) as $key => $choice)
        <div class="flex-start">
            <div>
                <ul class=" checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                    
                <select class="form-control" name="" id="">
                        <option value="0" selected disabled>---{{\App\CPU\translate('Select')}}---</option>
                        @foreach($choice->options as  $key =>$option)
                            <option
                                value="{{$option}}" @if($key == 0) selected @endif>{{$option}}  {{$product->unit}}</option>
                        @endforeach
                </select>
                </ul>
            </div>
        </div>
    @endforeach
    

    <div class="row no-gutters mt-2" id="chosen_price_div">
        <div class="col-2">
            <div class="product-description-label">{{\App\CPU\translate('Total Price')}}:</div>
        </div>
        <div class="col-10">
            <div class="product-price">
                <strong id="chosen_price"></strong>
            </div>
        </div>
        <div class="col-12">
            @if($product['current_stock']<=0)
                <h5 class="mt-3" style="color: red">{{\App\CPU\translate('out_of_stock')}}</h5>
            @endif
        </div>
    </div>
</form> --}}



<style>
    .product-title2 {
        /* font-family: 'Roboto', sans-serif !important; */
        font-weight: 400;
        font-size: 22px;
        color: #000000;
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
        line-height: 1.2em;
    }

    .cz-product-gallery {
        display: block;
    }

    .cz-preview {
        width: 100%;
        margin-top: 0;
        margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;
        max-height: 100% !important;
    }

    .cz-preview-item > img {
        width: 80%;
    }

    .details {
        /* border: 1px solid #E2F0FF; */
        border-radius: 3px;
        padding: 16px;
        padding-top: 0px;
        padding-bottom: 7px;
    }

    img, figure {
        max-width: 100%;
        vertical-align: middle;
    }

    .cz-thumblist-item {
        display: block;
        position: relative;
        width: 64px;
        height: 64px;
        margin: .625rem;
        transition: border-color 0.2s ease-in-out;
        border: 1px solid #E2F0FF;
        border-radius: .3125rem;
        text-decoration: none !important;
        overflow: hidden;
    }

    .for-hover-bg {
        font-size: 18px;
        height: 45px;
    }

    .cz-thumblist-item > img {
        display: block;
        width: 80%;
        transition: opacity .2s ease-in-out;
        max-height: 58px;
        opacity: .6;
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .cz-preview-item > img {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .cz-thumblist {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0;
            padding-top: 1rem;
            padding-right: 22px;
            padding-bottom: 10px;
        }

        .cz-thumblist-item {
            margin: 0px;
        }

        .cz-thumblist {
            padding-top: 8px !important;
        }

        .cz-preview-item > img {
            width: 100%;
        }
    }
    .btn-sm {
    padding: 0.425rem 0.8rem;
}
</style>




    <div class="row ">
       
        <!-- Product details-->
        <div class="col-lg-12 mt-n3">
            <div class="details" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                {{-- <a href="{{route('product',$product->slug)}}" class="mb-2 product-title">{{$product->name}}</a> --}}
                {{-- <div class="d-flex align-items-center mb-2 pro">
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'ml-2 pl-2' : 'mr-2 pr-2'}}">{{$overallRating[0]}}</span>
                    <div class="star-rating">
                        @for($inc=0;$inc<5;$inc++)
                            @if($inc<$overallRating[0])
                                <i class="sr-star czi-star-filled active"></i>
                            @else
                                <i class="sr-star czi-star"></i>
                            @endif
                        @endfor
                    </div>
                    <div>
                        <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 {{Session::get('direction') === "rtl" ? 'ml-2 mr-1' : 'ml-1 mr-2'}} pl-2 pr-2">{{$overallRating[1]}} {{\App\CPU\translate('reviews')}}</span>
                        <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px"></span>
                        <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px">    </span>
                       
                    </div>
                </div> --}}
                {{-- <div class="mb-3">
                    <span
                        class="h3 font-weight-normal text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}">
                        {{\App\CPU\Helpers::get_price_range($product) }}
                    </span>
                    @if($product->discount > 0)
                        <strike style="font-size: 12px!important;color: grey!important;">
                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                        </strike>
                    @endif
                </div> --}}

                {{-- @if($product->discount > 0)
                    <div class="flex-start mb-3">
                        <div><strong>{{\App\CPU\translate('discount')}} : </strong></div>
                        <div><strong id="set-discount-amount" class="mx-2"></strong></div>
                    </div>
                @endif --}}

                {{-- <div class="flex-start mb-3">
                    <div><strong>{{\App\CPU\translate('tax')}} : </strong></div>
                    <div><strong id="set-tax-amount" class="mx-2"></strong></div>
                </div> --}}

                {{-- <form id="add-to-cart-form1" class="mb-2"> --}}
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="position-relative {{Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'}} mb-3">
                        @if (count(json_decode($product->colors)) > 0)
                            <div class="flex-start">
                                <div class="product-description-label mt-2">
                                    {{\App\CPU\translate('color')}}:
                                </div>
                                <div class="">
                                    <ul class="flex-start checkbox-color mb-1" style="list-style: none;">
                                        @foreach (json_decode($product->colors) as $key => $color)
                                            <li>
                                                <input type="radio"
                                                       id="{{ $product->id }}-color-{{ $key }}"
                                                       name="color" value="{{ $color }}"
                                                       @if($key == 0) checked @endif>
                                                <label style="background: {{ $color }};"
                                                       for="{{ $product->id }}-color-{{ $key }}"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                       

                    </div>
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                    {{-- @dd($choice->name) --}}
                        <div class="flex-start">
                            {{-- <div class="product-description-label mt-2 ">
                                {{ $choice->title }}:
                            </div> --}}
                            
                           
                                {{-- <ul class=" checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2"> --}}

                                                              
                                {{-- @foreach ($choice->options as $key => $option)
                                        <span>
                                            <input type="radio"
                                                   id="{{ $choice->name }}-{{ $option }}"
                                                   name="{{ $choice->name }}" value="{{ $option }}"
                                                   @if($key == 0) checked @endif>
                                            <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                        </span>
                                    @endforeach --}}

                                {{-- {{$choice->options[0]}} --}}
                                    @if (count($choice->options) == 1)
                                    
                                    @foreach ($choice->options as $key => $option)
                                     
                                            <span>
                                                {{-- <input type="radio"
                                                    id="{{ $choice->name }}-{{ $option }}"
                                                    name="{{ $choice->name }}" value="{{ $option }}"
                                                    @if($key == 0) checked @endif> --}}
                                                <label for="{{ $choice->name }}-{{ $option }}"><b>{{ $option }}&nbsp;{{$product->unit}}</b></label>
                                            </span>
                                    @endforeach
                                    @else
                                    <select class="mt-0 ml-1 mr-1 mb-1" id="variant_{{$product->id}}" style="padding: 5px; border: 1px solid #dddbdb; border-radius: 8px; width: 100%; font-size: 14px;" onchange="varientprice1({{$product->id}},this.value,'','{{$choice->name}}')">
                                        {{-- <option value="0">---{{\App\CPU\translate('select')}}---</option> --}}
                                        @foreach($choice->options as $option)
                                            <option
                                                value="{{$option}}">{{$option}}&nbsp;{{$product->unit}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                
                          
                           
                        </div>
                    @endforeach

                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2" style="font-size: 12px;">{{\App\CPU\translate('Qty')}}:</div>
                        </div>
                        <div class="col-7">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="input-group input-group--style-2"
                                     style="width: 160px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button"
                                                data-type="minus" data-field="quantity_{{$product->id}}"
                                                disabled="disabled" style="padding: 10px" data-product_id="{{$product->id}}">
                                            -
                                        </button>
                                    </span>
                                    <input type="text" name="quantity_{{$product->id}}" id="quantity_{{$product->id}}"  data-quantity="quantity_{{$product->id}}"
                                           class=" input-number text-center cart-qty-field"
                                           placeholder="1" value="{{ $product->minimum_order_qty ?? 1 }}" min="{{ $product->minimum_order_qty ?? 1 }}" max="100" style="padding: 5px; border: 1px solid #dddbdb; border-radius: 8px; font-size: 13px; width: 40px;height: 35px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="plus"
                                                data-field="quantity_{{$product->id}}" style="padding: 10px" data-product_id="{{$product->id}}">
                                           +
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            @if($product['current_stock']<=0)
                                <h5 class="" style="color: red; font-size: 10px;">{{\App\CPU\translate('out_of_stock')}}</h5>
                            @else
                                <h5 class="" style="color: red; font-size: 10px;">{{\App\CPU\translate('in_stock')}}</h5>
                            @endif
                        </div>
                    </div>

                    
                    
                    <div class="d-flex justify-content-between text-center">
                        <div class="product-price text-center" style="font-weight: 400;font-size: 12px;">
                        @if(isset($choice->options))
                        @if(count($choice->options) == 1)
                        <span>
                            @if($product->discount > 0)
                                <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                    {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                </strike>
                            @endif
                            </span>
                            <span class="text-accent ml-lg-5" id="chosen_price_{{$product->id}}">
                                {{\App\CPU\Helpers::currency_converter(
                                    $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                                )}}
                            </span>
                       
                            @else
                                <span>
                                    @if($product->discount > 0)
                                        <strike id="discount_{{$product->id}}" style="font-size: 12px!important;color: #E96A6A!important;">
                                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                        </strike>
                                    @endif
                                </span>
                                <span class="text-accent ml-lg-5">
                                    @php
                                    $choice_options = json_decode("$product->choice_options")[0]->options;
                                        
                                            $arr = json_decode("$product->variation");
                                            
                                            $narr = array_values(array_filter($arr, function($f) use ($choice_options){
                                            return $f->type == $choice_options[0];}));       
                                    @endphp
                                
                                    {{-- <div class="product-price"> --}}
                                        <strong id="chosen_price_{{$product->id}}">{{\App\CPU\Helpers::currency_converter(
                                            ($narr[0]->price)-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price)) 
                                        )}}</strong>
                                    {{-- </div> --}}
                                </span>
                                
                                @endif
                                @endif
                        </div>
                    </div>
                
                    <div class="d-flex mt-2 justify-content-center">
                        <div class="row ml-lg-n2 ml-0">
                            <div class="col-6">
                                <button class="btn bg-custome-warming btn-sm ml-lg-n2 text-white" onclick="buy_now('dynamic-form',true,{{$product->id}})"
                                        type="button"
                                        style="border-radius: 10px">&nbsp;
                                    {{\App\CPU\translate('buy_now')}} &nbsp;
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm string-limit"
                                        onclick="addToCart('dynamic-form',false,{{$product->id}})"
                                        type="button"
                                        style="border-radius: 10px">
                                    {{\App\CPU\translate('add_to_cart')}}
                                </button>
        
                            </div>    
                        </div>                                    
                    </div>
                   
                {{-- </form> --}}
                <!-- Product panels-->
            </div>
        </div>
    </div>




        {{-- 24-11-2022 --}}
        
    </div>
    {{-- <div class="text-center quick-view" >
        @if(Request::is('product/*'))
            <a class="btn btn-primary btn-sm" href="{{route('product',$product->slug)}}">
                <i class="czi-forward align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                {{\App\CPU\translate('View')}}
            </a>
        @else
            <a class="btn btn-primary btn-sm"
            style="margin-top:0px;padding-top:30px;padding-bottom:5px;padding-left:10px;padding-right:10px;" href="javascript:"
               onclick="quickView('{{$product->id}}')">
                <i class="czi-eye align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                {{\App\CPU\translate('Quick')}}   {{\App\CPU\translate('View')}}
            </a>
        @endif
    </div> --}}
</div>


<script src="https://happyharvest.reapmind.com/public/assets/front-end/vendor/jquery/dist/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    cartQuantityInitialize1();
    // getVariantPrice();
    $('#add-to-cart-form1 input').on('change', function (e) {
        // getVariantPrice();
        // console.log(e);
    });

    $(document).ready(function() {
       
        cartQuantityInitialize()
       
        $('.click-img').click(function(){
            var idimg = $(this).attr('id');s
            var srcimg = $(this).attr('src');
            $(".show-imag").attr('src',srcimg);
        });
    });
    // function quickView(product_id) {
    //     $.get({
    //         url: '{{route('quick-view')}}',
    //         dataType: 'json',
    //         data: {
    //             product_id: product_id
    //         },
    //         beforeSend: function () {
    //             $('#loading').show();
    //         },
    //         success: function (data) {
    //             console.log("success...")
    //             $('#quick-view').modal('show');
    //             $('#quick-view-modal').empty().html(data.view);
    //         },
    //         complete: function () {
    //             $('#loading').hide();
    //         },
    //     });
    // }

    function varientprice1(product_id,value,qty,choice_key=''){
        // console.log(choice_key);
        // console.log(product_id,value,quantity);
        // console.log(document.getElementById('variant_'+product_id).value);
        var  quantity = $('#quantity_'+product_id).val();
        var pos_obj = {
                _token : @json(csrf_token()),
                id: product_id,
               
                quantity : quantity
            };

            value !="" ? pos_obj[(choice_key == '' ? 'choice_1' : choice_key)] = value : '';
    $.post({
            url: '{{route('cart.variant_price')}}',
            dataType: 'json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
            data: pos_obj,
            beforeSend: function () {
                // $('#loading').show();
            },
            success: function (data) {
            //    console.log(data);
                // $('#add-to-cart-form1 #chosen_price_div').removeClass('d-none');
                //     $('#add-to-cart-form1 #chosen_price_div #chosen_price').html(data.price);
                //     $('#set-discount-amount').html(data.discount);
               $('#chosen_price_'+product_id).html(data.price);
               // for
               var numOne, numTwo, sum;
                numOne = (data.discount).slice(1);
                numTwo = (data.price).slice(1);
                sum = parseFloat(numOne) + parseFloat(numTwo);
               $('#discount_'+product_id).html(data.discount.charAt(0)+sum);
               console.log(data);
               document.getElementById('chosen_price_'+product_id).innerHTML = data.price
            //     $('#set-discount-amount').html(data.discount);
                // $('#quick-view').modal('show');
                // $('#quick-view-modal').empty().html(data.view);
            },
            complete: function () {
                // $('#loading').hide();
            },
        });
    }

    // 27-11-2022 
    // for plus minus quantity
    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form1 input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    function cartQuantityInitialize1() {
       
        $('.btn-number').click(function (e) {
            e.stopImmediatePropagation();
            e.preventDefault();
            // console.log(e);

            var fieldName = $(this).attr('data-field');

            // console.log(fieldName);
            var type = $(this).attr('data-type');
            // console.log(type);

            // var input = $("input[name='quantity_']");
            var product_id = $(this).attr('data-product_id');
            var input = $(`input[name="${fieldName}"]`);
            // console.log(input);
            var currentVal = parseInt(input.val());
            // console.log(currentVal);
            
            var variation_value = $('#variant_'+product_id).val();

            typeof variation_value != "undefined" && variation_value != null && variation_value != "" ? '' : variation_value = '';
            // console.log(variation_value);

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();

                        //
                        varientprice1(product_id,variation_value,currentVal-1);
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();

                        varientprice1(product_id,variation_value,currentVal+1);

                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {


            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, the minimum value was reached'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, stock limit exceeded.'
                });
                $(this).val($(this).data('oldValue'));
            }
        });

        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    // function getVariantPrice() {
    //     if ($('#add-to-cart-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: '{{ route('admin.pos.variant_price') }}',
    //             data: $('#add-to-cart-form').serializeArray(),
    //             success: function (data) {

    //                 $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
    //                 $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
    //                 $('#set-discount-amount').html(data.discount);
    //             }
    //         });
    //     }
    // }

    // function addToCart(form_id = 'add-to-cart-form') {
    //     if (checkAddToCartValidity()) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //             }
    //         });
    //         $.post({
    //             url: '{{ route('admin.pos.add-to-cart') }}',
    //             data: $('#' + form_id).serializeArray(),
    //             beforeSend: function () {
    //                 $('#loading').show();
    //             },
    //             success: function (data) {

    //                 if (data.data == 1) {
    //                     Swal.fire({
    //                         icon: 'info',
    //                         title: 'Cart',
    //                         text: '{{ \App\CPU\translate("Product already added in cart")}}'
    //                     });
    //                     return false;
    //                 } else if (data.data == 0) {
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Cart',
    //                         text: '{{ \App\CPU\translate("Sorry, product is out of stock.")}}'
    //                     });
    //                     return false;
    //                 }
    //                 $('.call-when-done').click();

    //                 toastr.success('{{ \App\CPU\translate("Item has been added in your cart!")}}', {
    //                     CloseButton: true,
    //                     ProgressBar: true
    //                 });
    //                 $('#cart').empty().html(data.view);
    //                 //updateCart();
    //                 $('.search-result-box').empty().hide();
    //                 $('#search').val('');
    //             },
    //             complete: function () {
    //                 $('#loading').hide();
    //             }
    //         });
    //     } else {
    //         Swal.fire({
    //             type: 'info',
    //             title: 'Cart',
    //             text: '{{ \App\CPU\translate("Please choose all the options")}}'
    //         });
    //     }
    // }

    // function removeFromCart(key) {
    //     //console.log(key);
    //     $.post('{{ route('admin.pos.remove-from-cart') }}', {_token: '{{ csrf_token() }}', key: key}, function (data) {

    //         $('#cart').empty().html(data.view);
    //         if (data.errors) {
    //             for (var i = 0; i < data.errors.length; i++) {
    //                 toastr.error(data.errors[i].message, {
    //                     CloseButton: true,
    //                     ProgressBar: true
    //                 });
    //             }
    //         } else {
    //             //updateCart();

    //             toastr.info('{{ \App\CPU\translate("Item has been removed from cart")}}', {
    //                 CloseButton: true,
    //                 ProgressBar: true
    //             });
    //         }


    //     });
    // }

    // function emptyCart() {
    //     Swal.fire({
    //         title: '{{\App\CPU\translate('Are_you_sure?')}}',
    //         text: '{{\App\CPU\translate('You_want_to_remove_all_items_from_cart!!')}}',
    //         type: 'warning',
    //         showCancelButton: true,
    //         cancelButtonColor: 'default',
    //         confirmButtonColor: '#161853',
    //         cancelButtonText: '{{\App\CPU\translate("No")}}',
    //         confirmButtonText: '{{\App\CPU\translate("Yes")}}',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             $.post('{{ route('admin.pos.emptyCart') }}', {_token: '{{ csrf_token() }}'}, function (data) {
    //                 $('#cart').empty().html(data.view);
    //                 toastr.info('{{ \App\CPU\translate("Item has been removed from cart")}}', {
    //                     CloseButton: true,
    //                     ProgressBar: true
    //                 });
    //             });
    //         }
    //     })
    // }

    // function updateCart() {
    //     $.post('<?php echo e(route('admin.pos.cart_items')); ?>', {_token: '<?php echo e(csrf_token()); ?>'}, function (data) {
    //         $('#cart').empty().html(data);
    //     });
    // }

   $(function(){
        $(document).on('click','input[type=number]',function(){ this.select(); });
    });


    function updateQuantity(key,qty,e){

        if(qty!==""){
            var element = $( e.target );
            var minValue = parseInt(element.attr('min'));
            // maxValue = parseInt(element.attr('max'));
            var valueCurrent = parseInt(element.val());

            //var key = element.data('key');

            $.post('{{ route('admin.pos.updateQuantity') }}', {_token: '{{ csrf_token() }}', key: key, quantity:qty}, function (data) {

                if(data.qty<0)
                {
                    toastr.warning('{{\App\CPU\translate('product_quantity_is_not_enough!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.upQty==='zeroNegative')
                {
                    toastr.warning('{{\App\CPU\translate('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.qty_update==1){
                    toastr.success('{{\App\CPU\translate('Product_quantity_updated!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                $('#cart').empty().html(data.view);
            });
        }else{
            var element = $( e.target );
            var minValue = parseInt(element.attr('min'));
            var valueCurrent = parseInt(element.val());

            $.post('{{ route('admin.pos.updateQuantity') }}', {_token: '{{ csrf_token() }}', key: key, quantity:minValue}, function (data) {

                if(data.qty<0)
                {
                    toastr.warning('{{\App\CPU\translate('product_quantity_is_not_enough!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.upQty==='zeroNegative')
                {
                    toastr.warning('{{\App\CPU\translate('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.qty_update==1){
                    toastr.success('{{\App\CPU\translate('Product_quantity_updated!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                $('#cart').empty().html(data.view);
            });
        }

        // Allow: backspace, delete, tab, escape, enter and .
        if(e.type == 'keydown')
        {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        }

    };

    // for plus minus quantity
    // 27-11-2022 

// add to cart

// function addToCart(form_id = 'add-to-cart-form', redirect_to_checkout=false) {
//         if (checkAddToCartValidity()) {
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                 }
//             });
//             $.post({
//                 url: '{{ route('cart.add') }}',
//                 data: $('#' + form_id).serializeArray(),
//                 beforeSend: function () {
//                     $('#loading').show();
//                 },
//                 success: function (response) {
//                     console.log(response);
//                     if (response.status == 1) {
//                         updateNavCart();
//                         toastr.success(response.message, {
//                             CloseButton: true,
//                             ProgressBar: true
//                         });
//                         $('.call-when-done').click();
//                         if(redirect_to_checkout)
//                         {
//                             location.href = "{{route('checkout-details')}}";
//                         }
//                         return false;
//                     } else if (response.status == 0) {
//                         Swal.fire({
//                             icon: 'error',
//                             title: 'Cart',
//                             text: response.message
//                         });
//                         return false;
//                     }
//                 },
//                 complete: function () {
//                     $('#loading').hide();

//                 }
//             });
//         } else {
//             Swal.fire({
//                 type: 'info',
//                 title: 'Cart',
//                 text: '{{\App\CPU\translate('please_choose_all_the_options')}}'
//             });
//         }
//     }


    
</script>
    

