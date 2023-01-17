<style>
       /* @font-face {
  font-family: 'artegra_sans_500';
  src: url('/public/assets/front-end//css/artegra_sans-500-medium.otf'); 
 
}
@font-face {
  font-family: 'artegra_sans_400';
  src: url('/public/assets/front-end//css/artegra_sans-400-regular.otf'); 
 
}
@font-face {
  font-family: 'BoldenVan';
  src: url('/public/assets/front-end//css/BoldenVan.ttf'); 
 
} */
/* body {
            background-color: #FAF7EE;
            font-family: 'artegra_sans_500'!important;
        } */
    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;
        ;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{ $web_config['primary_color'] }};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .count-value {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{ $web_config['primary_color'] }};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .owl-nav {
        height: 0px !important;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {{ $web_config['primary_color'] }};
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
            background-color: transparent !important;
        }

        .search_button .input-group-text i {
            color: {{ $web_config['primary_color'] }} !important;
        }

        .navbar-expand-md .dropdown-menu>.dropdown>.dropdown-toggle {
            position: relative;
            padding- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 1.95rem;
        }

        .mega-nav1 {
            background: white;
            color: {{ $web_config['primary_color'] }} !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{ $web_config['primary_color'] }} !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {}

        .mega-nav1 {
            background: white;
            color: {{ $web_config['primary_color'] }} !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{ $web_config['primary_color'] }} !important;
        }
    }

    #anouncement {
        width: 100%;
        padding: 2px 0;
        text-align: center;
        color: white;
    }

    :root {
        --bs-green: #69863C !important;
    }

    /* mine */
    .navbar.navbar-expand-md.navbar-light .container {
        position: relative;
    }

    li.nav-item.dropdown.dropdownposition {
        position: unset !important;
    }

    .big-dropdown {
        width: 100% !important;
    }

    .input-group-overlay {
        position: unset !important;
        width: 100%;
    }

    .tab-content.col-12 {
        max-height: 300px;
        overflow: scroll;
    }

    /* /mine */
    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;
        ;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;

        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .count-value {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;

        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {
                    {
                    $web_config['primary_color']
                }
            }

            ;
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
            background-color: transparent !important;
        }

        .search_button .input-group-text i {
            color: {
                    {
                    $web_config['primary_color']
                }
            }

             !important;
        }

        .navbar-expand-md .dropdown-menu>.dropdown>.dropdown-toggle {
            position: relative;

            padding- {
                    {
                    Session: :get('direction')==="rtl"? 'left': 'right'
                }
            }

            : 1.95rem;
        }

        .mega-nav1 {
            background: white;

            color: {
                    {
                    $web_config['primary_color']
                }
            }

             !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {
                    {
                    $web_config['primary_color']
                }
            }

             !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {}

        .mega-nav1 {
            background: white;

            color: {
                    {
                    $web_config['primary_color']
                }
            }

             !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {
                    {
                    $web_config['primary_color']
                }
            }

             !important;
        }
    }

    #anouncement {
        width: 100%;
        padding: 2px 0;
        text-align: center;
        color: white;
    }

    .main-logo-text {
        font-size: 10px;
        font-weight: 700;
        opacity: 0.7;
        color: #333 !important;
    }

    #sidebar {
        width: 350px;
        position: fixed;
        top: 0;
        left: -999px;
        visibility: hidden;
        opacity: 0;
        z-index: 1050;
        background: #fff;
        color: #333;
        transition: all 0.3s;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
    }

    #sidebar.active {
        left: 0;
        visibility: visible;
        opacity: 1;
    }

    .dark-link {
        color: #5A3B21 !important;
    }

    .main-menu>.nav-item>.nav-link {
        font-size: 14px;
        font-weight: 550;
        color: var(--bs-green);
        position: relative;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        
    }

    .prior-dropdown {
        z-index: 999;
    }

    /* .big-dropdown {
        width: 70vw !important;
    } */

    #myTab.nav-tabs .nav-link.active {
        background-color: #69863C !important;
        color: #fff !important;

    }

    #horizontal-categories a {
        line-height: 14.09px;
        font-weight: 700;
        font-size: 14px;
        font-family: 'Artegra Sans';
            font-weight: normal;
            font-style: normal;
        color: #333;
        background: #f7f7f8;
        height: 48px;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        border-radius: 10px;
    }
 

   /* #horizontal-categories .owl-item:nth-child(5n+1) a{
    background: #BD4D29;
}
#horizontal-categories .owl-item:nth-child(5n+2) a{
    background: #5A3B21;
}
#horizontal-categories .owl-item:nth-child(5n+3) a{
    background: #56A180;
}
#horizontal-categories .owl-item:nth-child(5n+4) a{
    background: #136A7D;
}
#horizontal-categories .owl-item:nth-child(5n+5) a{
    background: #F9A61A;
} */


    .owl-carousel .nav-btn .czi-arrow-left {
        height: 47px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }

    .carousel-wrap {
        position: relative;
    }

    .owl-nav {
        top: 40%;
        position: absolute;
        display: flex;
        justify-content: space-between;
         width: 100%; 
    }

   /* .owl-item.m-1.p-1.active {
    width: fit-content !important;
}
*/

    .main-menu .nav-item .dropdown-menu .nav-link>img {
        width: 45px;
        height: 32px;
        object-fit: contain;
    }

    /* .main-menu .nav-item div.active .dropdown-menu .nav-link>img{
        filter: brightness(0) invert(1);
    } */
    .big-dropdown .nav-pills .nav-item>div.active>.nav-link>img {
        filter: brightness(0) invert(1);
    }

    .big-dropdown .nav-pills .nav-item>div.active>.nav-link>span {
        color: #fff !important;
    }

    /* .main-menu .nav-item .dropdown-menu .nav-link>img{

        filter: brightness(0) invert(1);
    } */
    .main-menu .nav-item .dropdown-menu .nav-link .text-black {
        color: #333;
        font-size: 12px !important;
    }

    .main-menu .nav-pills .nav-item>div.active .nav-link,
    .main-menu .nav-pills .show>.nav-item>div .nav-link:hover {
        color: white;
        background-color: #69863C;
    }

    /* .nav-pills.nav-item>div.active>.nav-link> a img {
    filter: brightness(0) invert(1);
} */
    .main-menu .nav-item .dropdown-menu .nav-link:hover {
        background-color: #69863C;
    }

    .bg-orange-light {
        background: #f4ece4;
        ;
    }

    .w-100 {
        width: 100% !important;
    }

    .nav-pills .nav-link {
        background-color: #f4ece4;
    }

    .tab-content>.active {
        display: block;
    }

    .main-menu-col .col-lg a.main-menu-col-heading {
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
    }

    .main-menu-col .col-lg a {
        font-size: 12px;
        color: #333;
        padding-left: 0 !important;
        padding-right: 0 !important;
        font-weight: 400;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block;
        padding-top: .5rem;
        padding-bottom: .5rem;
        text-decoration: none;
    }

    .main-menu-col .row>.col-lg:nth-child(odd) {
        background: #F7F7F8;
    }

    .main-menu-col .row>.col-lg:nth-child(even) {
        background: #fff;
    }

    .search {
        position: relative;
        color: #aaa;
        font-size: 16px;
    }

    /* .search {display: inline-block;} */

    .search input {
        /* width: 250px; */
        height: 40px;
        padding-right: 2.375rem;
        /* background: #fcfcfc;
  border: 1px solid #aaa;
  border-radius: 5px;
  box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset; */
    }

    /* .search input { text-indent: 32px;} */
    .search .fa-search {
        position: absolute;
        top: 11px;
        left: 10px;
    }

    .search .fa-search {
        left: auto;
        right: 10px;
    }

    #myTab.custom-btn-tabs.active {
        background-color: transparent !important;
        color: #69863C !important;
    }

    .nav-item .dropdown-toggle::after {
    margin-left: 3px !important;
}

.bg-custome-brown{
    background-color: #BD4D29 !important;
}
.bg-custome-warming{
    background-color: #F9A61A !important;
}
.bg-custome-brown-dark{
    background-color: #7E5623 !important;
}
.bg-custome-success-dark{
    background-color: #56A180 !important;
}
.bg-secondary-light{
    background-color: #E5E5E5 !important;
    
}
.custom_hover:hover {
  color: rgb(4, 158, 4);
  cursor: pointer;
}
.custom_hover_lable:hover {
  color: rgb(4, 158, 4) !important;
  cursor: pointer;
}


</style>

@php($announcement = \App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status'] == 1)

    <div id="anouncement" style="background-color: #5A3B21;color:{{ $announcement['text_color'] }}" class="@if(!(session()->get('pincode_rebbin'))) d-none @else d-lg-block d-xl-block @endif">
        <div class="container d-flex justify-content-between p-0" style="height: 36px; align-items: center;">
            <span>
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
            </span>
            <div class="d-lg-block d-none" style="text-align:center; font-size: 15px;">
                @php($pincodes=\App\Model\Pincode::get())
                
                <span class="mr-2 custom_hover">
                    <i class="fa fa-map-marker fa-md" aria-hidden="true"></i>

                    <input type="hidden" name="" class="" id="pincode_value" value="@if(session()->get('pincode')){{ session()->get('pincode') }}@endif">
                    <label class="text-white custom_hover_lable" data-toggle="modal" data-target="#exampleModal_1" title="Change The Picode">@if(session()->get('pincode')){{ session()->get('pincode') }}@endif <i class="fa fa-caret-down fa-xl" aria-hidden="true"></i></label>
                </span>
               
                <span class="mr-2">
                  
                    <img class="mr-1"
                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/help_headermenu_web/help.svg"
                        alt="Help" loading="lazy" class="me-2">
                        <a href="{{ route('helpTopic') }}" class="text-white"> <span class="mr-1">Help</span></a>
                </span>
                <span class="mr-2">
                    <span class="mr-1">|</span>
                </span>
                <span class="mr-2">
                  
                    <img class="mr-1"
                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/91-96068-09090_topsubheader_web/91-96068-09090.svg"
                        alt=" 1800 123 6544" loading="lazy" class="me-2">
                    <span class="mr-1" style="font-size: 12px;" href="tel: {{$web_config['phone']->value}}">{{\App\CPU\Helpers::get_business_settings('company_phone')}}</span>
                </span>
                <span class="mr-2">
                  
                    <img class="mr-1"
                        src="https://img.theorganicworld.com/ORG-0/img/menu/web/hello-theorganicworld-com_topsubheader_web/hello-theorganicworld-com.svg"
                        alt="hello@theorganicworld.com" loading="lazy" class="me-2">
                    <span style="font-size: 12px;" href="email:">{{\App\CPU\Helpers::get_business_settings('company_email')}}</span>
                </span>
            </div>
            <div class="d-sm-block d-lg-none" style="text-align:center; font-size: 15px;">
                @php($pincodes=\App\Model\Pincode::get())
                
                <span class="mr-2 custom_hover">
                    <i class="fa fa-map-marker fa-md" aria-hidden="true"></i>

                    <label class="text-white custom_hover_lable" data-toggle="modal" data-target="#exampleModal_1" title="Change The Picode">@if(session()->get('pincode')){{ session()->get('pincode') }}@endif <i class="fa fa-caret-down fa-xl" aria-hidden="true"></i></label>
                </span>
            </div>
        </div>
    </div>
    @if(!(session()->get('pincode_rebbin')))
    <div class="d-flex justify-content-between align-items-center" id="anouncement_2" style="height: 40px;background-color: #5A3B21;color:{{$announcement['text_color']}}">
        <span></span>
        <span style="text-align:center; font-size: 15px;">You are seeing Catalogue In 560001 &nbsp;
        <span class="custom_hover border p-2" style=" margin-left: 1rem;" data-target="#exampleModal_1" data-toggle="modal" onclick="myFunction()" style="font-size: 12px;">Change Pincode</span></span>
        <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;"  onclick="myFunction()">X</span>
    </div>
    @endif
@endif


<header class="box-shadow-sm rtl">
    <!-- Topbar-->
    {{-- <div class="topbar">
        <div class="container">

            <div>
                <div class="topbar-text dropdown d-md-none {{Session::get('direction') === "rtl" ? 'mr-auto' : 'ml-auto'}}">
                    <a class="topbar-link" href="tel: {{$web_config['phone']->value}}">
                        <i class="fa fa-phone"></i> {{$web_config['phone']->value}}
                    </a>
                </div>
                <div class="d-none d-md-block {{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}} text-nowrap">
                    <a class="topbar-link d-none d-md-inline-block" href="tel:{{$web_config['phone']->value}}">
                        <i class="fa fa-phone"></i> {{$web_config['phone']->value}}
                    </a>
                </div>
            </div>

            <div>
                @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))
                @if ($currency_model == 'multi_currency')
                    <div class="topbar-text dropdown disable-autohide {{Session::get('direction') === "rtl" ? 'ml-4' : 'mr-4'}}">
                        <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <span>{{session('currency_code')}} {{session('currency_symbol')}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                            style="min-width: 160px!important;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                            @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                                <li style="cursor: pointer" class="dropdown-item"
                                    onclick="currency_change('{{$currency['code']}}')">
                                    {{ $currency->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php( $local = \App\CPU\Helpers::default_lang())
                <div
                    class="topbar-text dropdown disable-autohide  text-capitalize">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        @foreach (json_decode($language['value'], true) as $data)
                            @if ($data['code'] == $local)
                                <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}" width="20"
                                     src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                     alt="Eng">
                                {{$data['name']}}
                            @endif
                        @endforeach
                    </a>
                    <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                        @foreach (json_decode($language['value'], true) as $key => $data)
                            @if ($data['status'] == 1)
                                <li>
                                    <a class="dropdown-item pb-1" href="{{route('lang',[$data['code']])}}">
                                        <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                             width="20"
                                             src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                             alt="{{$data['name']}}"/>
                                        <span style="text-transform: capitalize">{{$data['name']}}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="navbar-sticky bg-light mobile-head" style="background-color: #FAF7EE !important;">
        <div class="navbar navbar-expand-md navbar-light">
            <div class="container p-0" style="justify-content: start;">
                {{-- <div class="col-lg-2 col-xl-2 d-flex"> --}}
                <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- <button class="navbar-toggler ps-0 d-block p-0 pr-2" type="button" id="sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="23" viewBox="0 0 14 15"
                        fill="none">
                        <rect opacity="0.89" y="9" width="3" height="14" rx="1"
                            transform="rotate(-90 0 9)" fill="#333333"></rect>
                        <rect opacity="0.89" y="3" width="3" height="9" rx="1"
                            transform="rotate(-90 0 3)" fill="#333333"></rect>
                        <rect opacity="0.89" y="15" width="3" height="10" rx="1"
                            transform="rotate(-90 0 15)" fill="#333333"></rect>
                    </svg>
                </button> --}}
                <a class="navbar-brand d-none d-sm-block ml-3 {{ Session::get('direction') === 'rtl' ? 'ml-3' : 'mr-2' }} flex-shrink-0"
                    href="{{ route('home') }}" style="min-width: 7rem;">
                    <img style="height: 70px!important; width:auto;"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>
                    {{-- <img src="{{ asset('public/assets/front-end/img/happy_harvest.png') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='https://img.theorganicworld.com/media/towfmcg/images/organic-world-logo.png';"
                        alt="organic world logo" width="100"> --}}
                   
                </a>
                <a class="navbar-brand d-sm-none {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"
                    href="{{ route('home') }}">
                    <img style="height: 38px!important;width:auto;" class="mobile-logo-img"
                        src="{{ asset('storage/app/public/company') . '/' . $web_config['mob_logo']->value }}"
                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                        alt="{{ $web_config['name']->value }}" />
                </a>
                {{-- </div> --}}
                <!-- Search-->
                <div class="input-group-overlay d-none d-md-block mx-2"
                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}; width: 500px">
                    <form action="{{ route('products') }}" type="submit" class="search_form search" id="search_form_home">
                        <span class="fa fa-search"></span>
                        <input class="form-control" autocomplete="off" id="search"
                            placeholder="Search for products, brands and more" name="name"  style="border: 1px solid #ABABAB; border-radius: 10px; background-color: #FAF7EE;">

                        {{-- <input type="text" class="form-control searchclass pe-5" id="searchkey" name="searchkey" value="" autocomplete="off" placeholder="Search for products, brands and more" aria-label="Search for products, brands and more" aria-describedby="searchIcon"> --}}
                        {{-- <input class="form-control appended-form-control search-bar-input" type="text"
                               autocomplete="off"
                               placeholder="{{\App\CPU\translate('search')}}"
                               name="name">
                        <button class="input-group-append-overlay search_button" type="submit"
                                style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};top:0">
                                <span class="input-group-text" style="font-size: 20px;">
                                    <i class="czi-search text-white"></i>
                                </span>
                        </button> --}}
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <div class="card search-card"
                            style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box"
                                style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </div>


                    </form>
                    
                    <div class="row">
                        {{-- <div class="col-lg-5">
                            <div class="row" style="height: 37px;">
                                <div class="col-lg-6" style="align-self: end;font-size: 14px; font-weight: 700; color: #69863c;">
                                    <span>Eat Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                                <div class="col-lg-6" style="align-self: end;font-size: 14px; font-weight: 700; color: #69863c;">
                                    <span>Live Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-6">
                            <div class="row" style="height: 37px;">
                                <div class="col-lg-5" style="align-self: end;font-size: 14px; font-weight: 700; color: #69863c;">
                                    <span>Look Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                                <div class="col-lg-6" style="align-self: end;font-size: 14px; font-weight: 700; color: #69863c;">
                                    <span>Nurture Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                            </div>    
                        </div> --}}
                        @php($categories = \App\Model\Category::where('position', '=', '0')->where('home_status', '=', '1')->orderBy('priority')->get())

                        @php($sub_categories = \App\Model\Category::where('position', '=', '1')->get())

                        @php($sub_sub_categoris = \App\Model\Category::where('position', '=', '2')->get())

                        @php($child_categoris = \App\Model\Category::where('position', '=', '3')->get())

                        
                        {{-- below is the workiing code  --}}
                        {{-- @foreach ($categories as $categorie)
                            <ul class="nav main-menu">
                                <li class="nav-item dropdown dropdownposition">
                                    <a class="nav-link dark-link active dropdown-toggle" type="button"
                                        onclick="activateFirstTab({{ $categorie->id }})" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        data-categories-id="{{ $categorie->id }}">
                                        {{ $categorie->name }}
                                    </a>

                                    <ul class="dropdown-menu prior-dropdown big-dropdown p-0 m-0">
                                        <ul class="nav nav-pills bg-orange-light w-100 justify-content-center"
                                            role="tablist">
                                            @isset($sub_categories)
                                                @foreach ($sub_categories as $key => $sc)
                                                    @if ($categorie['id'] == $sc['parent_id'])
                                                        <li class="nav-item " role="presentation">
                                                            <div id="tab-0_{{ $sc['id'] }}-tab"
                                                                data-target="#tab-0_{{ $sc['id'] }}"
                                                                data-toggle="tab" role="tab" aria-controls="tab-01"
                                                                aria-selected="true"
                                                                class="{{ $key == 0 ? 'active ' : '' }} cat-lis"
                                                                data-hover="tab">
                                                                <a class="dropdown-item sub-cat-dropdown nav-link rounded-0 p-3 font-12 font-600"
                                                                    onclick="location.href ='{{ route('products', ['id' => $sc->id, 'data_from' => 'category', 'page' => 1]) }}'"
                                                                    data-sub_categories-id="{{ $sc->id }}">
                                                                    <img src="{{ asset("storage/app/public/sub_category/$sc->icon") }}"
                                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                        class="mb-2 mx-auto d-block" loading="lazy"
                                                                        alt="{{ $sc['name'] }}"><span
                                                                        class="text-black"> {{ $sc['name'] }}</span></a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </ul>
                                        <div class="tab-content col-12">
                                            @isset($categories)
                                                @foreach ($sub_categories as $key => $Sub_category)
                                                    <div class="tab-pane sub-cat-tab-panes"
                                                        id="tab-0_{{ $Sub_category['id'] }}" role="tabpanel"
                                                        aria-labelledby="tab-0_{{ $key }}-tab">
                                                        <div class="main-menu-col h-100">
                                                            <div class="row row-cols-lg-5 h-100">
                                                                @foreach ($sub_sub_categoris as $keys => $Sub_subCategory)
                                                                    @if ($Sub_category['id'] == $Sub_subCategory['parent_id'])
                                                                        <div class="col-lg p-4">
                                                                            <a class=" main-meun-col-heading ta-0"
                                                                                data-Sub_subcategories-id="{{ $Sub_subCategory->id }}"><b>{{ $Sub_subCategory['name'] }}</b></a>
                                                                            @foreach ($child_categoris as $Child_Category)
                                                                                @if ($Sub_subCategory['id'] == $Child_Category['parent_id'])
                                                                                    <a href="{{ route('products', ['id' => $Child_Category['id'], 'data_from' => 'category', 'page' => 1]) }}"
                                                                                        data-child_categories-id="{{ $Child_Category->id }}">{{ $Child_Category['name'] }}</a>
                                                                                @endif
                                                                            @endforeach

                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        @endforeach --}}

                        {{-- <ul class="nav nav-tabs" id="mainCategoryTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link custom-btn-tabs " id="home-tab" data-toggle="tab"
                                    data-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Home<i class="fa fa-caret-down float-right" aria-hidden="true"></i></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link custom-btn-tabs" id="profile-tab" data-toggle="tab"
                                    data-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Profile<i class="fa fa-caret-down float-right aria-hidden="true"></i></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link custom-btn-tabs" id="contact-tab" data-toggle="tab"
                                    data-target="#contact" type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">Contact<i class="fa fa-caret-down float-right" aria-hidden="true"></i></i></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <ul class="dropdown-menu prior-dropdown big-dropdown p-0 m-0 show">
                                    <ul class="nav nav-pills bg-orange-light w-100 justify-content-center"
                                        role="tablist">
                                        @isset($sub_categories)
                                            @foreach ($sub_categories as $key => $category)
                                                <li class="nav-item custom_sub" role="presentation">
                                                    <div id="tab-0_{{ $key }}-tab"
                                                        data-target="#tab-0_{{ $key }}" data-toggle="tab"
                                                        role="tab" aria-controls="tab-01" aria-selected="true"
                                                        class=" {{ $key == 0 ? 'active' : '' }}" data-hover="tab">
                                                        <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600"
                                                            href="#">
                                                            <img src="{{ asset("storage/app/public/sub_category/$category->icon") }}"
                                                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                class="mb-2 mx-auto d-block" loading="lazy"
                                                                alt="{{ $category['name'] }}"><span class="text-black">
                                                                {{ $category['name'] }}</span></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endisset
                                    </ul>
                                    <div class="tab-content col-12">
                                        @isset($categories)
                                            @foreach ($sub_categories as $key => $Sub_category)
                                                <div class="{{ $key == 0 ? 'active' : '' }} tab-pane"
                                                    id="tab-0_{{ $key }}" role="tabpanel"
                                                    aria-labelledby="tab-0_{{ $key }}-tab">
                                                    <div class="main-menu-col h-100">
                                                        <div class="row row-cols-lg-5 h-100">
                                                            @foreach ($sub_sub_categoris as $keys => $Sub_subCategory)
                                                                <div class="col-lg p-4">
                                                                    <a
                                                                        class=" main-menu-col-heading ta-0">{{ $Sub_subCategory['name'] }}</a>
                                                                    @foreach ($child_categoris as $Child_Category)
                                                                        @if ($Sub_subCategory['id'] == $Child_Category['parent_id'])
                                                                            <a
                                                                                href="{{ route('products', ['id' => $Child_Category['id'], 'data_from' => 'category', 'page' => 1]) }}">{{ $Child_Category['name'] }}</a>
                                                                        @endif
                                                                    @endforeach

                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                B</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                C</div>
                        </div> --}}
                        {{-- <li class="nav-item dropdown dropdownposition">
                                    <a class="nav-link dark-link active dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Eat Better
                                    </a>
                                    
                                    <div class="dropdown-menu prior-dropdown big-dropdown p-0 m-0">
                                        <ul class="nav nav-pills bg-orange-light w-100 justify-content-center" role="tablist">
                                            @isset($categories)

                                            @foreach ($categories as $key => $category)
                                            <!-- < ?php echo json_encode($category) ?> -->
                                            @if (in_array($category['id'], [27, 3, 2, 4, 1, 28, 32, 6, 5, 31, 33]))
                                                <!-- <span>Something category</span> -->
                                            <li class="nav-item " role="presentation">
                                                <div id="tab-0_{{$key}}-tab" data-target="#tab-0_{{$key}}" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true" class="{{$key == 0 ? 'active':''}}" data-hover="tab">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="{{asset("storage/app/public/category/$category->icon")}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" class="mb-2 mx-auto d-block" loading="lazy" alt="{{$category['name']}}"><span class="text-black"> {{$category['name']}}</span></a>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach

                                          @endisset
                                        </ul>
                                        <div class="tab-content col-12">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            @if (in_array($category['id'], [27, 3, 2, 4, 1, 28, 32, 6, 5, 31, 33]))

                                            <div class="{{$key == 0 ? 'active':''}} tab-pane" id="tab-0_{{$key}}" role="tabpanel" aria-labelledby="tab-0_{{$key}}-tab">
                                                <div class="main-menu-col h-100">
                                                    <div class="row row-cols-lg-5 h-100">
                                                        @foreach ($category['childes'] as $keys => $subCategory)
                                                        <div class="col-lg p-4">
                                                            <a class=" main-menu-col-heading ta-0">{{$subCategory['name']}}</a>
                                                            @foreach ($subCategory['childes'] as $subSubCategory)
                                                            <a href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                            @endforeach

                                                            <!-- <a href="/bajra-flales-c-30-94/">Chana Flakes</a>
                                                            <a href="/bajra-flales-c-30-94/">Chocos</a>
                                                            <a href="/bajra-flales-c-30-94/">Coconut milk</a>
                                                            <a href="/bajra-flales-c-30-94/">Corn Flakes</a>
                                                            <a href="/bajra-flales-c-30-94/">Moong Flakes</a>
                                                            <a href="/bajra-flales-c-30-94/">Oats Flakes</a>
                                                            <a href="/bajra-flales-c-30-94/">ragi Flakes</a>
                                                            <a href="/bajra-flales-c-30-94/">Wheat Bran</a>
                                                            <a href="/bajra-flales-c-30-94/">Wheat Flakes</a> -->

                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endisset
                                            </div>
                                    </div>
                                </li> --}}
                        {{-- <li class="nav-item dropdown dropdownposition">
                                    <a class=" ta-1 nav-link dark-link active dropdown-toggle" id="ta-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Live Better
                                    </a>
                                    <div class="dropdown-menu prior-dropdown big-dropdown p-0 m-0">
                                        <ul class="nav nav-pills bg-orange-light w-100 justify-content-center" role="tablist">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            @if (in_array($category['id'], [246, 247, 248, 249]))
                                            <li class="nav-item " role="presentation">
                                                <div id="tab-1_{{$key}}-tab" data-target="#tab-1_{{$key}}" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true" class="{{$key == 0 ? 'active':''}}" data-hover="tab">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="{{asset("storage/app/public/category/$category->icon")}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" class="mb-2 mx-auto d-block" loading="lazy" alt="{{$category['name']}}"><span class="text-black"> {{$category['name']}}</span></a>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                            
                                            @endisset
                                            <!-- <li class="nav-item" role="presentation">
                                                <div id="tab-1_1-tab" data-target="#tab-1_1" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="https://img.theorganicworld.com/ORG-0/img/menu/web/dairy-and-bakery_categorytree_web/dairy-and-bakery.svg" class="mb-2 mx-auto d-block" loading="lazy" alt="Breakfast, Oats and Meals"><span class="text-black">Home Essentials</span></a>
                                                </div>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <div id="tab-1_2-tab" data-target="#tab-1_2" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="https://img.theorganicworld.com/ORG-0/img/menu/web/dals-grains-oil-and-flours_categorytree_web/dals-grains-oil-and-flours.svg" class="mb-2 mx-auto d-block" loading="lazy" alt="Breakfast, Oats and Meals"><span class="text-black">Gardening</span></a>
                                                </div>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <div id="tab-1_3-tab" data-target="#tab-1_3" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="https://img.theorganicworld.com/ORG-0/img/menu/web/eggs-and-batter_categorytree_web/eggs-and-batter.svg" class="mb-2 mx-auto d-block" loading="lazy" alt="Breakfast, Oats and Meals"><span class="text-black">Wellness</span></a>
                                                </div>
                                            </li> -->

                                        </ul>
                                        <div class="tab-content col-12">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            <div class="tab-pane {{$key == 0 ? 'active':''}}" id="tab-1_{{$key}}" role="tabpanel" aria-labelledby="tab-1_{{$key}}-tab">
                                                <div class="main-menu-col h-100">
                                                    <div class="row row-cols-lg-5 h-100">

                                                        @foreach ($category['childes'] as $subCategory)
                                                        <div class="col-lg p-4">
                                                            <a class="main-menu-col-heading ta-0">{{$subCategory['name']}}</a>
                                                            @foreach ($subCategory['childes'] as $subSubCategory)
                                                            <a href="/bajra-flales-c-30-94/">{{$subSubCategory['name']}}</a>
                                                            @endforeach

                                                        </div>
                                                        @endforeach
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                           
                                        </div>
                                    </div>
                                </li> --}}
                        {{-- <li class="nav-item dropdown  dropdownposition">
                                    <a class="ta-2 nav-link dark-link active dropdown-toggle" id="ta-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Look Better
                                    </a>
                                    <div class="dropdown-menu prior-dropdown big-dropdown p-0 m-0">
                                        <ul class="nav nav-pills bg-orange-light w-100 justify-content-center" role="tablist">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            @if (in_array($category['id'], [250]))
                                            <li class="nav-item " role="presentation">
                                                <div id="tab-2_{{$key}}-tab" data-target="#tab-2_{{$key}}" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true" class="{{$key == 0 ? 'active':''}}" data-hover="tab">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="{{asset("storage/app/public/category/$category->icon")}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" class="mb-2 mx-auto d-block" loading="lazy" alt="{{$category['name']}}"><span class="text-black"> {{$category['name']}}</span></a>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                            @endisset
                                           

                                        </ul>
                                        <div class="tab-content col-12">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            <div class="tab-pane " id="tab-2_{{$key}}" role="tabpanel" aria-labelledby="tab-2_{{$key}}-tab">
                                                <div class="main-menu-col h-100">
                                                    <div class="row row-cols-lg-5 h-100">

                                                        @foreach ($category['childes'] as $subCategory)
                                                        <div class="col-lg p-4">
                                                            <a class="main-menu-col-heading ta-0">{{$subCategory['name']}}</a>
                                                            @foreach ($subCategory['childes'] as $subSubCategory)
                                                            <a href="/bajra-flales-c-30-94/">{{$subSubCategory['name']}}</a>
                                                            @endforeach

                                                        </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </li> --}}
                        {{-- <li class="nav-item dropdown  dropdownposition">
                                    <a class="ta-3 nav-link dark-link active dropdown-toggle" id="ta-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Nurture Better
                                    </a>
                                    <div class="dropdown-menu prior-dropdown big-dropdown p-0 m-0">
                                        <ul class="nav nav-pills bg-orange-light w-100 justify-content-center" role="tablist">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            @if (in_array($category['id'], [251, 252, 253]))
                                            <li class="nav-item " role="presentation">
                                                <div id="tab-3_{{$key}}-tab" data-target="#tab-3_{{$key}}" data-toggle="tab" role="tab" aria-controls="tab-01" aria-selected="true" class="{{$key == 0 ? 'active':''}}" data-hover="tab">
                                                    <a class="dropdown-item nav-link rounded-0 p-3 font-12 font-600" href="#">
                                                        <img src="{{asset("storage/app/public/category/$category->icon")}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" class="mb-2 mx-auto d-block" loading="lazy" alt="{{$category['name']}}"><span class="text-black"> {{$category['name']}}</span></a>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                            @endisset
                                           

                                        </ul>
                                        <div class="tab-content col-12">
                                            @isset($categories)
                                            @foreach ($categories as $key => $category)
                                            <div class="tab-pane " id="tab-3_{{$key}}" role="tabpanel" aria-labelledby="tab-3_{{$key}}-tab">
                                                <div class="main-menu-col h-100">
                                                    <div class="row row-cols-lg-5 h-100">

                                                        @foreach ($category['childes'] as $subCategory)
                                                        <div class="col-lg p-4">
                                                            <a class="main-menu-col-heading ta-0">{{$subCategory['name']}}</a>
                                                            @foreach ($subCategory['childes'] as $subSubCategory)
                                                            <a href="/bajra-flales-c-30-94/">{{$subSubCategory['name']}}</a>
                                                            @endforeach

                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </li> --}}
                        </ul>
                    </div>
                    {{-- <div class="row" style="height: 37px;">
                        <div class="col-lg-3" style="align-self: end;font-size: 14px;
                        font-weight: 700;
                        color: #69863c;">
                            <span>Eat Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-lg-3" style="align-self: end;font-size: 14px;
                        font-weight: 700;
                        color: #69863c;">
                            <span>Live Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-lg-3" style="align-self: end;font-size: 14px;
                        font-weight: 700;
                        color: #69863c;">
                            <span>Look Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-lg-3" style="align-self: end;font-size: 14px;
                        font-weight: 700;
                        color: #69863c;">
                            <span>Nurture Better <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="ms-auto">
                    <ul class="nav mobile-nav-icon align-items-center justify-content-end">
                        <li class="d-lg-none">
                           <a class="d-flex align-items-center nav-link font-13 font-700" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="mobileSearch" href="#mobileSearch">
                           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                            <g opacity="0.8">
                            <ellipse cx="7.5513" cy="7.25002" rx="6.5513" ry="6.25002" stroke="#69863C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                            <path d="M16.722 16C16.722 16 13.6712 13.0895 12.1361 11.625" stroke="#69863C" stroke-width="2" stroke-linejoin="round"></path>
                            </g>
                            </svg>
                           </a>
                        </li>
                        <li>
                          <div id="locationDiv" class="d-flex align-items-center nav-link" data-bs-toggle="modal" data-bs-target="#DeliverAddressModal">
                            <svg class="me-lg-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21" fill="none">
                            <path d="M16.0941 7.92308C16.0941 13.4615 8.54707 19 8.54707 19C8.54707 19 1 14.1538 1 7.92308C1 4.09957 4.37894 1 8.54707 1C12.7152 1 16.0941 4.09957 16.0941 7.92308Z" stroke="#69863C" stroke-width="2" stroke-linecap="round"></path>
                            <ellipse cx="8.80184" cy="7.74961" rx="3.30184" ry="3.15" fill="#9BD74E"></ellipse>
                            </svg>
                                            
                        
                        
                        
                        <style>
                            @media (max-width: 1280px){
                                .delivery-location{
                                    display: none;
                                }
                            }
                        </style>
                        <div class="px-2 line-height-18px delivery-location">
                            <span class="font-700 font-13 text-muted">Deliver to Home</span> 
                            <input type="hidden" id="countryLat" value="77.63991"> 
                            <input type="hidden" id="countryLong" value="12.8892684">
                            <input type="hidden" id="isStoreloadedDefault" value="false">
                            <span class="font-600 font-14 d-block"><span id="location">Bengaluru</span>&nbsp;<span id="areaCode">560068</span></span>
                        </div></div>
                        </li>
                        
                        <li id="loginUser" class="d-none d-lg-block">
                        <div class="d-flex flex-wrap">
                         <a class="nav-link font-700 font-13 d-flex align-items-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" id="signInModal" title="Log in"> 
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="me-lg-2">
                        <path d="M8.01612 7.33155C9.76453 7.33155 11.1819 5.91419 11.1819 4.16578C11.1819 2.41737 9.76453 1 8.01612 1C6.26771 1 4.85034 2.41737 4.85034 4.16578C4.85034 5.91419 6.26771 7.33155 8.01612 7.33155Z" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.04278 15.7166C8.70053 15.7166 8.44385 15.7166 8.1016 15.7166C4.08021 15.7166 1 16.7434 1 13.9198C1 11.0963 4.25134 8.78613 8.27273 8.78613C9.47059 8.78613 10.5829 8.95726 11.5241 9.2995" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.2354 17.0002C15.1256 17.0002 16.6579 15.4679 16.6579 13.5777C16.6579 11.6876 15.1256 10.1553 13.2354 10.1553C11.3453 10.1553 9.81299 11.6876 9.81299 13.5777C9.81299 15.4679 11.3453 17.0002 13.2354 17.0002Z" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.4919 12.123L15.2887 13.4065L13.6631 14.861" stroke="#9BD74E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M11.7808 13.4062H15.2032" stroke="#9BD74E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                     </svg> 
                     <span class="d-none d-lg-block">Log In</span>
                     </a>
                     <a class="nav-link font-700 font-13 d-lg-flex align-items-center d-none" href="javascript:void(0)" id="signUpModal" title="Sign Up">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="me-lg-2">
                        <path d="M8.01612 7.33155C9.76453 7.33155 11.1819 5.91419 11.1819 4.16578C11.1819 2.41737 9.76453 1 8.01612 1C6.26771 1 4.85034 2.41737 4.85034 4.16578C4.85034 5.91419 6.26771 7.33155 8.01612 7.33155Z" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.04278 15.7166C8.70053 15.7166 8.44385 15.7166 8.1016 15.7166C4.08021 15.7166 1 16.7434 1 13.9198C1 11.0963 4.25134 8.78613 8.27273 8.78613C9.47059 8.78613 10.5829 8.95726 11.5241 9.2995" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.2354 17.0002C15.1256 17.0002 16.6579 15.4679 16.6579 13.5777C16.6579 11.6876 15.1256 10.1553 13.2354 10.1553C11.3453 10.1553 9.81299 11.6876 9.81299 13.5777C9.81299 15.4679 11.3453 17.0002 13.2354 17.0002Z" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.4919 12.123L15.2887 13.4065L13.6631 14.861" stroke="#9BD74E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M11.7808 13.4062H15.2032" stroke="#9BD74E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                     </svg>
                     <span class="d-none d-lg-block">Sign Up</span>
                     </a>
                    <input type="hidden" id="tabValueMenu" value="">
                    <input type="hidden" id="isLoggedIn" value="">
                    <input type="hidden" id="catlgID" value="30">
                    <input type="hidden" id="crtcnt" value="0">
                    <input type="hidden" id="_isLogged" value="N">
                    </div>
                        </li>
                        <li class="shoppingCart">
                              <a id="shop_cart_menu" class="d-flex align-items-center position-relative me-2" onclick="redirectToCart();" data-toggle="tooltip" data-placement="bottom" title="Cart">
                               <span class="bg-count bg-orange rounded-circle" id="shopCartCount">0</span>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="19" viewBox="0 0 23 19" fill="none">
                                <ellipse cx="8.12926" cy="17.1508" rx="0.890974" ry="0.85" fill="#69863C" stroke="#9BD74E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                                <ellipse cx="18.8207" cy="17.1508" rx="0.890974" ry="0.85" fill="#69863C" stroke="#9BD74E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                                <path d="M1 1H4.72589L7.22224 10.8637C7.39804 11.5637 8.18294 12.0634 9.08518 12.0497H18.1391C19.0413 12.0634 19.8262 11.5637 20.002 10.8637L21.4924 4.68324H9.08518" stroke="#69863C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                             </a>
                             <input type="hidden" id="cartCount" value="">
                        </li>
                    </ul>
                    <ul class="nav justify-content-end mt-2 header-subscription">
                        <li><a href="/offer/" class="sprites bg-offer d-flex align-items-center justify-content-center font-13 font-700 text-orange"> 
                           <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="31" height="33" viewBox="0 0 31 33" fill="none">
                            <g filter="url(#filter0_d)">
                            <path d="M24.283 21.5859L16.7934 23.5761C16.1796 23.6932 15.5657 23.459 15.4429 22.8737L11.6367 9.99613L15.4429 4.25977L21.3363 7.42062L25.1424 20.4152C25.2652 20.8835 24.8969 21.4689 24.283 21.5859Z" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.0222 7.42383L6.23382 10.1164L4.0238 20.3014C3.90102 20.7697 4.26936 21.2379 4.76047 21.355L11.2678 22.4086C12.0045 22.5257 12.6183 22.0574 12.7411 21.4721L12.8639 20.8867" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.7407 4.38057C12.3723 2.62454 13.109 0.985577 14.3368 0.751439C15.5646 0.517302 16.9152 1.68799 17.2835 3.44402C17.6519 5.20005 16.9152 6.83901 15.5646 7.07315" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M19.7363 11.6348L16.9124 18.1906" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M20.9689 16.4319C21.1724 16.4319 21.3373 16.2747 21.3373 16.0807C21.3373 15.8867 21.1724 15.7295 20.9689 15.7295C20.7655 15.7295 20.6006 15.8867 20.6006 16.0807C20.6006 16.2747 20.7655 16.4319 20.9689 16.4319Z" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.5646 13.9739C15.7681 13.9739 15.933 13.8167 15.933 13.6227C15.933 13.4287 15.7681 13.2715 15.5646 13.2715C15.3612 13.2715 15.1963 13.4287 15.1963 13.6227C15.1963 13.8167 15.3612 13.9739 15.5646 13.9739Z" stroke="#EB883C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                            <defs>
                            <filter id="filter0_d" x="0.498047" y="0.22168" width="30.1691" height="31.8837" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                            <feOffset dx="1" dy="4"></feOffset>
                            <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                            <feColorMatrix type="matrix" values="0 0 0 0 0.9 0 0 0 0 0.412071 0 0 0 0 0.0375 0 0 0 0.8 0"></feColorMatrix>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                            </filter>
                            </defs>
                            </svg>
                           Offers
                           </a>
                      </li>
                      <li>
                        <a href="/faces/page.jsp?page=subscription" class="mx-3 sprites bg-subscription-lg d-flex align-items-center justify-content-center font-13 font-700 text-primary">
                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 26 22" fill="none">
                        <path d="M10.7957 19.9107C5.08155 19.9107 1 21.4073 1 17.4618C1 14.6047 3.44893 12.1558 6.98628 11.0674" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.5575 11.0674C15.6936 11.0674 15.8296 11.2034 15.9657 11.2034C16.3738 11.3395 16.782 11.4755 17.1902 11.7476C18.0065 12.1558 18.8228 12.7 19.503 13.2442" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M11.0678 9.43521C13.3971 9.43521 15.2854 7.54692 15.2854 5.2176C15.2854 2.88829 13.3971 1 11.0678 1C8.73851 1 6.85022 2.88829 6.85022 5.2176C6.85022 7.54692 8.73851 9.43521 11.0678 9.43521Z" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M12.7005 18.0064L15.0133 20.9996L25.3533 11.748" stroke="#69863C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg> 
                        Subscription
                        </a>
                        </li>
                    <li><a href="/media/towfmcg/pdf/Healthy-home.pdf" target="_blank" class="border border-primary rounded-3 px-3 py-2 d-flex align-items-center"><img loading="lazy" src="https://img.theorganicworld.com/media/towfmcg/images/HHR.png" alt="My Happy SVG"></a></li>
                  </ul>
                </div> --}}
                {{--  --}}
    <div class="d-flex justify-content-center text-center {{ Session::get('direction') === 'rtl' ? 'text-md-right' : 'text-md-left' }}">
   
    
        <div class="p-1 d-none d-md-block">
            <a href="{{ route('about-us') }}">
                <div style="text-align: center;">
                    <p>
                        {{ \App\CPU\translate('About us') }}
                    </p>
                </div>
            </a>
        </div>
  
</div>
                {{--  --}}
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center ml-auto"
                    style=" ">
                    {{-- <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">{{ \App\CPU\translate('Expand menu') }}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon czi-menu"></i>
                        </div>
                    </a> --}}
                    <div class="navbar-tool dropdown {{ Session::get('direction') === 'rtl' ? 'mr-3' : 'ml-3' }}">
                        <a class="navbar-tool-icon-box bg-custome-brown dropdown-toggle text-white" href="{{ route('wishlists') }}">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist">{{ session()->has('wish_list') ? count(session('wish_list')) : 0 }}</span>
                            </span>
                            <i class="navbar-tool-icon czi-heart"></i>
                        </a>
                    </div>
                    @if (auth('customer')->check())
                        <div class="dropdown">
                            <a class="navbar-tool ml-2 mr-2 " type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <img style="width: 40px;height: 40px"
                                            src="{{ asset('storage/app/public/profile/' . auth('customer')->user()->image) }}"
                                            onerror="this.src='{{ asset('public/assets/front-end/img/default_profile.png') }}'"
                                            class="img-profile rounded-circle">
                                    </div>
                                </div>
                                <div class="navbar-tool-text">
                                    <small>{{ \App\CPU\translate('hello') }},
                                        {{ auth('customer')->user()->f_name }}</small>
                                    {{ \App\CPU\translate('dashboard') }}
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('account-oder') }}">
                                    {{ \App\CPU\translate('my_orders') }} </a>
                                <a class="dropdown-item" href="{{ route('user-account') }}">
                                    {{ \App\CPU\translate('my_profile') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ route('customer.auth.logout') }}">{{ \App\CPU\translate('logout') }}</a>
                            </div>
                        </div>
                    @else
                        <div class="dropdown">
                            <a class="navbar-tool {{ Session::get('direction') === 'rtl' ? 'mr-3' : 'ml-3' }}"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="navbar-tool-icon-box">
                                    <div class="navbar-tool-icon-box bg-custome-warming text-white">
                                        <i class="navbar-tool-icon czi-user"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}"
                                aria-labelledby="dropdownMenuButton"
                                style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                <a class="dropdown-item" href="{{ route('customer.auth.login') }}">
                                    <i
                                        class="fa fa-sign-in {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"></i>
                                    {{ \App\CPU\translate('sign_in') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('customer.auth.sign-up') }}">
                                    <i
                                        class="fa fa-user-circle {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"></i>{{ \App\CPU\translate('sign_up') }}
                                </a>
                            </div>
                        </div>
                    @endif
                    <div id="cart_items">
                        @include('layouts.front-end.partials.cart')
                    </div>
                </div>
                
                <div class="input-group-overlay d-md-none d-sm-block mx-2"
                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}; width: 500px">
                    <form action="{{ route('products') }}" type="submit" class="search_form search" id="search_form_home_2">
                        <span class="fa fa-search"></span>
                        <input class="form-control" autocomplete="off" id="search2"
                            placeholder="Search for products, brands and more" name="name"  style="border: 1px solid #ABABAB; border-radius: 10px; background-color: #FAF7EE;">
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <div class="card search-card"
                            style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box"
                                style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        @isset($categories)
            <div class="col-md-10 offset-lg-1" style="display: inline-block">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme mt-2 owl-loaded owl-drag" id="horizontal-categories" >
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="margin-right:25px;">
                                {{-- <div class="owl-item m-1 p-1"> --}}
                                    {{-- <div><a href="#" class="d-lg-flex d-flex align-items-center rounded-3"
                                            tabindex="0" style="width: 100%; display: inline-block;"> --}}
                                            {{-- <svg class="me-2 flex-shrink-0" xmlns="{{ asset("storage/app/public/sub_category/all_categories.png") }}"
                                                width="34" height="31" viewBox="0 0 34 31" fill="none">
                                                <path
                                                    d="M21.0981 5.49926C21.4981 4.49926 21.9981 3.59926 22.1981 3.19926C22.7981 2.19926 23.9981 1.89926 24.8981 2.49926C25.7981 3.09926 25.8981 4.29926 25.2981 5.29926C25.0981 5.69926 24.3981 6.49926 23.5981 7.29926"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <mask id="path-2-inside-1" fill="white">
                                                    <path
                                                        d="M26.3997 1.69961C25.9997 2.29961 24.9997 2.49961 24.9997 2.49961C24.9997 2.49961 24.7997 1.59961 25.1997 0.899609C25.5997 0.199609 26.5997 0.0996094 26.5997 0.0996094C26.5997 0.0996094 26.7997 0.999609 26.3997 1.69961Z">
                                                    </path>
                                                </mask>
                                                <path
                                                    d="M26.3997 1.69961L27.6478 2.53166C27.6669 2.50301 27.685 2.47371 27.7021 2.44382L26.3997 1.69961ZM24.9997 2.49961L23.5354 2.825C23.7124 3.62157 24.4937 4.13051 25.2939 3.97048L24.9997 2.49961ZM26.5997 0.0996094L28.064 -0.225785C27.8992 -0.967246 27.2062 -1.46852 26.4505 -1.39295L26.5997 0.0996094ZM25.1516 0.867559C25.2017 0.792411 25.1899 0.849529 24.9728 0.939994C24.8913 0.97395 24.8131 0.998968 24.7561 1.01501C24.7286 1.02275 24.7086 1.02767 24.6988 1.02998C24.6939 1.03113 24.6918 1.03157 24.6928 1.03137C24.6933 1.03126 24.6946 1.03099 24.6967 1.03055C24.6977 1.03033 24.699 1.03007 24.7004 1.02977C24.7012 1.02961 24.702 1.02945 24.7028 1.02928C24.7032 1.0292 24.7037 1.02911 24.7041 1.02902C24.7044 1.02897 24.7047 1.0289 24.7048 1.02888C24.7052 1.02881 24.7055 1.02874 24.9997 2.49961C25.2939 3.97048 25.2942 3.97041 25.2946 3.97033C25.2947 3.97031 25.2951 3.97023 25.2954 3.97018C25.2959 3.97008 25.2964 3.96997 25.297 3.96986C25.298 3.96964 25.2992 3.96941 25.3004 3.96916C25.3029 3.96866 25.3056 3.9681 25.3085 3.96749C25.3144 3.96626 25.3214 3.96479 25.3293 3.96307C25.3451 3.95964 25.3649 3.9552 25.3881 3.9497C25.4346 3.93873 25.4958 3.92335 25.5683 3.90296C25.7113 3.86275 25.9081 3.80027 26.1266 3.70922C26.5095 3.54969 27.1977 3.20681 27.6478 2.53166L25.1516 0.867559ZM24.9997 2.49961C26.464 2.17422 26.4641 2.17463 26.4642 2.17505C26.4642 2.17518 26.4643 2.17559 26.4644 2.17586C26.4645 2.1764 26.4646 2.17692 26.4647 2.17743C26.4649 2.17846 26.4651 2.17944 26.4653 2.18036C26.4657 2.18222 26.4661 2.18389 26.4664 2.18537C26.467 2.18834 26.4675 2.19057 26.4678 2.1921C26.4684 2.19514 26.4685 2.19542 26.4681 2.1932C26.4672 2.18863 26.4648 2.17461 26.462 2.153C26.4561 2.10826 26.4497 2.04031 26.4497 1.96211C26.4497 1.77948 26.484 1.67545 26.5021 1.64382L23.8973 0.155401C23.5154 0.823768 23.4497 1.51974 23.4497 1.96211C23.4497 2.19641 23.4683 2.39721 23.4874 2.5431C23.4971 2.6168 23.5072 2.67856 23.5157 2.72594C23.52 2.74969 23.524 2.77 23.5273 2.78657C23.529 2.79485 23.5305 2.80222 23.5319 2.80864C23.5326 2.81185 23.5332 2.81482 23.5338 2.81754C23.5341 2.81891 23.5344 2.82021 23.5346 2.82146C23.5348 2.82208 23.5349 2.82268 23.535 2.82328C23.5351 2.82357 23.5352 2.824 23.5352 2.82415C23.5353 2.82458 23.5354 2.825 24.9997 2.49961ZM26.5021 1.64382C26.4519 1.73171 26.4224 1.69934 26.5764 1.6416C26.6353 1.6195 26.6935 1.60474 26.7358 1.59615C26.7557 1.59211 26.7687 1.59011 26.7724 1.58957C26.7742 1.58932 26.7733 1.58946 26.7696 1.58992C26.7677 1.59014 26.7651 1.59045 26.7617 1.59083C26.76 1.59102 26.7581 1.59123 26.7559 1.59145C26.7549 1.59156 26.7538 1.59168 26.7526 1.5918C26.752 1.59186 26.7514 1.59192 26.7508 1.59198C26.7505 1.59201 26.7501 1.59206 26.7499 1.59207C26.7494 1.59212 26.749 1.59217 26.5997 0.0996094C26.4505 -1.39295 26.45 -1.3929 26.4495 -1.39285C26.4493 -1.39283 26.4488 -1.39278 26.4485 -1.39275C26.4478 -1.39268 26.4471 -1.39261 26.4464 -1.39254C26.445 -1.3924 26.4436 -1.39224 26.442 -1.39208C26.4389 -1.39176 26.4356 -1.39139 26.432 -1.391C26.4247 -1.3902 26.4164 -1.38924 26.4072 -1.38811C26.3886 -1.38585 26.3659 -1.38287 26.3395 -1.37903C26.2869 -1.37136 26.2187 -1.36008 26.1386 -1.34381C25.9809 -1.31177 25.7641 -1.25778 25.523 -1.16738C25.077 -1.00012 24.3476 -0.632486 23.8973 0.155401L26.5021 1.64382ZM26.5997 0.0996094C25.1354 0.425004 25.1353 0.424586 25.1352 0.424172C25.1352 0.424038 25.1351 0.423626 25.1351 0.423358C25.1349 0.422822 25.1348 0.422297 25.1347 0.421785C25.1345 0.42076 25.1343 0.419783 25.1341 0.418854C25.1337 0.416996 25.1333 0.415327 25.133 0.413844C25.1324 0.410879 25.1319 0.408648 25.1316 0.407122C25.131 0.404081 25.131 0.403795 25.1314 0.406022C25.1322 0.41059 25.1346 0.424611 25.1374 0.446222C25.1433 0.490962 25.1497 0.558905 25.1497 0.637109C25.1497 0.819742 25.1154 0.923769 25.0973 0.955401L27.7021 2.44382C28.084 1.77545 28.1497 1.07948 28.1497 0.63711C28.1497 0.402813 28.1311 0.202007 28.112 0.0561219C28.1023 -0.0175799 28.0922 -0.0793397 28.0837 -0.126725C28.0794 -0.150474 28.0755 -0.17078 28.0721 -0.187347C28.0704 -0.195636 28.0689 -0.203005 28.0675 -0.209419C28.0669 -0.212627 28.0662 -0.215597 28.0656 -0.218326C28.0653 -0.21969 28.065 -0.220994 28.0648 -0.222237C28.0646 -0.222859 28.0645 -0.223466 28.0644 -0.224057C28.0643 -0.224352 28.0642 -0.224785 28.0642 -0.224933C28.0641 -0.225361 28.064 -0.225785 26.5997 0.0996094Z"
                                                    fill="#9BD74E" mask="url(#path-2-inside-1)"></path>
                                                <path
                                                    d="M27.2979 3.04941C27.0473 3.04941 26.8058 2.97418 26.5894 2.86472C26.8106 2.73553 27.0528 2.64941 27.2979 2.64941C27.5486 2.64941 27.7901 2.72464 28.0065 2.83411C27.7853 2.9633 27.5431 3.04941 27.2979 3.04941ZM28.615 2.32751C28.6152 2.32728 28.6147 2.32792 28.6135 2.32937L28.6142 2.32852L28.615 2.32751Z"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M22.1997 3.2998L23.5997 4.2998" stroke="#9BD74E"
                                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M12.1983 7.49978C11.1983 6.39978 10.9983 4.79978 11.7983 3.59978C12.6983 2.29978 14.6983 1.99978 15.7983 3.29978C15.8983 3.39978 15.8983 3.49978 15.9983 3.49978C16.1983 3.69978 16.5983 3.69978 16.7983 3.89978C18.0983 4.59978 18.2983 6.29978 17.4983 7.39978"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M15.7969 1.39941C16.5969 2.09941 15.9969 3.49941 15.9969 3.49941C15.9969 3.49941 17.1969 2.49941 17.5969 2.79941"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M8.5 10.3V5.5" stroke="#69863C" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M22.6984 27.7998H11.3984" stroke="#69863C" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M27.7969 6V16.7" stroke="#69863C" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M30.9969 20.1998C32.0969 21.0998 32.8969 22.4998 32.8969 23.9998C32.8969 26.6998 30.6969 28.7998 28.0969 28.7998C25.4969 28.7998 23.2969 26.5998 23.2969 23.9998C23.2969 21.9998 24.4969 20.3998 26.0969 19.5998C26.2969 19.4998 26.5969 19.3998 26.8969 19.2998"
                                                    stroke="#69863C" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M30.0885 18.3409C29.8881 18.5887 29.6131 18.8302 29.2192 18.965C29.2309 18.9476 29.243 18.9303 29.2553 18.9131C29.4181 18.6871 29.6271 18.4972 29.9017 18.3837C29.9638 18.3581 30.0324 18.3351 30.108 18.3163C30.1016 18.3245 30.0951 18.3327 30.0885 18.3409Z"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M8.5 5.5C10.1 5.5 10.1 7.5 11.7 7.5C13.3 7.5 13.3 5.5 14.9 5.5C16.5 5.5 16.5 7.5 18.1 7.5C19.7 7.5 19.7 5.5 21.3 5.5C22.9 5.5 22.9 7.5 24.5 7.5C26.1 7.5 26.1 5.5 27.7 5.5"
                                                    stroke="#69863C" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M10.0984 28.899C7.29844 30.199 4.09844 30.199 1.39844 28.899L1.79844 25.899C2.19844 23.099 2.39844 20.299 2.29844 17.499L2.19844 14.999C2.19844 14.199 2.79844 13.499 3.69844 13.499H7.59844C8.39844 13.499 8.99844 14.199 8.99844 14.999V18.399C8.99844 20.699 9.19844 22.899 9.49844 25.199L10.0984 28.899Z"
                                                    stroke="#69863C" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path opacity="0.25"
                                                    d="M10.0984 28.899C7.29844 30.199 4.09844 30.199 1.39844 28.899L1.79844 25.899C2.19844 23.099 2.39844 20.299 2.29844 17.499L2.19844 14.999C2.19844 14.199 2.79844 13.499 3.69844 13.499H7.59844C8.39844 13.499 8.99844 14.199 8.99844 14.999V18.399C8.99844 20.699 9.19844 22.899 9.49844 25.199L10.0984 28.899Z"
                                                    fill="white" stroke="#69863C" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M7.49844 13.4992H3.89844V11.6992C3.89844 11.3992 4.09844 11.1992 4.39844 11.1992H6.99844C7.29844 11.1992 7.49844 11.3992 7.49844 11.6992V13.4992Z"
                                                    stroke="#69863C" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5.92434 22.0909C5.94218 22.1685 5.94681 22.2043 5.94795 22.2102C5.94507 22.2629 5.92094 22.3261 5.87495 22.3754C5.83286 22.4205 5.77761 22.4496 5.69824 22.4496C5.56868 22.4496 5.51899 22.4097 5.50357 22.3943C5.48861 22.3793 5.45059 22.3321 5.44835 22.211C5.44909 22.2091 5.45307 22.1739 5.47215 22.0909C5.49449 21.9937 5.52862 21.868 5.57316 21.7188C5.61006 21.5952 5.65244 21.4609 5.69824 21.321C5.74404 21.4609 5.78643 21.5952 5.82333 21.7188C5.86787 21.868 5.902 21.9937 5.92434 22.0909Z"
                                                    stroke="#9BD74E" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg> --}}
                                            {{-- <img src="{{ asset("storage/app/public/sub_category/all_category_1.png") }}"
                                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                style="width: 40px; height: 40px; "> &nbsp; &nbsp;
                                            <span class="ml-1 artegra_reguler" >
                                                <p class="m-0">All</p> Categories
                                            </span>
                                        </a>
                                    </div> --}}
                                {{-- </div> --}}
                                @foreach ($categories as $key => $category)
                                    {{-- @if ($key < 8)  --}}
                                    <div class="owl-item m-1 p-1">
                                        {{-- <div> --}}
                                        <a href="{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}"
                                            class="d-lg-flex d-flex align-items-center rounded-3" tabindex="0"
                                            style="width: 100%;">
                                            <img src="{{ asset("storage/app/public/category/$category->icon") }}"
                                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                style="width: 40px; height: 40px; ">
                                            &nbsp; &nbsp;
                                            <span class="artegra_reguler">{{ $category['name'] }}</span>
                                        </a>
                                        {{-- </div> --}}
                                    </div>
                                    {{-- @endif --}}
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        @endisset
        {{-- <div class="navbar navbar-expand-md navbar-stuck-menu"  >
            <div class="container" style="padding-left: 10px;padding-right: 10px;">
                <div class="collapse navbar-collapse" id="navbarCollapse"
                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}; ">

                    <!-- Search-->
                    <div class="input-group-overlay d-md-none my-3">
                        <form action="{{route('products')}}" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                   autocomplete="off"
                                   placeholder="{{\App\CPU\translate('search')}}" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                    style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                            <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                            </span>
                            </button>
                            <diV class="card search-card"
                                 style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                                <div class="card-body search-result-box" id=""
                                     style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div>

                    @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
                    <ul class="navbar-nav mega-nav pr-2 pl-2 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} d-none d-xl-block ">
                        <!--web-->
                        <li class="nav-item {{!request()->is('/')?'dropdown':''}}">
                            <a class="nav-link dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                               href="#" data-toggle="dropdown" style="{{request()->is('/')?'pointer-events: none':''}}">
                                <i class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                <span
                                    style="margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 40px !important;margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 50px">
                                    {{ \App\CPU\translate('categories')}}
                                </span>
                            </a>
                            @if (request()->is('/'))
                                <ul class="dropdown-menu" style="right: 0%; display: block!important;
                                    margin-top: 8px; margin-right: 11px;border: 1px solid #ccccccb3;
                                    border-bottom-left-radius: 5px;
                                    border-bottom-right-radius: 5px; box-shadow: none;min-width: 303px !important;{{Session::get('direction') === "rtl" ? 'margin-right: 1px!important;text-align: right;' : 'margin-left: 1px!important;text-align: left;'}}padding-bottom: 0px!important;">
                                    @foreach ($categories as $key => $category)
                                        @if ($key < 8)
                                            <li class="dropdown">
                                                <a class="dropdown-item flex-between"
                                                   <?php if ($category->childes->count() > 0) {
                                                       echo "data-toggle='dropdown'";
                                                   } ?> href="javascript:"
                                                   onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                                                    <div>
                                                        <img
                                                            src="{{asset("storage/app/public/category/$category->icon")}}"
                                                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                            style="width: 18px; height: 18px; ">
                                                        <span
                                                            class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>
                                                    </div>
                                                    @if ($category->childes->count() > 0)
                                                        <div>
                                                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                                        </div>
                                                    @endif
                                                </a>
                                                @if ($category->childes->count() > 0)
                                                    <ul class="dropdown-menu"
                                                        style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                        @foreach ($category['childes'] as $subCategory)
                                                            <li class="dropdown">
                                                                <a class="dropdown-item flex-between"
                                                                   <?php if ($subCategory->childes->count() > 0) {
                                                                       echo "data-toggle='dropdown'";
                                                                   } ?> href="javascript:"
                                                                   onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                                                    <div>
                                                                        <span
                                                                            class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                                                    </div>
                                                                    @if ($subCategory->childes->count() > 0)
                                                                        <div>
                                                                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                                                        </div>
                                                                    @endif
                                                                </a>
                                                                @if ($subCategory->childes->count() > 0)
                                                                    <ul class="dropdown-menu"
                                                                        style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                                        @foreach ($subCategory['childes'] as $subSubCategory)
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                    <a class="dropdown-item text-capitalize" href="{{route('categories')}}"
                                       style="color: {{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 29%">
                                        {{\App\CPU\translate('view_more')}}

                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                    </a>

                                </ul>
                            @else
                                <ul class="dropdown-menu"
                                    style="right: 0; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    @foreach ($categories as $category)
                                        <li class="dropdown">
                                            <a class="dropdown-item flex-between <?php if ($category->childes->count() > 0) {
                                                echo "data-toggle='dropdown";
                                            } ?> "
                                               <?php if ($category->childes->count() > 0) {
                                                   echo "data-toggle='dropdown'";
                                               } ?> href="javascript:"
                                               onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                                                <div>
                                                    <img src="{{asset("storage/app/public/category/$category->icon")}}"
                                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                         style="width: 18px; height: 18px; ">
                                                    <span
                                                        class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>
                                                </div>
                                                @if ($category->childes->count() > 0)
                                                    <div>
                                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                                    </div>
                                                @endif
                                            </a>
                                            @if ($category->childes->count() > 0)
                                                <ul class="dropdown-menu"
                                                    style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                    @foreach ($category['childes'] as $subCategory)
                                                        <li class="dropdown">
                                                            <a class="dropdown-item flex-between <?php if ($subCategory->childes->count() > 0) {
                                                                echo "data-toggle='dropdown";
                                                            } ?> "
                                                               <?php if ($subCategory->childes->count() > 0) {
                                                                   echo "data-toggle='dropdown'";
                                                               } ?> href="javascript:"
                                                               onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                                                <div>
                                                                    <span
                                                                        class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                                                </div>
                                                                @if ($subCategory->childes->count() > 0)
                                                                    <div>
                                                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                                                    </div>
                                                                @endif
                                                            </a>
                                                            @if ($subCategory->childes->count() > 0)
                                                                <ul class="dropdown-menu"
                                                                    style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                                    @foreach ($subCategory['childes'] as $subSubCategory)
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                               href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                    <a class="dropdown-item" href="{{route('categories')}}"
                                       style="color: {{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 29%">
                                        {{\App\CPU\translate('view_more')}}

                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}" style="font-size: 8px !important;background:none !important;color:{{$web_config['primary_color']}} !important;"></i>
                                    </a>
                                </ul>
                            @endif
                        </li>
                    </ul>

                    <ul class="navbar-nav mega-nav1 pr-2 pl-2 d-block d-xl-none"><!--mobile-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                               href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                <span
                                    style="margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 20px !important;">{{ \App\CPU\translate('categories')}}</span>
                            </a>
                            <ul class="dropdown-menu"
                                style="right: 0%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach ($categories as $category)
                                    <li class="dropdown">

                                            <a style="font-family:  sans-serif !important;font-size: 1rem;
                                            font-weight: 300;line-height: 1.5;"
                                           <?php if ($category->childes->count() > 0) {
                                               echo '';
                                           } ?>
                                            href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                            <img src="{{asset("storage/app/public/category/$category->icon")}}"
                                                 onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                 style="width: 18px; height: 18px; ">
                                            <span
                                                class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>

                                        </a>
                                        @if ($category->childes->count() > 0)
                                            <a  data-toggle='dropdown' style="margin-left:50px;">
                                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                                style="font-size: 10px !important;background:none !important;color:#4B5864;font:bold;"></i>
                                            </a>
                                        @endif

                                        @if ($category->childes->count() > 0)
                                            <ul class="dropdown-menu"
                                                style="right: 10%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                @foreach ($category['childes'] as $subCategory)
                                                    <li class="dropdown">
                                                        <a  href="{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}">
                                                            <span
                                                                class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                                        </a>

                                                        @if ($subCategory->childes->count() > 0)
                                                        <a style="font-family:  sans-serif !important;font-size: 1rem;
                                                            font-weight: 300;line-height: 1.5;margin-left:50px;" data-toggle='dropdown'>
                                                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                                                style="font-size: 10px !important;background:none !important;color:#4B5864;font:bold;"></i>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                                style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                                @foreach ($subCategory['childes'] as $subSubCategory)
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav" style="{{Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''}}">
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('home')}}">{{ \App\CPU\translate('Home')}}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               data-toggle="dropdown">{{ \App\CPU\translate('brand') }}</a>
                            <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} scroll-bar"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach (\App\CPU\BrandManager::get_active_brands() as $brand)
                                    <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:space-between; ">
                                        <div>
                                            <a class="dropdown-item"
                                               href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                                                {{$brand['name']}}
                                            </a>
                                        </div>
                                        <div class="align-baseline">
                                            @if ($brand['brand_products_count'] > 0)
                                                <span class="count-value px-2">( {{ $brand['brand_products_count'] }} )</span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                                <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:center;">
                                    <div>
                                        <a class="dropdown-item" href="{{route('brands')}}"
                                        style="color: {{$web_config['primary_color']}} !important;">
                                            {{ \App\CPU\translate('View_more') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count())
                        @if ($discount_product > 0)
                            <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                                <a class="nav-link text-capitalize" href="{{route('products',['data_from'=>'discounted','page'=>1])}}">{{ \App\CPU\translate('discounted_products')}}</a>
                            </li>
                        @endif

                        @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                        @if ($business_mode == 'multi')
                            <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                                <a class="nav-link" href="{{route('sellers')}}">{{ \App\CPU\translate('Sellers')}}</a>
                            </li>

                            @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                            @if ($seller_registration)
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: white;margin-top: 5px; padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0">
                                            {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('zone')}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            style="min-width: 165px !important; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                            <a class="dropdown-item" href="{{route('shop.apply')}}">
                                                {{ \App\CPU\translate('Become a')}} {{ \App\CPU\translate('Seller')}}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                                {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('login')}}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</header>

<script>
    function myFunction() {
        $('#anouncement_2').addClass('d-none').removeClass('d-flex');
        $('#anouncement').addClass('d-lg-block d-xl-block');

    }

    // submit the serch
        var input = document.getElementById("search");
                input.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    document.getElementById("search_form_home").submit();
                }
                });
        var input2 = document.getElementById("search2");

                input2.addEventListener("keypress", function(event2) {
                if (event2.key === "Enter") {
                    event2.preventDefault();
                    document.getElementById("search_form_home_2").submit();
                }
                });
</script>

<script>
    /* window.addEventListener('DOMContentLoaded', (event) => {
      //  let temp_arraya = $categories;
        temp_arraya.forEach((items, m) => {
            window.addEventListener('DOMContentLoaded', (event) => {
                // let temp_array = $sub_categories;
                temp_array.forEach((item, i) => {
                    let elem = document.getElementById('tab-' + m + '_' + i + '-tab');
                    if (elem) {
                        elem.addEventListener('onclick', () => {
                            elem.classList.add("active")
                            document.getElementById('tab-' + m + '_' + i)
                                .classList.add("active");
                        })
                        elem.addEventListener('mouseout', () => {
                            elem.classList.remove("active")

                            document.getElementById('tab-0_' + i).classList
                                .remove("active");
                        })
                    }
                })
            })
        })
    }); */

   
</script>
@push('script')
    {{-- Owl Carousel --}}
    <script src="{{ asset('public/assets/front-end') }}/js/owl.carousel.min.js"></script>
    <script>
        $('#horizontal-categories').owlCarousel({
            // loop: true,
            autoplay: false,
            stagePadding: 40,
            margin: 10,
            nav: true,
            navText: [
                "<i class='czi-arrow-{{ Session::get('direction') ===
                "
                                                                                rtl "
                    ? 'right'
                    : 'left' }}'></i>",
                "<i class='czi-arrow-{{ Session::get('direction') ===
                "
                                                                                rtl "
                    ? 'left'
                    : 'right' }}'></i>"
            ],
            dots: false,
            autoplayHoverPause: true,
            '{{ session('
                                                            direction ') }}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 2
                },
                375: {
                    items: 2
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 3
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 6
                },
                //Extra large
                1200: {
                    items: 6
                },
                //Extra extra large
                1400: {
                    items: 6
                }
            }
        })
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            //console.log('DOM fully loaded and parsed');
            $('.cat-lis > a').mouseover(function() {
                let li_tabs = document.getElementsByClassName('cat-lis');
                let tab_panes = document.getElementsByClassName('sub-cat-tab-panes');
                for (let i = 0; i < li_tabs.length; i++) {
                    const element = li_tabs[i];
                    if (element.id == 'tab-0_' + $(this)[0].dataset.sub_categoriesId + '-tab') {
                        element.classList.add('active');
                    } else {
                        element.classList.remove('active');
                    }
                }
                for (let index = 0; index < tab_panes.length; index++) {
                    const element = tab_panes[index];
                    if (element.id == 'tab-0_' + $(this)[0].dataset.sub_categoriesId) {
                        element.classList.add('active');
                    } else {
                        element.classList.remove('active');
                    }
                }

            });
        });

        function activateFirstTab(id) {
            var cats = @json(isset($categories) ? $categories : []);
            var sub_cats = @json(isset($sub_categories) ? $sub_categories : []);
            filtered_sub_cats = sub_cats.filter((sc, i) => {
                return id == sc.parent_id
            })
            let li_tabs = document.getElementsByClassName('cat-lis');
            let tab_panes = document.getElementsByClassName('sub-cat-tab-panes');
            for (let i = 0; i < li_tabs.length; i++) {
                const element = li_tabs[i];
                if (element.id == 'tab-0_' + filtered_sub_cats[0].id + '-tab') {
                    element.classList.add('active');
                } else {
                    element.classList.remove('active');
                }
            }
            for (let index = 0; index < tab_panes.length; index++) {
                const element = tab_panes[index];
                if (element.id == 'tab-0_' + filtered_sub_cats[0].id) {
                    element.classList.add('active');
                } else {
                    element.classList.remove('active');
                }
            }
        }

        function redirectToCat(id) {
            console.log(id);
        }
    </script>
    <script>
        // window.addEventListener('DOMContentLoaded', (event) => {
            
        //     if(document.getElementById('city_id'))
        //     {
        //         localStorage.getItem('city_id') ? document.getElementById('city_id').value = localStorage.getItem('city_id') : '';
        //     }
        // });
        // function applyCity()
        // {
        //     if(document.getElementById('city_id').value > 0 )
        //     {
        //         window.location.href = window.location.origin + "?city=" + document.getElementById('city_id').value
        //     }
        // }
    </script>
@endpush
