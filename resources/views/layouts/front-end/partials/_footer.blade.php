<!-- Footer -->
<style>
    .social-media :hover {
        color: {{ $web_config['secondary_color'] }} !important;
    }

    .widget-list-link {
        color: white !important;
    }

    .widget-list-link:hover {
        color: #999898 !important;
    }

    .subscribe-border {
        border-radius: 5px;
    }

    .subscribe-button {
        background: #1B7FED;
        position: absolute;
        top: 0;
        color: white;
        padding: 11px;
        padding-left: 15px;
        padding-right: 15px;
        text-transform: capitalize;
        border: none;
    }

    .start_address {
        display: flex;
        justify-content: space-between;
    }

    .start_address_under_line {
        {{ Session::get('direction') === 'rtl' ? 'width: 344px;' : 'width: 331px;' }}
    }

    .address_under_line {
        width: 299px;
    }

    .end-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media only screen and (max-width: 500px) {
        .start_address {
            display: block;
        }

        .footer-web-logo {
            justify-content: center !important;
            padding-bottom: 25px;
        }

        .footer-padding-bottom {
            padding-bottom: 15px;
        }

        .mobile-view-center-align {
            justify-content: center !important;
            padding-bottom: 15px;
        }

        .last-footer-content-align {
            display: flex !important;
            justify-content: center !important;
            padding-bottom: 10px;
        }
    }

    @media only screen and (max-width: 800px) {
        .end-footer {

            display: block;

            align-items: center;
        }
    }

    @media only screen and (max-width: 1200px) {
        .start_address_under_line {
            display: none;
        }

        .address_under_line {
            display: none;
        }
    }

    /* New footer */
    .storyCard {
        background: none !important;
        border: none !important;
    }

    .text-primary {
        color: #69863c !important;
        background-color: inherit !important;
    }

    .line-height-15 {
        line-height: 15px;
    }

    .font-700 {
        font-weight: 700 !important;
    }

    .font-11 {
        font-size: 11px !important;
    }

    .foot-nav-link p {
        position: relative;
        padding-bottom: 8px;
    }

    .font-12 {
        font-size: 12px !important;
    }

    .border-top-gray {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    .bg-secondary-light{
        background: rgb(251, 241, 241)!important;
    }
</style>
{{-- <div class="d-flex justify-content-center text-center {{ Session::get('direction') === 'rtl' ? 'text-md-right' : 'text-md-left' }} mt-3"
    style="background: {{ $web_config['primary_color'] }}10;padding:20px;">

    <div class="col-md-3 d-flex justify-content-center">
        <div>
            <a href="{{ route('about-us') }}">
                <div style="text-align: center;">
                    <img style="height: 60px;width:60px;"
                        src="{{ asset('public/assets/front-end/png/About_us1.png') }}" alt="">
                </div>
                <div style="text-align: center;">

                    <p>
                        {{ \App\CPU\translate('About Company') }}
                    </p>

                </div>
            </a>
        </div>
    </div> --}}


    {{-- <div class="col-md-3 d-flex justify-content-center">
        <div>
            <a href="{{ route('contacts') }}">
                <div style="text-align: center;">
                    <img style="height: 60px;width:60px;"
                        src="{{ asset('public/assets/front-end/png/contact_us1.png') }}" alt="">
                </div>
                <div style="text-align: center;">
                    <p>
                        {{ \App\CPU\translate('Contact Us') }}
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 d-flex justify-content-center">
        <div>
            <a href="{{ route('helpTopic') }}">
                <div style="text-align: center;">
                    <img style="height: 60px;width:60px;" src="{{ asset('public/assets/front-end/png/help_1.png') }}"
                        alt="">
                </div>
                <div style="text-align: center;">
                    <p>
                        {{ \App\CPU\translate('FAQ') }}
                    </p>
                </div>
            </a>
        </div>
    </div>

</div> --}}


{{-- <footer class="page-footer font-small mdb-colorrtl">
    <!-- Footer Links -->
    <div style="background:#5A3B21;padding-top:30px;">
        <div class="container text-center" style="padding-bottom: 13px;">

            <!-- Footer links -->
            <div
                class="row text-center {{Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'}} mt-3 pb-3 ">
                <!-- Grid column -->
                <div class="col-md-3 d-flex justify-content-start align-items-center footer-web-logo" >
                    <a class="d-inline-block mt-n1" href="{{route('home')}}">
                        <img style="height: 80px!important; width: 160px;"
                             src="{{asset("storage/app/public/company/")}}/{{ $web_config['footer_logo']->value }}"
                             onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                             alt="{{ $web_config['name']->value }}"/>
                    </a>
                </div>
                <div class="col-md-9" >
                    <div class="row">

                        <div class="col-md-3 footer-padding-bottom" >
                            <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">{{\App\CPU\translate('special')}}</h6>
                            <ul class="widget-list" style="padding-bottom: 10px">
                                @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                                @if (isset($flash_deals))
                                    <li class="widget-list-item">
                                        <a class="widget-list-link"
                                        href="{{route('flash-deals',[$flash_deals['id']])}}">
                                            {{\App\CPU\translate('flash_deal')}}
                                        </a>
                                    </li>
                                @endif
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('featured_products')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('latest_products')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{\App\CPU\translate('best_selling_product')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('top_rated_product')}}</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4 footer-padding-bottom" style="{{Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''}}">
                            <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">{{\App\CPU\translate('account_&_shipping_info')}}</h6>
                            @if (auth('customer')->check())
                                <ul class="widget-list" style="padding-bottom: 10px">
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('user-account')}}">{{\App\CPU\translate('profile_info')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('wishlists')}}">{{\App\CPU\translate('wish_list')}}</a>
                                    </li>

                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{ route('account-address') }}">{{\App\CPU\translate('address')}}</a>
                                    </li>

                                </ul>
                            @else
                                <ul class="widget-list" style="padding-bottom: 10px">
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('profile_info')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('wish_list')}}</a>
                                    </li>

                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('address')}}</a>
                                    </li>


                                </ul>
                            @endif
                        </div>
                        <div class="col-md-5 footer-padding-bottom" >
                                @php($ios = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe'))
                                @php($android = \App\CPU\Helpers::get_business_settings('download_app_google_stroe'))

                                @if ($ios['status'] || $android['status'])
                                    <div class="d-flex justify-content-center">
                                        <h6 class="text-uppercase font-weight-bold footer-heder align-items-center">
                                            {{\App\CPU\translate('download_our_app')}}
                                        </h6>
                                    </div>
                                @endif


                                <div class="store-contents d-flex justify-content-center" >
                                    @if ($ios['status'])
                                        <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                            <a class="" href="{{ $ios['link'] }}" role="button"><img
                                                    src="{{asset("public/assets/front-end/png/apple_app.png")}}"
                                                    alt="" style="height: 51px!important;">
                                            </a>
                                        </div>
                                    @endif

                                    @if ($android['status'])
                                        <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                            <a href="{{ $android['link'] }}" role="button">
                                                <img src="{{asset("public/assets/front-end/png/google_app.png")}}"
                                                     alt="" style="height: 51px!important;">
                                            </a>
                                        </div>
                                    @endif
                                </div> --}}
                                {{-- <div class="text-nowrap mb-2">
                                    <span style="font-weight: 700;font-size: 14.3208px;">{{\App\CPU\translate('NEWS LETTER')}}</span><br>
                                    <span style="font-weight: 400;font-size: 11.066px;">{{\App\CPU\translate('subscribe to our new channel to get latest updates')}}</span>
                                </div>
                                <div class="text-nowrap mb-4" style="position:relative;">
                                    <form action="{{ route('subscription') }}" method="post">
                                        @csrf
                                        <input type="email" name="subscription_email" class="form-control subscribe-border"
                                            placeholder="{{\App\CPU\translate('Your Email Address')}}" required style="padding: 11px;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                        <button class="subscribe-button" type="submit"
                                            style="{{Session::get('direction') === "rtl" ? 'float:right;left:0px;border-radius:5px 0px 0px 5px;' : 'float:right;right:0px; border-radius:0px 5px 5px 0px;'}};font-size: .94rem;">
                                            {{\App\CPU\translate('subscribe')}}
                                        </button>
                                    </form>
                                </div> --}}
                        {{-- </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row d-flex align-items-center mobile-view-center-align {{Session::get('direction') === "rtl" ? ' flex-row-reverse' : ''}}">
                                <div style="{{Session::get('direction') === "rtl" ? 'margin-right:23px;' : ''}}">
                                    <span class="mb-4 font-weight-bold footer-heder">{{ \App\CPU\translate('Start a conversation')}}</span>
                                </div>
                                <div class="{{Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'}}">
                                    <hr class="start_address_under_line" style="border: 1px solid #E0E0E0;"/>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-11 start_address ">
                                    <div style="color:" class="">
                                        <a class="widget-list-link" href="tel: {{$web_config['phone']->value}}">
                                            <span ><i class="fa fa-phone m-2"></i>{{\App\CPU\Helpers::get_business_settings('company_phone')}} </span>
                                        </a>

                                    </div>
                                    <div style=""class="">
                                        <a class="widget-list-link" href="email:">
                                            <span ><i class="fa fa-envelope m-2"></i> {{\App\CPU\Helpers::get_business_settings('company_email')}} </span>
                                        </a>
                                    </div>
                                    <div style="" class="">
                                        @if (auth('customer')->check())
                                            <a class="widget-list-link" href="{{route('account-tickets')}}">
                                                <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                            </a><br>
                                        @else
                                            <a class="widget-list-link" href="{{route('customer.auth.login')}}">
                                                <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                            </a><br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <div class="row pl-2 d-flex align-items-center mobile-view-center-align {{Session::get('direction') === "rtl" ? ' flex-row-reverse' : ''}}">
                                <div>
                                    <span class="mb-4 font-weight-bold footer-heder">{{ \App\CPU\translate('address')}}</span>
                                </div>
                                <div class="{{Session::get('direction') === "rtl" ? 'mr-3 ' : 'ml-3'}}">
                                    <hr class="address_under_line" style="border: 1px solid #E0E0E0;"/>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <span style="font-size: 14px;"><i class="fa fa-map-marker m-2"></i> {{ \App\CPU\Helpers::get_business_settings('shop_address')}} </span>
                            </div>
                        </div>
                    </div>
                </div> --}}



                <!-- Grid column -->
            {{-- </div> --}}
            <!-- Footer links -->
        {{-- </div>
    </div> --}}


    <!-- Grid row -->
    {{-- <div style="background: {{$web_config['primary_color']}}10;">
        <div class="container">
            <div class="row end-footer footer-end last-footer-content-align">
                <div class=" mt-3">
                    <p class="{{Session::get('direction') === "rtl" ? 'text-right ' : 'text-left'}}" style="font-size: 16px;">{{ $web_config['copyright_text']->value }}</p>
                </div>
                <div class="mt-md-3 mt-0 mb-md-3 {{Session::get('direction') === "rtl" ? 'text-right' : 'text-left'}}">
                    @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
                    @if (isset($social_media))
                        @foreach ($social_media as $item)
                            <span class="social-media ">
                                    <a class="social-btn sb-light sb-{{$item->name}} {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2"
                                       target="_blank" href="{{$item->link}}" style="color: white!important;">
                                        <i class="{{$item->icon}}" aria-hidden="true"></i>
                                    </a>
                                </span>
                        @endforeach
                    @endif
                </div>
                <div class="d-flex" style="font-size: 14px;">
                    <div class="{{Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'}}" >
                        <a class="widget-list-link"
                        href="{{route('terms')}}">{{\App\CPU\translate('terms_&_conditions')}}</a>
                    </div>
                    <div>
                        <a class="widget-list-link" href="{{route('privacy-policy')}}">
                            {{\App\CPU\translate('privacy_policy')}}
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
</footer> --}}

{{-- <footer class="pt-4 mt-5"> --}}
    <div class="bg-secondary-light" style="border-radius: 20px 20px 0px 0px;">
        <div class="container">
            <div class="row p-2">
                <div class="col-12 col-md-3 col-lg-3 pr-lg-5 footer-left-panel">
                    <a class="navbar-brand d-none d-sm-block ml-3 mr-2 mt-4 flex-shrink-0" href="https://phpstack-821135-3097653.cloudwaysapps.com" style="min-width: 7rem;">
                        <img style="height: 70px!important; width:auto;" src="https://phpstack-821135-3097653.cloudwaysapps.com/storage/app/public/company/2022-12-12-6396b68480662.png" onerror="this.src='https://phpstack-821135-3097653.cloudwaysapps.com/public/assets/front-end/img/image-place-holder.png'" alt="theorganicworld">
                    </a>

                    <p class="font-12 font-700 mt-3 mt-lg-5">FOLLOW US ON SOCIAL MEDIA</p>
                    <div class="row mb-3 g-0">
                        <div class="col-auto"><a href="#" target="_blank"
                                class="me-3"><img loading="lazy"
                                    src="https://img.theorganicworld.com/ORG-0/img/menu/web/facebook_socialmedia_web/facebook.svg"
                                    alt=""></a></div>
                        <div class="col-auto"><a href="#" target="_blank"
                                class="me-3"><img loading="lazy"
                                    src="https://img.theorganicworld.com/ORG-0/img/menu/web/instagram_socialmedia_web/instagram.svg"
                                    alt=""></a></div>
                        <div class="col-auto"><a href="#"
                            target="_blank" class="me-3"><img loading="lazy"
                                src="https://img.theorganicworld.com/ORG-0/img/menu/web/youtube_socialmedia_web/youtube.svg"
                                alt=""></a></div>

                    </div>
                    <div class="bg-white rounded-8 p-3 text-center mb-4">
                        <p class="font-700 text-primary mb-2">Stay up to date on offers, deals &amp; unlimited goodness!</p>
                        <p class="font-12 font-300">We promise not to spam!</p>
                        <div class="row gx-3 mb-3">
                            <div class="col"><a href="#"><img loading="lazy"
                                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/super-saver_fixpromobannerentity_web/super-saver.svg"
                                        alt=""></a></div>
                            <div class="col"><a href="#"><img loading="lazy"
                                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/best-deals_fixpromobannerentity_web/best-deals.svg"
                                        alt=""></a></div>
                            <div class="col"><a href="#"><img loading="lazy"
                                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/seasonal-favorites_fixpromobannerentity_web/seasonal-favorites.svg"
                                        alt=""></a></div>
                        </div>

                        <form id="notifyForm">
                            <input type="hidden" class="FORMCODE" name="FORMCODE" value="NOTIFY">
                            <input type="hidden" class="notifyFormValid"
                                data-notifyformvalid="[{&quot;customKey&quot;:&quot;emailId&quot;,&quot;customValidation&quot;:&quot;^[a-zA-Z0-9.!#$%&amp;'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$&quot;,&quot;customValidMsg&quot;:&quot;Please enter valid email id&quot;,&quot;customLabel&quot;:&quot;Email&quot;}]">
                            <input type="email" id="emailId" name="emailId"
                                class="form-control font-14 btn-tr-bl-radius py-1 form-control-lg"
                                placeholder="Please enter email id">
                            <div class="errorCode text-left fieldError emailId_error"></div>
                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="font-14 font-800 btn btn-primary btn-lg btn-tr-bl-radius mt-2  notifyContent">Yes!
                                    Keep me informed</button>
                            </div>
                        </form>

                    </div>
                    {{-- <p>
                        The Organic World was started with the mission to offer better choices - chemical and
                        preservative-free organic and natural products.<br><br>

                        The Organic World was started with the mission
                        to offer better choices - chemical

                    </p> --}}
                </div>
                <div class="col-12 col-md-9 col-lg-9 mt-4 pr-lg-5 footer-left-panel">
                    <div class="row">
                        <h6 class="font-14 font-700 bs-font-raleway">OUR STORY</h6>
                        <p class="font-14 font-400 bs-font-raleway line-height-19"></p>
                        <div>The Organic World was started with the mission to offer better choices - chemical and
                            preservative-free organic and natural products - for all our stakeholders within this ecosystem –
                            you the customer, your family, the community that we are part of, the farms and brands we work with
                            and our planet. Choices that empower you to lead a healthier, chemical-free and more eco-friendly
                            lifestyle. Choices that cover everything you need to build your healthy home: from organic-certified
                            fruits and vegetables, chemical-free everyday staples, toxin-free homecare products to paraben and
                            sulfate free personal care and beauty products, organic and natural health and wellness products,
                            chemical-free childcare products, trans-fat-free snacking alternatives and more! <br>
                        </div>
                        <ul class="nav row g-3 align-items-center mb-4">
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/100-genuine-products_our-story-feature-icon_web/100-genuine-products.svg"
                                            alt="">
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        100% genuine products</div>
                                </div>
                            </li>
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/we-deliver-across-bengaluru_our-story-feature-icon_web/we-deliver-across-bengaluru.svg"
                                            alt="" >
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        We deliver across Bengaluru</div>
                                </div>
                            </li>
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/100-secure-online-payments_our-story-feature-icon_web/100-secure-online-payments.svg"
                                            alt="" >
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        100% Secure online payments </div>
                                </div>
                            </li>
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/easy-return-policy_our-story-feature-icon_web/easy-return-policy.svg"
                                            alt="" >
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        Easy return policy </div>
                                </div>
                            </li>
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/stringent-quality-standards_our-story-feature-icon_web/stringent-quality-standards.svg"
                                            alt="" >
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        Stringent quality standards </div>
                                </div>
                            </li>
                            <li class="col-6 col-md-4 col-lg-2 text-center">
                                <div class="card storyCard">
                                    <div class="card-body p-4" style="height:130px">
                                        <img loading="lazy"
                                            src="https://img.theorganicworld.com/ORG-0/img/menu/web/natural-organic_our-story-feature-icon_web/natural-organic.svg"
                                            alt="" >
                                    </div>
                                    <div class="card-footer d-block font-11 font-700 bs-font-raleway">
                                        Natural &amp; Organic</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 pr-lg-5 footer-left-panel">
                            <h5><a href="">THE ORGANIC WORLD</a></h5>
                            <hr width="30%" size="20" color={{ $web_config['secondary_color'] }} noshade>
                            <label><a href="">About Us</a></label><br>
                            <label><a href="">Press Releases</a></label><br>
                            <label><a href="">Store Locations</a></label><br>
                            <label><a href="">Events</a></label><br>
                            <label><a href="">Careers</a></label><br>
                            <label><a href="">Sell With Us</a></label><br>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4 pr-lg-5 footer-left-panel">
                            <h5><a href="">LET US HELP YOU</a></h5>
                            <hr width="30%" size="20" color={{ $web_config['secondary_color'] }} noshade>
                            <label><a href="">Covid 19 & TOW</a></label><br>
                            <label><a href="">FAQs</a></label><br>
                            <label><a href="">Sitemap</a></label><br>
                            <label><a href="">Privacy Policy</a></label><br>
                            <label><a href="">Shipping Policy</a></label><br>
                            <label><a href="">Return & Refunds</a></label><br>
                            <label><a href="">Terms & Conditions</a></label><br>
                            <label><a href="">Carporate Gifting</a></label><br>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4 pr-lg-5 footer-left-panel">
                            <h5><a href="">GET IN TOUCH</a></h5>
                            <hr width="30%" size="20" color={{ $web_config['secondary_color'] }} noshade>
                            <label><a href="">Contact us</a></label><br>
                            <label><a href="">Register your community</a></label><br>
                            <label><a href="">Become a seller</a></label><br>
                            <label><a href="">Join our team</a></label><br>
                            <label><a href="">Give a suggestion</a></label><br>

                        </div>
                    </div>


                {{-- <div class="col-12 col-md-2 col-lg-2 pr-lg-5 footer-left-panel">
                    <h4><a href="">Quick Links</a></h4>

                    <h6><a href="">Terms & Conditions</a></h6>
                    <h6><a href="">Shippind & Delivery</a></h6>
                    <h6><a href="">Covid 19 & TOW</a></h6>
                    <h6><a href="">Privacy & Policy</a></h6>
                    <h6><a href="">Return & Refunds</a></h6>

                </div>
                <div class="col-12 col-md-2 col-lg-2 pr-lg-5 footer-left-panel">
                    <h4><a href="">Important</a></h4>

                    <h6><a href="">About Us</a></h6>
                    <h6><a href="">join Our Team</a></h6>


                </div>
                <div class="col-12 col-md-2 col-lg-2 pr-lg-5 footer-left-panel">
                    <h4><a href="">Contact Us</a></h4>

                    <h6><a href="">About Us</a></h6>
                    <h6><a href="">join Our Team</a></h6>
                    <h6><a href="">Covid 19 & TOW</a></h6>
                    <h6><a href="">Privacy & Policy</a></h6>
                    <h6><a href="">Return & Refunds</a></h6>

                </div>
                <div class="col-12 col-md-2 col-lg-2 pr-lg-5 footer-left-panel">
                    <h4><a href="">Get in Touch</a></h4>

                    <button class="btn btn-sm bg-custome-brown text-white  rounded-circle m-1"
                        style="height: 2.7rem;"><i class="fa fa-brands fa-instagram"></i></button>
                    <button class="btn btn-sm bg-custome-warming text-white  rounded-circle m-1"
                        style="height: 2.7rem;"><i class="fa fa-brands fa-facebook"></i></button>
                    <button class="btn btn-sm bg-accent text-white  rounded-circle m-1" style="height: 2.7rem;"><i
                            class="fa fa-brands fa-linkedin"></i></button>
                    <button class="btn btn-sm bg-custome-success-dark text-white  rounded-circle m-1"
                        style="height: 2.7rem;"><i class="fa fa-brands fa-twitter"></i></button>
                </div> --}}

                <div class="col-12 col-md-12 col-lg-12">

                    {{-- <h6 class="font-14 font-700 bs-font-raleway">OUR STORY</h6>
                    <p class="font-14 font-400 bs-font-raleway line-height-19"></p>
                    <div>The Organic World was started with the mission to offer better choices - chemical and
                        preservative-free organic and natural products - for all our stakeholders within this ecosystem –
                        you the customer, your family, the community that we are part of, the farms and brands we work with
                        and our planet. Choices that empower you to lead a healthier, chemical-free and more eco-friendly
                        lifestyle. Choices that cover everything you need to build your healthy home: from organic-certified
                        fruits and vegetables, chemical-free everyday staples, toxin-free homecare products to paraben and
                        sulfate free personal care and beauty products, organic and natural health and wellness products,
                        chemical-free childcare products, trans-fat-free snacking alternatives and more! <br></div>
                    <p></p>

                    <div class="d-md-flex mt-3 pt-4 foot-nav-link border-top-gray">
                        <div class="col-12 col-md-4">
                            <p class="mb-2 font-700 bs-font-raleway">Let us help you LIST</p>
                            <ul class="nav flex-column">
                                <li><a href="#">Terms &amp;
                                        Conditions</a></li>
                                <li><a href="#">Shipping &amp;
                                        Delivery</a></li>
                                <li><a href="#">Covid-19 &amp;
                                        TOW</a></li>
                                <li><a href="#">Privacy Policy</a>
                                </li>
                                <li><a href="#">Returns &amp;
                                        Refunds</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="mb-2 font-700 bs-font-raleway">The Organic World</p>
                            <ul class="nav flex-column">
                                <li><a href="javascript:void(0);">About us</a></li>
                                <li><a href="#">Join Our Team</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="mb-2 font-700 bs-font-raleway">Get in Touch</p>
                            <ul class="nav flex-column">
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div> --}}

                    <div class="d-flex flex-column secure-pay mt-4">
                        <p class="font-14 font-700 bs-font-raleway">SECURE PAY</p>
                            <div class="row justify-content-center">
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp1.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp2.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp3.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp4.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp5.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp6.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp7.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp8.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp9.png">
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="">
                                        <img style="height:50px;" src="{{asset('storage/app/public/banner')}}/sp10.png">
                                    </a>
                                </div>
                            </div>
                    </div>

                    <div class="d-flex flex-column border-top-gray mt-4 pt-4">
                        <p class="font-14 font-700 bs-font-raleway">STORE LOCATIONS</p>
                        <div class="mb-3">
                            <a href="/faces/page.jsp?page=visitStore"
                                class="btn btn-outline-primary rounded-pill font-14 font-500 bs-font-raleway px-3 py-2">Bengaluru
                                (16 locations)</a>
                        </div>
                        <div class="m-0 border-0 bg-transparent">
                            <ul
                                class="footer-slider d-flex bs-font-raleway font-12 font-400 slick-initialized slick-slider">
                                {{-- <button class="slick-prev slick-arrow slick-disabled" aria-label="Previous"
                                    type="button" aria-disabled="true" style="display: inline-block;"></button>  --}}
                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                        style="opacity: 1; width: 2928px; transform: translate3d(0px, 0px, 0px);">
                                        <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                            aria-hidden="false" style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - JP Nagar</strong>
                                                        <p class="mb-2">
                                                            Near By Tamara Furniture Store<br>
                                                            #58, 15th Cross Rd, Jeewan Griha Colony, 2nd Phase, JP Nagar,
                                                            Bengaluru 560078<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9986873322<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.90673, 77.58889"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="0">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Malleshwaram</strong>
                                                        <p class="mb-2">
                                                            Near By Sri Sai Shakti Hotel<br>
                                                            #38/1, 8th Cross Rd, Malleshwaram, Bangalore 560003<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9606431515<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.99918, 77.56787"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="0">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Kormangala</strong>
                                                        <p class="mb-2">
                                                            Opp to Vijanya Bank<br>
                                                            #44, 100 Feet Rd, 4th Block, Koramangala, Bengaluru 560034<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9108458484<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.9357, 77.62527"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="0">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Bellandur</strong>
                                                        <p class="mb-2">
                                                            Opp to HDFC Bank<br>
                                                            #206, Green Glen Layout, Bellandur, Bangalore - 560103<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9008929697<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.90709, 77.66963"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="0">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Whitefield</strong>
                                                        <p class="mb-2">
                                                            Next to Shell Petrol Bank<br>
                                                            #66, Siddapur Village, Varthur Hobli, Bangalore South Taluk -
                                                            560087<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9148252666<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.95672, 77.732"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="0">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Yellahanka</strong>
                                                        <p class="mb-2">
                                                            Next to Mother Dairy<br>
                                                            Yelahanka New Town Main Road, Yelahanka Road Bengaluru<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9008492728<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 13.09851, 77.57355"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Cunningham Road</strong>
                                                        <p class="mb-2">
                                                            Opp to Central Bank<br>
                                                            #17, Shah Sultan Complex, Ali Asker Road, Bangalore - 560052<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9108227770<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.98701, 77.5948"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Indranagar</strong>
                                                        <p class="mb-2">
                                                            Opp to SBI Bank<br>
                                                            #609, 12th Main, HAL 2nd Stage, Indiranagar, Bangalore -
                                                            560008<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9148201999<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.97046, 77.64504"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - FC</strong>
                                                        <p class="mb-2">
                                                            Opp to Udaan<br>
                                                            Kudlu Gate, Krishna Reddy Industrial Area, Hosapalaya,
                                                            Muneshwara Nagar, Bengaluru, Karnataka 560068<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 8150915315<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.89123, 77.64238"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - WH</strong>
                                                        <p class="mb-2">
                                                            Opp to Udaan<br>
                                                            Kudlu Gate, Krishna Reddy Industrial Area, Hosapalaya,
                                                            Muneshwara Nagar, Bengaluru, Karnataka 560068<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9880306087<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.89124, 77.64239"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - HSR</strong>
                                                        <p class="mb-2">
                                                            Next to SBI Bank<br>
                                                            #483, Sector - 2, HSR Layout, NIFT Junction, After SBI Bank,
                                                            Bengaluru 560102<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9686669921<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.91194, 77.65156"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - HRBR</strong>
                                                        <p class="mb-2">
                                                            Near ICICI Bank<br>
                                                            3C, #702, 3rd Cross Road, 1st Block, HRBR Layout, Bengaluru<br>
                                                            Bengaluru&nbsp; <br>
                                                            9986054023<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 13.0176337, 77.643273"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="12" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Banashankari</strong>
                                                        <p class="mb-2">
                                                            Ovum Hospital Building<br>
                                                            #215, 100ft Ring Road, 2nd B, 3rd Phase, Banahankari,
                                                            Bengaluru<br>
                                                            Bengaluru&nbsp; <br>
                                                            9008654020<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.9272209, 77.5474651"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="13" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - Jayanagar</strong>
                                                        <p class="mb-2">
                                                            Near Go Native<br>
                                                            The Organic World, No. 37, 6, 10th Main Rd, Jayanagar East,
                                                            Jaya<br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9008731039<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.934734, 77.584599"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="14" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - RBI Layout JP Nagar</strong>
                                                        <p class="mb-2">
                                                            Near Brigade millennium<br>
                                                            The Organic World, Nagarbavi, 475, Kothnur Main Rd, RBI Layout,
                                                            <br>
                                                            Bengaluru&nbsp; <br>
                                                            +91 9148507011<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 12.889836, 77.581967"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="15" aria-hidden="true" tabindex="-1"
                                            style="width: 183px;">
                                            <div>
                                                <li class="border-right-gray" style="width: 100%; display: inline-block;">
                                                    <div class="position-relative px-4">
                                                        <strong class="d-block text-primary font-700 mb-2">The Organic
                                                            World - WH2</strong>
                                                        <p class="mb-2">
                                                            Bazar Gate<br>
                                                            Bazar gate new mumbai<br>
                                                            Navi Mumbai&nbsp; <br>
                                                            7259806032<br>
                                                            07:00 TO 21:00<br>
                                                        </p>
                                                        <a href="https://www.google.com/maps?q= 18.93533, 72.83574"
                                                            target="_blank" class="text-decoration-underline text-dark"
                                                            tabindex="-1">Google Maps</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- <button class="slick-next slick-arrow" aria-label="Next" type="button"
                                    style="" aria-disabled="false"></button>  --}}
                            </ul>
                        </div>
                    </div>
                    <script>
                        if (typeof applyFooterSliderSlick === 'function') {
                            applyFooterSliderSlick();
                        }
                    </script>




                <div class="d-flex flex-column pt-4 bs-font-raleway footer-article-menu">

                    <div><b>What You Get At The Best Organic Store in Bangalore</b></div>
                    <div><a href="#"
                            target="_blank">Akshayakalpa</a> | <a
                            href="#"
                            target="_blank">Pronature</a> | <a
                            href="#"
                            target="_blank">Phalada Pure &amp; Sure</a> | <a
                            href="#" target="_blank">Arya</a> | <a
                            href="#" target="_blank">Wellbe </a>|
                        <a href="#" target="_blank">Vanam</a>
                        | <a href="#" target="_blank">Wild
                            Ideas</a> | <a href="#"
                            target="_blank">Herbal Strategi</a> | <a
                            href="#"
                            target="_blank">Organic Tattva</a> | <a
                            href="#"
                            target="_blank">Dhatu Organics</a> | <a
                            href="#" target="_blank">Born
                            Good</a> | <a href="#"
                            target="_blank">Yogabar</a> | <a
                            href="#" target="_blank">Farm
                            Made</a> | <a href="#"
                            target="_blank">Nutty Yogi</a> | <a
                            href="#" target="_blank">Native
                            Circle</a>&nbsp;| <a href="#"
                            target="_blank">Organic India</a> <br></div>
                    <div><br></div>
                    <div><b>What You Get At The Best Organic Store in Bangalore</b></div>
                    <div><a href="#"
                            target="_blank">Organic Fruits &amp; Vegetables</a> | <a
                            href="#" target="_blank">Dal,
                            Atta &amp; Rice</a> | <a href="#"
                            target="_blank">Homecare</a> | <a
                            href="#" target="_blank">Personal
                            Care</a> | <a href="#"
                            target="_blank">Baby &amp; Infant Needs</a> | <a
                            href="#" target="_blank">Fresh
                            Batter</a> | <a href="#"
                            target="_blank">Dairy, Bakery &amp; Eggs</a> | <a
                            href="#" target="_blank">Health
                            &amp; Wellness</a> | <a href="#"
                            target="_blank">And more!</a></div>
                    <div><br></div>
                    <div><b>What You Get At The Best Organic Store in Bangalore</b></div>
                    <div><a href="#" target="_blank">Wellbe </a>|
                        <a href="#" target="_blank">Wild
                            Ideas</a> | <a href="#"
                            target="_blank">Phalada Pure &amp; Sure </a>| <a
                            href="#" target="_blank">Terra
                            Greens Organic</a> | <a href="#"
                            target="_blank">Bubblenut Wash</a> | <a
                            href="#"
                            target="_blank">Akshayakalpa </a>| <a
                            href="#" target="_blank">Vanam
                            Milk</a> | <a
                            href="#"
                            target="_blank">Blue Tokai</a> | And more!<br></div>
                    <div><br></div>
                    <div><b>GO HEALTHY, GO SMART,CHOOSE SUPERFOODS - GO ORGANIC!</b></div>
                    <div>Staple foods are an essential part of your pantry, but when you want the healthier option, the
                        obvious choice is organic. We are the premier organic online shop to offer fresh organic foods,
                        every day and every time, whenever you need it! From your daily delivery of milk for your
                        morning cup of chai to the best organic fruits and vegetables in Bangalore delivered at your
                        doorstep, we are here for you. We bring the freshest organic fruits and vegetables in Bangalore
                        to you!</div>
                    <div><br></div>
                    <div><b>YOUR DAILY STAPLES AND MORE AT THE BEST ORGANIC SHOP IN BANGALORE</b></div>
                    <div>We are one of the finest and among the most well stocked organic shops in Bangalore. From milk,
                        bread, vegetables and fruits, to food grains, laundry detergents, whatever your needs, The
                        Organic World is your one-stop shop for all your monthly and daily essentials. And if you prefer
                        to touch, see and smell organic fruits before picking them out, we have retail stores too. Walk
                        into any of our stores and choose from a range of exotic vegetables in Bangalore.&nbsp;</div>
                    <div><br></div>
                    <div><b>ARTISAN BREADS TO ENRICHED EGGS - AN ORGANIC STORE IN BANGALORE THAT OFFERS IT ALL</b></div>
                    <div>Craving for artisan breads in Bangalore or wondering which is the best egg store near me - the
                        answers to all such questions ends with The Organic World. We are the most trustworthy Bangalore
                        milk and dairy option, we offer a range of exotic fruits and vegetables, artisanal coffee,
                        sourdough, free range eggs and more! We also set high standards - for instance, we are one of
                        the only zero waste grocery stores in Bangalore!</div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
    <div class="footer" style="background-color:{{ $web_config['primary_color'] }}">
        <div
                class="copyright font-12 font-400 py-3 text-center text-white">
                <p class="mb-0">© 2020 www.theorganicworld@reapmind.com. All rights reserved.</p>
            </div>

    </div>
{{-- </footer> --}}
