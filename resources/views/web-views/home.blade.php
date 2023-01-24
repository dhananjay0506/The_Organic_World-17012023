@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Welcome To').' '.$web_config['name']->value)

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/home.css"/>



    <style>

        .media {
            background: white;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
        }

        .cz-countdown-days {
            color: #5A3B21 !important;
            background-color: #FFCC75;
            /* border: .5px solid{{$web_config['primary_color']}}; */
            padding: 0px 6px;
            border-radius: 20px;
            margin-right: 0px !important;
            display: flex;
	        flex-direction: column;
            -ms-flex: .4;  /* IE 10 */
            flex: 1;

        }

        .cz-countdown-hours {
            color: #5A3B21 !important;
            background-color: #FFCC75;
            /* border: .5px solid{{$web_config['primary_color']}}; */
            padding: 0px 6px;
            border-radius: 20px;
            margin-right: 0px !important;
            display: flex;
	        flex-direction: column;
            -ms-flex: .4;  /* IE 10 */
            flex: 1;
        }

        .cz-countdown-minutes {
            color: #5A3B21 !important;
            background-color: #FFCC75;
            /* border: .5px solid{{$web_config['primary_color']}}; */
            padding: 0px 6px;
            border-radius: 20px;
            margin-right: 0px !important;
            display: flex;
	        flex-direction: column;
            -ms-flex: .4;  /* IE 10 */
            flex: 1;
        }

        .cz-countdown-seconds {
            color: #5A3B21 !important;
            background-color: #FFCC75;
            /* border: .5px solid{{$web_config['primary_color']}}; */
            padding: 0px 6px;
            border-radius: 20px;
            display: flex;
	        flex-direction: column;
            -ms-flex: .4;  /* IE 10 */
            flex: 1;
        }

        .flash_deal_product_details .flash-product-price {
            font-weight: 700;
            font-size: 18px;
            color: {{$web_config['primary_color']}};
        }

        .featured_deal_left {
            height: 130px;
            background: {{$web_config['primary_color']}} 0% 0% no-repeat padding-box;
            padding: 10px 13px;
            text-align: center;
        }

        .category_div:hover {
            color: {{$web_config['secondary_color']}};
        }

        .deal_of_the_day {
            /* filter: grayscale(0.5); */
            /* opacity: .8; */
            background: {{$web_config['secondary_color']}};
            border-radius: 3px;
        }

        .deal-title {
            font-size: 12px;

        }


        .for-flash-deal-img img {
            max-width: none;
        }
        .best-selleing-image {
            background:{{$web_config['primary_color']}}10;
            width:30%;
            display:flex;
            align-items:center;
            border-radius: 5px;
        }
        .best-selling-details {
            padding:10px;
            width:50%;
        }
        .top-rated-image{
            background:{{$web_config['primary_color']}}10;
            width:30%;
            display:flex;
            align-items:center;
            border-radius: 5px;
        }
        .top-rated-details {
            padding:10px;width:70%;
        }

        @media (max-width: 375px) {
            .cz-countdown {
                display: flex !important;

            }

            .cz-countdown .cz-countdown-seconds {

                margin-top: -5px !important;
            }

            .for-feature-title {
                font-size: 20px !important;
            }
        }

        @media (max-width: 600px) {
            .flash_deal_title {
                /*font-weight: 600;*/
                /*font-size: 18px;*/
                /*text-transform: uppercase;*/

                font-weight: 700;
                font-size: 25px;
                text-transform: uppercase;
            }

            .cz-countdown .cz-countdown-value {
                /* font-family: "Roboto", sans-serif; */
                font-size: 11px !important;
                font-weight: 700 !important;

            }

            .featured_deal {
                opacity: 1 !important;
            }

            .cz-countdown {
                display: inline-block;
                flex-wrap: wrap;
                font-weight: normal;
                margin-top: 4px;
                font-size: smaller;
            }

            .view-btn-div-f {

                margin-top: 6px;
                float: right;
            }

            .view-btn-div {
                float: right;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }


            .for-mobile {
                display: none;
            }

            .featured_for_mobile {
                max-width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .best-selleing-image {
                width: 50%;
                border-radius: 5px;
            }
            .best-selling-details {
                width:50%;
            }
            .top-rated-image {
                width: 50%;
            }
            .top-rated-details {
            width:50%;
        }
        }


        @media (max-width: 360px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (max-width: 375px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }

        }

        @media (min-width: 768px) {
            .displayTab {
                display: block !important;
            }

        }

        @media (max-width: 800px) {

            .latest-product-margin {
                margin-left: 0px !important;
                }
            .for-tab-view-img {
                width: 40%;
            }

            .for-tab-view-img {
                width: 105px;
            }

            .widget-title {
                font-size: 19px !important;
            }
            .flash-deal-view-all-web {
                display: none !important;
            }
            .categories-view-all {
                {{session('direction') === "rtl" ? 'margin-left: 10px;' : 'margin-right: 6px;'}}
            }
            .categories-title {
                {{Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 6px;'}}
            }
            .seller-list-title{
                {{Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 10px;'}}
            }
            .seller-list-view-all {
                {{Session::get('direction') === "rtl" ? 'margin-left: 20px;' : 'margin-right: 10px;'}}
            }
            .seller-card {
                padding-left: 0px !important;
            }
            .category-product-view-title {
                {{Session::get('direction') === "rtl" ? 'margin-right: 16px;' : 'margin-left: -8px;'}}
            }
            .category-product-view-all {
                {{Session::get('direction') === "rtl" ? 'margin-left: -7px;' : 'margin-right: 5px;'}}
            }
            .recomanded-product-card {
                background: #F8FBFD;margin:20px;height: 535px; border-radius: 5px;
            }
            .recomanded-buy-button {
                text-align: center;
                margin-top: 30px;
            }
        }
        @media(min-width:801px){
            .flash-deal-view-all-mobile{
                display: none !important;
            }
            .categories-view-all {
                {{session('direction') === "rtl" ? 'margin-left: 30px;' : 'margin-right: 27px;'}}
            }
            .categories-title {
                {{Session::get('direction') === "rtl" ? 'margin-right: 25px;' : 'margin-left: 25px;'}}
            }
            .seller-list-title{
                {{Session::get('direction') === "rtl" ? 'margin-right: 6px;' : 'margin-left: 10px;'}}
            }
            .seller-list-view-all {
                {{Session::get('direction') === "rtl" ? 'margin-left: 12px;' : 'margin-right: 10px;'}}
            }
            .seller-card {
                {{Session::get('direction') === "rtl" ? 'padding-left:0px !important;' : 'padding-right:0px !important;'}}
            }
            .category-product-view-title {
                {{Session::get('direction') === "rtl" ? 'margin-right: 10px;' : 'margin-left: -12px;'}}
            }
            .category-product-view-all {
                {{Session::get('direction') === "rtl" ? 'margin-left: -20px;' : 'margin-right: 0px;'}}
            }
            .recomanded-product-card {
                background: #F8FBFD;margin:20px;height: 475px; border-radius: 5px;
            }
            .recomanded-buy-button {
                text-align: center;
                margin-top: 63px;
            }

        }

        .featured_deal_carosel .carousel-inner {
            width: 100% !important;
        }

        .badge-style2 {
            color: black !important;
            background: transparent !important;
            font-size: 11px;
        }
        .countdown-card{
            background:{{$web_config['primary_color']}}10;
            height: 150px!important;
            /* border-radius:5px; */

        }
        .flash-deal-text{
        font-family: 'BoldenVan';
        font-style: normal;
        font-weight: 400;
        font-size: 45px;
        line-height: 58px;
        color: white;
        }
        .countdown-background{
            /* background: {{$web_config['primary_color']}}; */
            padding: 5px 5px;
            border-radius:5px;
            margin-top:15px;
        }
        .carousel-wrap{
            position: relative;
        }
        .owl-nav{
            top: 40%;
            position: absolute;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

     .owl-prev{
         float: left;

     }
     .owl-next{
         float: right;
     }
     .czi-arrow-left{
        color: {{$web_config['primary_color']}};
        background: {{$web_config['primary_color']}}10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -12px;
        font-weight: bold;
        font-size: 12px;
     }

     .fa-caret-left{
        color: {{$web_config['primary_color']}};
        /* background: {{$web_config['primary_color']}}10; */
        padding: 5px;
        border-radius: 50%;
        margin-left: -12px;
        font-weight: bold;
        font-size: 12px;
     }
     .czi-arrow-right{
        color: {{$web_config['primary_color']}};
        background: {{$web_config['primary_color']}}10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 12px;
     }

     .fa-caret-right{
        color: {{$web_config['primary_color']}};
        /* background: {{$web_config['primary_color']}}10; */
        padding: 5px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 25px;
     }

    .web-feature-deal-slider .fa-caret-right{
        /* color: {{$web_config['primary_color']}}; */
        color: #FAF7EE;
        /* background: {{$web_config['primary_color']}}10; */
        padding: 5px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 25px;
     }
    .owl-carousel .nav-btn .czi-arrow-left{
      height: 47px;
      position: absolute;
      width: 26px;
      cursor: pointer;
      top: 100px !important;
  }
  .owl-carousel .nav-btn .fa-caret-left{
      height: 47px;
      position: absolute;
      width: 26px;
      cursor: pointer;
      top: 100px !important;
  }
  .flash-deals-background-image{
    background: {{$web_config['primary_color']}}10;
    border-radius:5px;
    width:125px;
    height:125px;
  }
  .view-all-text{
    color:{{$web_config['secondary_color']}} !important;
    font-size:14px;
  }
  .feature-product-title {
    text-align: center;
    font-size: 22px;
    margin-top: 15px;
    font-style: normal;
    font-weight: 700;
  }
  .feature-product .czi-arrow-left{
        color: {{$web_config['primary_color']}};
        background: {{$web_config['primary_color']}}10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -80px;
        font-weight: bold;
        font-size: 12px;
     }

     .feature-product .fa-caret-left{
        /* color: {{$web_config['primary_color']}}; */
        color: #ABABAB;
        /* background: {{$web_config['primary_color']}}10; */
        padding: 5px;
        border-radius: 50%;
        margin-left: -80px;
        font-weight: bold;
        font-size: 25px;
     }

     .feature-product .owl-nav{
        top: 40%;
        position: absolute;
        display: flex;
        justify-content: space-between;
        /* width: 100%; */
        z-index: -999;
    }
     .feature-product .czi-arrow-right{
        color: {{$web_config['primary_color']}};
        background: {{$web_config['primary_color']}}10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -80px;
        font-weight: bold;
        font-size: 12px;
     }

     .feature-product .fa-caret-right{
        /* color: {{$web_config['primary_color']}}; */
        color: #ABABAB;
        /* background: {{$web_config['primary_color']}}10; */
        padding: 5px;
        border-radius: 50%;
        margin-right: -80px;
        font-weight: bold;
        font-size: 25px;
     }
     .shipping-policy-web{
        background: #ffffff;width:100%; border-radius:5px;
     }
     .shipping-method-system{
        height: 130px;width: 70%;margin-top: 15px;
     }

     .flex-between {
         display: flex;
         justify-content: space-between;
     }
     .new_arrival_product .czi-arrow-left{
         margin-left: -28px;
     }
     .new_arrival_product .fa-caret-left{
         margin-left: -28px;
     }
     .new_arrival_product .owl-nav{
         z-index: -999;
     }
     .media {
        background: white;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
    }

    .cz-countdown-days {
        color: #5A3B21 !important;
        background-color: #FFCC75;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 20px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;

    }

    .cz-countdown-hours {
        color: #5A3B21 !important;
        background-color: #FFCC75;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 20px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .cz-countdown-minutes {
        color: #5A3B21 !important;
        background-color: #FFCC75;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 20px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .cz-countdown-seconds {
        color: #5A3B21 !important;
        background-color: #FFCC75;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .flash_deal_product_details .flash-product-price {
        font-weight: 700;
        font-size: 18px;

        color: {
                {
                $web_config['primary_color']
            }
        }

        ;
    }

    .featured_deal_left {
        height: 130px;

        background: {
                {
                $web_config['primary_color']
            }
        }

        0% 0% no-repeat padding-box;
        padding: 10px 13px;
        text-align: center;
    }

    .category_div:hover {
        color: {
                {
                $web_config['secondary_color']
            }
        }

        ;
    }

    .deal_of_the_day {

        /* filter: grayscale(0.5); */
        /* opacity: .8; */
        background: {
                {
                $web_config['secondary_color']
            }
        }

        ;
        border-radius: 3px;
    }

    .deal-title {
        font-size: 12px;

    }

    .for-flash-deal-img img {
        max-width: none;
    }

    .best-selleing-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        width:30%;
        display:flex;
        align-items:center;
        border-radius: 5px;
    }

    .best-selling-details {
        padding: 10px;
        width: 50%;
    }

    .top-rated-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        width:30%;
        display:flex;
        align-items:center;
        border-radius: 5px;
    }

    .top-rated-details {
        padding: 10px;
        width: 70%;
    }

    @media (max-width: 375px) {
        .cz-countdown {
            display: flex !important;

        }

        .cz-countdown .cz-countdown-seconds {

            margin-top: -5px !important;
        }

        .for-feature-title {
            font-size: 20px !important;
        }
    }

    @media (max-width: 600px) {
        .flash_deal_title {
            /*font-weight: 600;*/
            /*font-size: 18px;*/
            /*text-transform: uppercase;*/

            font-weight: 700;
            font-size: 25px;
            text-transform: uppercase;
        }

        .cz-countdown .cz-countdown-value {
            /* font-family: "Roboto", sans-serif; */
            font-size: 30px !important;
            font-weight: 500 !important;

        }

        .featured_deal {
            opacity: 1 !important;
        }

        .cz-countdown {
            display: inline-block;
            flex-wrap: wrap;
            font-weight: normal;
            margin-top: 4px;
            font-size: smaller;
        }

        .view-btn-div-f {

            margin-top: 6px;
            float: right;
        }

        .view-btn-div {
            float: right;
        }

        .viw-btn-a {
            font-size: 10px;
            font-weight: 600;
        }


        .for-mobile {
            display: none;
        }

        .featured_for_mobile {
            max-width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .best-selleing-image {
            width: 50%;
            border-radius: 5px;
        }

        .best-selling-details {
            width: 50%;
        }

        .top-rated-image {
            width: 50%;
        }

        .top-rated-details {
            width: 50%;
        }
    }


    @media (max-width: 360px) {
        .featured_for_mobile {
            max-width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .featured_deal {
            opacity: 1 !important;
        }
    }

    @media (max-width: 375px) {
        .featured_for_mobile {
            max-width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .featured_deal {
            opacity: 1 !important;
        }

    }

    @media (min-width: 768px) {
        .displayTab {
            display: block !important;
        }

    }

    @media (max-width: 800px) {

        .latest-product-margin {
            margin-left: 0px !important;
        }

        .for-tab-view-img {
            width: 40%;
        }

        .for-tab-view-img {
            width: 105px;
        }

        .widget-title {
            font-size: 19px !important;
        }

        .flash-deal-view-all-web {
            display: none !important;
        }

        .categories-view-all {
                {
                    {
                    session('direction')==="rtl"? 'margin-left: 10px;': 'margin-right: 6px;'
                }
            }
        }

        .categories-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 0px;': 'margin-left: 6px;'
                }
            }
        }

        .seller-list-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 0px;': 'margin-left: 10px;'
                }
            }
        }

        .seller-list-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: 20px;': 'margin-right: 10px;'
                }
            }
        }

        .seller-card {
            padding-left: 0px !important;
        }

        .category-product-view-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 16px;': 'margin-left: -8px;'
                }
            }
        }

        .category-product-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: -7px;': 'margin-right: 5px;'
                }
            }
        }

        .recomanded-product-card {
            background: #F8FBFD;
            margin: 20px;
            height: 535px;
            border-radius: 5px;
        }

        .recomanded-buy-button {
            text-align: center;
            margin-top: 30px;
        }
    }

    @media(min-width:801px) {
        .flash-deal-view-all-mobile {
            display: none !important;
        }

        .categories-view-all {
                {
                    {
                    session('direction')==="rtl"? 'margin-left: 30px;': 'margin-right: 27px;'
                }
            }
        }

        .categories-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 25px;': 'margin-left: 25px;'
                }
            }
        }

        .seller-list-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 6px;': 'margin-left: 10px;'
                }
            }
        }

        .seller-list-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: 12px;': 'margin-right: 10px;'
                }
            }
        }

        .seller-card {
                {
                    {
                    Session: :get('direction')==="rtl"? 'padding-left:0px !important;': 'padding-right:0px !important;'
                }
            }
        }

        .category-product-view-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 10px;': 'margin-left: -12px;'
                }
            }
        }

        .category-product-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: -20px;': 'margin-right: 0px;'
                }
            }
        }

        .recomanded-product-card {
            background: #F8FBFD;
            margin: 20px;
            height: 475px;
            border-radius: 5px;
        }

        .recomanded-buy-button {
            text-align: center;
            margin-top: 63px;
        }

    }

    .featured_deal_carosel .carousel-inner {
        width: 100% !important;
    }

    .badge-style2 {
        color: black !important;
        background: transparent !important;
        font-size: 11px;
    }

    .countdown-card {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        height: 150px !important;
        border-radius:20px;

    }

    .flash-deal-text {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;
        text-transform: uppercase;
        text-align:center;
        font-weight:500;
        font-size:30px;
        border-radius:5px;
        margin-top:25px;
    }

    .countdown-background {
        background: {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 5px 5px;
        border-radius:5px;
        margin-top:15px;
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
    }

    .owl-prev {
        float: left;

    }

    .owl-next {
        float: right;
    }

    .btn-tr-bl-radius {
        top: 75%;
        left: 10%;
        border-top-left-radius: 2px !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 2px !important;
        border-bottom-left-radius: 8px !important;
    }

    .czi-arrow-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -12px;
        font-weight: bold;
        font-size: 12px;
    }
    .fa-caret-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        /* background: {
                {
                $web_config['primary_color']
            }
        } */

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -12px;
        font-weight: bold;
        font-size: 12px;
    }
    .czi-arrow-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 12px;
    }

    .fa-caret-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 1px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 20px;
    }

    .owl-carousel .nav-btn .czi-arrow-left {
        height: 47px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }

    .owl-carousel .nav-btn .fa-caret-left {
        height: 47px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }

    .flash-deals-background-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        border-radius:5px;
        width:125px;
        height:125px;
    }

    .view-all-text {
        color: {
                {
                $web_config['secondary_color']
            }
        }

         !important;
        font-size:14px;
    }

    .feature-product-title {
        text-align: center;
        font-size: 22px;
        margin-top: 15px;
        font-style: normal;
        font-weight: 500;
    }

    .feature-product .czi-arrow-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -80px;
        font-weight: bold;
        font-size: 12px;
    }

    .feature-product .fa-caret-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        /* background: {
                {
                $web_config['primary_color']
            }
        } */

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -80px;
        font-weight: bold;
        font-size: 25px;
    }

    .feature-product .owl-nav {
        top: 40%;
        position: absolute;
        display: flex;
        justify-content: space-between;
        /* width: 100%; */
    }

    .feature-product .czi-arrow-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -80px;
        font-weight: bold;
        font-size: 12px;
    }

    .feature-product .fa-caret-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -80px;
        font-weight: bold;
        font-size: 25px;
    }

    .shipping-policy-web {
        background: #ffffff;
        width: 100%;
        border-radius: 5px;
    }

    .shipping-method-system {
        height: 130px;
        width: 70%;
        margin-top: 15px;
    }

    .flex-between {
        display: flex;
        justify-content: space-between;
    }
    .bg-gray-light {
    background: #f7f7f8;
}
.border_product-single-hover
    {
    background: #FFFFFF;
    border: 1px solid #ABABAB;
    border-radius: 20px;
    }

    .features-wrap-one {
    background-color: #f8f6ef;
    padding: 10px 60px 10px;
    /* margin-top: -80px; */
    position: relative;
    z-index: 2;
}
.custom_img {
    text-align: -webkit-center;
}
.fadeInUp {
    -webkit-animation-name: 'fadeInUp';
    animation-name: 'fadeInUp';
}
.service-box {
    /* padding: 15px 30px 11px; */
    border-radius: 7px;
    border-bottom: 3px solid transparent;
    -webkit-transition: all 0.3s ease-out 0s;
    transition: all 0.3s ease-out 0s;
}
/* .mb-70 {
    margin-bottom: 70px;
} */
.pb-125 {
    padding-bottom: 125px;
}
.pt-130 {
    padding-top: 130px;
}
.p-r {
    position: relative;
}
.z-1 {
    z-index: 1;
}
.service-box .text h3.title {
    font-size: 14px;
    color: #fff;
    line-height: 23px;
}
.service-box .icon {
    font-size: 60px;
    line-height: 1;
    color: #eece38;
    margin-bottom: 10px;
}
.service-box{
    height: 89%;
}
/* .mb-60 {
    margin-bottom: 60px;
} */
.carousel-indicators li {
  width: 10px !important;
  height: 10px !important;
  border-radius: 100% !important;
}
    </style>

    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.theme.default.min.css"/>
    <script>

</script>
@endpush

@section('content')

@php($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings'))
    <!-- Hero (Banners + Slider)-->
    <section class="bg-transparent mb-3">
        {{-- <div class="container">
            <div class="row ">
                <div class="col-12"> --}}
                    @include('web-views.partials._home-top-slider')
                {{-- </div>
            </div>
        </div> --}}
    </section>

    {{--flash deal--}}
    @php($flash_deals=\App\Model\FlashDeal::with(['products'=>function($query){
                $query->with('product')->whereHas('product',function($q){
                    $q->active();
                })
                ->whereHas('product.shop_pincode',function($q){
                    $q->where('pincode',session()->get('pincode'));
                })
                // ->with(['product.shop_pincode' => function($p){
                //     $p->where('pincode' , session()->get('pincode'));
                // }])
                ;
            }])
            ->where(['status'=>1])
            ->where(['deal_type'=>'flash_deal'])
            ->whereDate('start_date','<=',date('Y-m-d'))
            ->whereDate('end_date','>=',date('Y-m-d'))
            ->first())
            {{-- @php($flash_deals=DB::table("flash_deals")
            ->select('flash_deals.*','flash_deal_products.flash_deal_id','flash_deal_products.product_id','products.shop_id','shop_pincodes.pincode')
            ->leftJoin("flash_deal_products", 'flash_deals.id', '=', 'flash_deal_products.flash_deal_id')
            ->leftJoin("products", 'flash_deal_products.product_id', '=', 'products.id')
            ->leftJoin("shop_pincodes", 'products.shop_id', '=', 'shop_pincodes.shop_id')

            ->where('shop_pincodes.pincode',416001)
            ->where('flash_deals.deal_type', '=', 'flash_deal')
            ->get()
            ) --}}


    @if (isset($flash_deals))
    <div class="container">
        <div class="flash-deal-view-all-web row d-flex justify-content-{{Session::get('direction') === "rtl" ? 'start' : 'end'}}" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
            @if (count($flash_deals->products)>0)
                <a class="text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            @endif
        </div>
        <div class="row d-flex {{Session::get('direction') === "rtl" ? 'flex-row-reverse' : 'flex-row'}}">
            <div class="col-md-12 mt-2 countdown-card bg-custome-warming" >
                <div class="m-2">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="flash-deal-text">
                                <span>{{ \App\CPU\translate('flash deal')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-10">

                            <div style=" text-align: center;color: #ffffff !important;">
                                <div class="countdown-background">
                                    <span class="cz-countdown d-flex justify-content-center align-items-center"
                                        data-countdown="{{isset($flash_deals)?date('m/d/Y',strtotime($flash_deals['end_date'])):''}} 11:59:00 PM">
                                        <span class="cz-countdown-days p-4 border-none d-flex justify-content-center align-items-center">
                                            <div class="row">
                                            <div class="cz-countdown-value col font_boldevan"></div>
                                            <div class="col mt-auto">{{ \App\CPU\translate('days')}}</div></div>
                                        </span>
                                        <span class="cz-countdown-value p-1 text-dark">:</span>
                                        <span class="cz-countdown-hours p-4 border-none d-flex justify-content-center align-items-center">
                                            <div class="row">
                                            <span class="cz-countdown-value col font_boldevan"></span>
                                            <span class="col mt-auto">{{ \App\CPU\translate('hrs')}}</span></div>
                                        </span>
                                        <span class="cz-countdown-value p-1 text-dark">:</span>
                                        <span class="cz-countdown-minutes p-4 border-none d-flex justify-content-center align-items-center">
                                            <div class="row">
                                            <span class="cz-countdown-value col font_boldevan"></span>
                                            <span class="col mt-auto">{{ \App\CPU\translate('min')}}</span></div>
                                        </span>
                                        <span class="cz-countdown-value p-1 text-dark">:</span>
                                        <span class="cz-countdown-seconds p-4 border-none d-flex justify-content-center align-items-center">
                                            <div class="row">
                                            <span class="cz-countdown-value col font_boldevan"></span>
                                            <span class="col mt-auto">{{ \App\CPU\translate('sec')}}</span></div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flash-deal-view-all-mobile col-md-12" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
                <a class="{{Session::get('direction') === "rtl" ? 'float-left' : 'float-right'}} mt-2 text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
            {{-- <div class="col-md-9 {{Session::get('direction') === "rtl" ? 'pr-md-4' : 'pl-md-4'}}">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme mt-2" id="flash-deal-slider">
                        @foreach($flash_deals->products as $key=>$deal)
                            @if( $deal->product)
                                @include('web-views.partials._product-card-1',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings])
                            @endif
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    @endif
    <section>
        <div class="container">
            <div class="col-lg-10 col-sm-10 offset-lg-1 offset-sm-1 p-2 d-none d-lg-block d-md-block" style="background-color:#f7f7f8; border-radius:10px;">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Better Choices</b></label>
                        <p style="font-size: 12px; color:grey;">Only Greate Products</p>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Freshly Harvested</b></label>
                        <p style="font-size: 12px; color:grey;">Delivered Daily</p>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Better Life</b></label>
                        <p style="font-size: 12px; color:grey;">Clean,Healthy,Wholeseome</p>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Holi Hai</b></label>
                        <p style="font-size: 12px; color:grey;">Celebrate Mindfully</p>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Stay Cool</b></label>
                        <p style="font-size: 12px; color:grey;">Traditional Crafts</p>
                    </div>
                    <div class="col-lg-2 col-sm-2 text-center">
                        <label style="font-size: 14px;"><b>Fresh Fruits</b></label>
                        <p style="font-size: 12px; color:grey;">Organic Watermelons</p>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>


    <div class="container mb-4">
        <div class="row" style="background: white;border-radius: 20px;">

            <div class="col-md-12">
                <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                    <div class="carousel-wrap p-2">
                        <div class="owl-carousel owl-theme " id="First_Slider">
                            <div class="card bg-gray-light">
                                <div class="service-box text-center wow fadeInUp bg-gray-light p-3">
                                    <div class="row mt-md-3 justify-content-center">
                                            <div class="text">
                                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Just_For_You')}}</h6>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Login_for_the_customized_experience')}}</b></p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-primary btn-sm string-limit"type="button" style="">{{ \App\CPU\translate('Log_In')}}</button>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Buy 1 Get 1 2.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Big sale 2.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__50.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Mega sale 2.png')}}">
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Mega sale 2.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Buy 1 Get 1 2.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Big sale 2.png')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-3 p-2">
                                            <div class="service-box text-center wow fadeInUp bg-gray-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__50.png')}}">
                                            </div>
                                        </div>

                                    </div><br>
                                    <div class="row">
                                        <button class="btn btn-sm string-limit"type="button" style="border-radius: 0px 5px 0px 5px; width:100%; border-color:red; background-color:#fff9e6; color:#ff8000"><i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ \App\CPU\translate('  _Express_Shopping')}}  </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 card bg-gray-light">
                                    <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                                        <div class="row mt-md-3 justify-content-center">
                                            <div class="text">
                                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Farm_Fresh')}}</h6>
                                                <p style="font-size: 12px; color:grey;">{{ \App\CPU\translate('Freshly_sourced_for_you')}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Letest_fresh_products')}}</b></p>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-3" style="height:80px">
                                                <div class="service-box text-center wow fadeInUp bg-light">
                                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5073.png')}}">
                                                </div>
                                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Fruits')}}</p>
                                            </div>
                                            <div class="col-lg-3 col-3" style="height:80px">
                                                <div class="service-box text-center wow fadeInUp bg-light">
                                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5072.png')}}">
                                                </div>
                                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Vegitable')}}</p>
                                            </div>
                                            <div class="col-lg-3 col-3" style="height:80px">
                                                <div class="service-box text-center wow fadeInUp bg-light">
                                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5071.png')}}">
                                                </div>
                                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Exotics')}}</p>
                                            </div>
                                            <div class="col-lg-3 col-3" style="height:80px">
                                                <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Fresh Dairy 1.png')}}">
                                                </div>
                                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Dairy')}}</p>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="mt-mb-3 card bg-gray-light">
                                    <div class="service-box wow fadeInUp p-3" style="background-color: #f7f7f8;">
                                        <div class="row">
                                            <div class="col-lg-8 col-8">
                                                <p style="font-size: 14px; align:right; font-weight:bold">{{ \App\CPU\translate('Delivered_from_the_farms_to_your_building_community')}}</p>
                                            </div>
                                            <div class="col-lg-4 col-4">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/community_deliver.png')}}">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%;">{{ \App\CPU\translate('Sing_Up_For_Community_Delivery')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-gray-light">
                                <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                                    <div class="row mt-md-3 justify-content-center">
                                            <div class="text">
                                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Daily_Delivery')}}</h6>
                                                <p style="font-size: 12px; color:grey;">{{ \App\CPU\translate('Healthy_products_delivered_daily')}}</p>
                                            </div>
                                    </div>
                                    <div>
                                        <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Top_subscribed_products')}}</b></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-3 " style="height:80px">
                                            <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__MIlk 1.png')}}">
                                            </div>
                                            <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Milk')}}</p>
                                        </div>
                                        <div class="col-lg-3 col-3" style="height:80px">
                                            <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Bread 1.png')}}">
                                            </div>
                                            <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Bread')}}</p>
                                        </div>
                                        <div class="col-lg-3 col-3" style="height:80px">
                                            <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Egg 1.png')}}">
                                            </div>
                                            <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Eggs')}}</p>
                                        </div>
                                        <div class="col-lg-3 col-3" style="height:80px">
                                            <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Curd 2.png')}}">
                                            </div>
                                            <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Curd')}}</p>
                                        </div>
                                    </div><br><br>
                                    <div class="row">
                                        <div class="col-lg-8 col-8">
                                            <p style="font-size: 14px; text-align:left !important;font-weight:bold">{{ \App\CPU\translate('Subscribe_for_daily_delights')}}</p>
                                        </div>
                                        <div class="col-lg-4 col-4">
                                            <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Daily Delivery copy 1.png')}}">
                                        </div>
                                    </div><br>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-primary btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%;">{{ \App\CPU\translate('Click_To_Subscribe')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-gray-light">
                                <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                                    <div class="row mt-md-3 justify-content-center">
                                        <div class="text">
                                            <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('What_makes_us_the_best_choice_for_you')}}</h6>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-2">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Better Choice-02 1.png')}}">
                                    </div>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%; color:{{ $web_config['primary_color'] }}"><b>{{ \App\CPU\translate('Know_More')}}</b></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-gray-light">
                                <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                                    <div class="row mt-md-3 justify-content-center">
                                        <div class="text">
                                            <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('What_makes_us_the_best_choice_for_you')}}</h6>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-2">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Better Choice-02 1.png')}}">
                                    </div>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%; color:{{ $web_config['primary_color'] }}"><b>{{ \App\CPU\translate('Know_More')}}</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    {{-- <section>
        <div class="rtl">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="service-box text-center wow fadeInUp bg-gray-light p-3">
                        <div class="row mt-md-3 justify-content-center">
                                <div class="text">
                                    <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Just_For_You')}}</h6>
                                    <br>
                                </div>
                        </div>
                        <div class="row">
                            <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Login_for_the_customized_experience')}}</b></p>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary btn-sm string-limit"type="button" style="">{{ \App\CPU\translate('Log_In')}}</button>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Buy 1 Get 1 2.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Big sale 2.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__50.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Mega sale 2.png')}}">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Mega sale 2.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Buy 1 Get 1 2.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__Big sale 2.png')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-3 p-2">
                                <div class="service-box text-center wow fadeInUp bg-gray-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Offer__50.png')}}">
                                </div>
                            </div>

                        </div><br>
                        <div class="row">
                            <button class="btn btn-sm string-limit"type="button" style="border-radius: 0px 5px 0px 5px; width:100%; border-color:red; background-color:#fff9e6; color:#ff8000"><i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ \App\CPU\translate('  _Express_Shopping')}}  </button>
                        </div>
                    </div><br><br>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="mb-3">
                        <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                            <div class="row mt-md-3 justify-content-center">
                                <div class="text">
                                    <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Farm_Fresh')}}</h6>
                                    <p style="font-size: 12px; color:grey;">{{ \App\CPU\translate('Freshly_sourced_for_you')}}</p>
                                </div>
                            </div>
                            <div>
                                <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Letest_fresh_products')}}</b></p>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-3" style="height:80px">
                                    <div class="service-box text-center wow fadeInUp bg-light">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5073.png')}}">
                                    </div>
                                    <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Fruits')}}</p>
                                </div>
                                <div class="col-lg-3 col-3" style="height:80px">
                                    <div class="service-box text-center wow fadeInUp bg-light">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5072.png')}}">
                                    </div>
                                    <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Vegitables')}}</p>
                                </div>
                                <div class="col-lg-3 col-3" style="height:80px">
                                    <div class="service-box text-center wow fadeInUp bg-light">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Group 5071.png')}}">
                                    </div>
                                    <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Exotics')}}</p>
                                </div>
                                <div class="col-lg-3 col-3" style="height:80px">
                                    <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Fresh Dairy 1.png')}}">
                                    </div>
                                    <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Dairy')}}</p>
                                </div>
                            </div><br><br>
                        </div>
                    </div>

                    <div class="mt-mb-3">
                        <div class="service-box wow fadeInUp p-3" style="background-color: #f7f7f8;">
                            <div class="row">
                                <div class="col-lg-8 col-8">
                                    <p style="font-size: 14px; align:right; font-weight:bold">{{ \App\CPU\translate('Delivered_from_the_farms_to_your_building_community')}}</p>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/community_deliver.png')}}">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%;">{{ \App\CPU\translate('Sing_Up_For_Community_Delivery')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mt-3 m-md-0">
                    <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                        <div class="row mt-md-3 justify-content-center">
                                <div class="text">
                                    <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Daily_Delivery')}}</h6>
                                    <p style="font-size: 12px; color:grey;">{{ \App\CPU\translate('Healthy_products_delivered_daily')}}</p>
                                </div>
                        </div>
                        <div>
                            <p style="font-size: 12px; color:grey;"><b>{{ \App\CPU\translate('Top_subscribed_products')}}</b></p>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-3 " style="height:80px">
                                <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__MIlk 1.png')}}">
                                </div>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Milk')}}</p>
                            </div>
                            <div class="col-lg-3 col-3" style="height:80px">
                                <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Bread 1.png')}}">
                                </div>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Bread')}}</p>
                            </div>
                            <div class="col-lg-3 col-3" style="height:80px">
                                <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Egg 1.png')}}">
                                </div>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Eggs')}}</p>
                            </div>
                            <div class="col-lg-3 col-3" style="height:80px">
                                <div class="service-box text-center wow fadeInUp p-3 bg-light">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Curd 2.png')}}">
                                </div>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Fresh_Curd')}}</p>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-lg-8 col-8">
                                <p style="font-size: 14px; text-align:left !important;font-weight:bold">{{ \App\CPU\translate('Subscribe_for_daily_delights')}}</p>
                            </div>
                            <div class="col-lg-4 col-4">
                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/__Daily Delivery copy 1.png')}}">
                            </div>
                        </div><br>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%;">{{ \App\CPU\translate('Click_To_Subscribe')}}</button>
                        </div><br><br>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                        <div class="row mt-md-3 justify-content-center">
                            <div class="text">
                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('What_makes_us_the_best_choice_for_you')}}</h6>
                            </div>
                        </div>
                        <div class="mt-5 mb-2">
                            <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Better Choice-02 1.png')}}">
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%; color:{{ $web_config['primary_color'] }}"><b>{{ \App\CPU\translate('Know_More')}}</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="service-box text-center wow fadeInUp p-3" style="background-color: #f7f7f8;">
                        <div class="row mt-md-3 justify-content-center">
                            <div class="text">
                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('What_makes_us_the_best_choice_for_you')}}</h6>
                            </div>
                        </div>
                        <div class="mt-5 mb-2">
                            <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/Better Choice-02 1.png')}}">
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-sm string-limit"type="button" style="border-radius: 5px 0px 5px 0px; width:100%; color:{{ $web_config['primary_color'] }}"><b>{{ \App\CPU\translate('Know_More')}}</b></button>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </section> --}}

{{-- Make The Most Of March --}}
    <div class="container mb-4">
        <div class="row" style="background: white;border-radius: 20px;">
            <div class="col-md-12" >
                <div class="feature-product-title">
                    <h2 style="font-size: 30px; font-weight:800;">{{ \App\CPU\translate('Make_The_Most_of_March')}}</h2>
                    <p>{{ \App\CPU\translate('Curated_offers,_specially_for_you')}}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                    <div class="carousel-wrap p-2">
                        <div class="owl-carousel owl-theme " id="Make_The_Most_of_March">
                            @foreach(\App\Model\Banner::where('banner_type','Most Of March')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                            <div class="card bg-gray-light">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                </a>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
{{-- Big_Savers_This_Month --}}
     <div class="container mb-4">
        <div class="row" style="background: white;border-radius: 20px;">
            <div class="col-md-12" >
                <div class="feature-product-title">
                    <h2 style="font-size: 30px; font-weight:800;">{{ \App\CPU\translate('Big_Savers_This_Month')}}</h2>
                    <p>{{ \App\CPU\translate('Buy_more,_save_more')}}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                    <div class="carousel-wrap p-2">
                        <div class="owl-carousel owl-theme " id="Big_Savers_This_Month">
                            @foreach(\App\Model\Banner::where('banner_type','Big Savers This Month')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                                <div class="card bg-gray-light">
                                    <a href="{{$banner->url}}" style="cursor: pointer;">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                    </a>
                                    <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>


{{-- video --}}
    <section>
        <div class="container rtl my-5">
            <video width=100% height="240" controls="controls autoplay">
                <source src="https://www.youtube.com/watch?v=E6uzb7rdkeo" type="video/mp4" codecs="h.264"/>
            </video>
        </div>
    </section>
{{-- /video --}}

{{-- changing the way you live --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="text-center" style="font-weight: bold">{{ \App\CPU\translate('Changing_The_Way_You_Live._One_Choice_At_A_Time')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Click_below_to_get_a_glimpse_into_how_The_Organic_World_is_crafting_that_better_path')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-2">
                    <div class="owl-carousel owl-theme " id="Changing_The_Way">
                        <div class="card">
                            <div class="card-img-overlay card-inverse">
                                <h5 class="text-stroke text-white text-center pb-0" style="color:#cc9900 ! important;">
                                    {{ \App\CPU\translate('Ethically_sourced')}}
                                </h5>
                            </div>
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4863879.png')}}">
                        </div>

                        <div class="card">
                            <div class="card-img-overlay card-inverse">
                                <h5 class="text-stroke text-white text-center pb-0" style="color:#248f24 ! important;">
                                    {{ \App\CPU\translate('Ethically_sourced')}}
                                </h5>
                            </div>
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4863879.png')}}">
                        </div>

                        <div class="card">
                            <div class="card-img-overlay card-inverse">
                                <h5 class="text-stroke text-white text-center pb-0" style="color:#e6005c ! important;">
                                {{ \App\CPU\translate('Our_Partners_Share_Our_Vision')}}
                                </h5>
                            </div>
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Ethically sourced copy 1.png')}}">
                        </div>

                        <div class="card">
                            <div class="card-img-overlay card-inverse">
                                <h5 class="text-stroke text-white text-center pb-0" style="color:#248f24 ! important;">
                                {{ \App\CPU\translate('Shapping_A_Healthier_Future')}}
                                </h5>
                            </div>
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5289.png')}}">
                        </div>

                        <div class="card">
                            <div class="card-img-overlay card-inverse">
                                <h5 class="text-stroke text-white text-center pb-0" style="color:#732626 ! important;">
                                {{ \App\CPU\translate('Transperancy_at_our_core')}}
                                </h5>
                            </div>
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Ethically sourced copy 1.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Fruits & Vegitables --}}

    <div class="container mb-4">
       <div class="row" style="background: white;border-radius: 20px;">
           <div class="col-md-12" >
               <div class="feature-product-title">
                    <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('The_Fresh_Fruits_&_Vegitables')}}</h2>
                    <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Pesticide_free,_grown_naturally')}}</p>
               </div>
           </div>
           <div class="col-md-12">
               <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                   <div class="carousel-wrap p-1">
                       <div class="owl-carousel owl-theme " id="fruits_vegitables">
                            @foreach(\App\Model\Banner::where('banner_type','Fruits & Vegitables')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                                <div class="card bg-gray-light" style="height:230px">
                                    <a href="{{$banner->url}}" style="cursor: pointer;">
                                        <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                    </a>
                                    <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                                </div>
                            @endforeach
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
{{-- /Fruits & Vegitables --}}

{{-- dal atta --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Atta,_Dals,_Rice,_Oils_&_More')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('No_chemicals,_only_great_taste_and_flavour')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="dal_atta">
                        @foreach(\App\Model\Banner::where('banner_type','Atta, Dal, Rice, Oils')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                            <div class="card bg-gray-light" style="height:250px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                </a>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /dal atta --}}

{{-- order now --}}

<div class="container mb-4">
    <div class="row">
        <div class="col-md-6" style="background: rgb(240, 218, 218);border-radius: 5px;">
            <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Order_Now')}}</a>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 p-2">
                    <div style="background: rgb(240, 218, 218);border-radius: 5px;">
                        <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Order_Now')}}</a>
                    </div>
                </div>
                <div class="col-md-4 p-2">
                    <div style="background: rgb(240, 218, 218);border-radius: 5px;">
                        <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Order_Now')}}</a>
                    </div>
                </div>
                <div class="col-md-4 p-2">
                    <div style="background: rgb(240, 218, 218);border-radius: 5px;">
                        <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Order_Now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

{{-- order now --}}

{{-- Categorized product --}}
@foreach($home_categories as $category)
<section class="container rtl mb-3">
    <!-- Heading-->
    <div style="background: #ffffff; padding:20px;border-radius:5px;">
        <div class="flex-around pl-4">
            <div class="category-product-view-title " >
                <span class="for-feature-title d-none {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}}"
                        style="font-weight: 500;font-size: 20px;{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                        {{Str::limit($category['name'],30)}}
                </span>
            </div>
            <div class="category-product-view-title ml-lg-5" >
                <span class="for-feature-title {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}}"
                        style="font-weight: 500;font-size: 20px;{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                        {{Str::limit($category['name'],30)}}
                </span>
            </div>
            <div class="category-product-view-all" >
                <a class="text-capitalize view-all-text"
                    href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
        </div>

        <div class="row mt-2 mb-3 d-flex justify-content-center">

             <div class="col-md-9 col-12">
                <div class="row d-flex" >
                    @foreach($category['products'] as $key=>$product)

                        @if ($key<4)
                            <div class="col-md-3 col-sm-12 mt-2 mt-md-0" style="">
                                @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                            </div>
                        @endif
                @endforeach
                 </div>
            </div>


        </div>
    </div>
</section>
@endforeach
{{-- Categorized product --}}

{{-- Dairy, Bakery & Eggs --}}


<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Dairy,_Bakery_&_Eggs')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Free_range,_athically-farmed_and_nutritious')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="dairy_bakery">
                        @foreach(\App\Model\Banner::where('banner_type','Dairy, Bakery & Eggs')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                            <div class="card bg-gray-light" style="height:250px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                </a>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 {{--/ Dairy, Bakery & Eggs --}}


{{-- Snacks, Beverages & More --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Snacks,_Beverages_&_More')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Make_those_in-between_moments_healthy')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="snacks">
                        @foreach(\App\Model\Banner::where('banner_type','Snacks, Beverages & More')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                            <div class="card bg-gray-light" style="height:250px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                </a>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Snacks, Beverages & More --}}

{{-- Organic certified farms --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Know_Your_Organic-Certified_Farms')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('The_Journey_of_your_food')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="organic-certified">
                        <div class="card bg-gray-light">
                            <a href="" style="cursor: pointer;">
                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/2022-12-14-63999d35d954b.png')}}">
                            </a>
                            <div class="p-2">
                                <label style="color:#000000; font-size:17px; font-weight: bold">{{ \App\CPU\translate('Farms_near_Haveri')}}</b></label><br>
                                <svg class="me-1 flex-shrink-0" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M8.75 4.16675C8.75 7.08341 5 9.58341 5 9.58341C5 9.58341 1.25 7.08341 1.25 4.16675C1.25 3.17219 1.64509 2.21836 2.34835 1.5151C3.05161 0.811836 4.00544 0.416748 5 0.416748C5.99456 0.416748 6.94839 0.811836 7.65165 1.5151C8.35491 2.21836 8.75 3.17219 8.75 4.16675Z" stroke="#A9AAB5"></path>
                                    <path d="M5 5.41675C5.69036 5.41675 6.25 4.85711 6.25 4.16675C6.25 3.47639 5.69036 2.91675 5 2.91675C4.30964 2.91675 3.75 3.47639 3.75 4.16675C3.75 4.85711 4.30964 5.41675 5 5.41675Z" stroke="#A9AAB5"></path>
                                    </g>
                                </svg>
                                <span style="font-size: 12px; color:#7b7878">{{ \App\CPU\translate('__Haveri,_Mysore,_Anekal_and_Hoskote')}}</span>
                            </div>
                        </div>
                        <div class="card bg-gray-light">
                            <a href="" style="cursor: pointer;">
                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner')}}/2022-12-14-63999d19998e2.png">
                            </a>
                            <div class="p-2">
                                <label style="color:#000000; font-size:17px; font-weight: bold">{{ \App\CPU\translate('Farms_near_Nelamangala')}}</b></label><br>
                                <svg class="me-1 flex-shrink-0" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M8.75 4.16675C8.75 7.08341 5 9.58341 5 9.58341C5 9.58341 1.25 7.08341 1.25 4.16675C1.25 3.17219 1.64509 2.21836 2.34835 1.5151C3.05161 0.811836 4.00544 0.416748 5 0.416748C5.99456 0.416748 6.94839 0.811836 7.65165 1.5151C8.35491 2.21836 8.75 3.17219 8.75 4.16675Z" stroke="#A9AAB5"></path>
                                    <path d="M5 5.41675C5.69036 5.41675 6.25 4.85711 6.25 4.16675C6.25 3.47639 5.69036 2.91675 5 2.91675C4.30964 2.91675 3.75 3.47639 3.75 4.16675C3.75 4.85711 4.30964 5.41675 5 5.41675Z" stroke="#A9AAB5"></path>
                                    </g>
                                </svg>
                                <span style="font-size:12px; color:#7b7878">{{ \App\CPU\translate('_Nelamangala')}}</span>
                            </div>
                        </div>
                        <div class="card bg-gray-light">
                            <a href="" style="cursor: pointer;">
                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/2022-12-14-63999d0231d86.png')}}">
                            </a>
                            <div class="p-2">
                                <label style="color:#000000; font-size:17px; font-weight: bold">{{ \App\CPU\translate('Banyan_Tree')}}</b></label><br>
                                <svg class="me-1 flex-shrink-0" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M8.75 4.16675C8.75 7.08341 5 9.58341 5 9.58341C5 9.58341 1.25 7.08341 1.25 4.16675C1.25 3.17219 1.64509 2.21836 2.34835 1.5151C3.05161 0.811836 4.00544 0.416748 5 0.416748C5.99456 0.416748 6.94839 0.811836 7.65165 1.5151C8.35491 2.21836 8.75 3.17219 8.75 4.16675Z" stroke="#A9AAB5"></path>
                                    <path d="M5 5.41675C5.69036 5.41675 6.25 4.85711 6.25 4.16675C6.25 3.47639 5.69036 2.91675 5 2.91675C4.30964 2.91675 3.75 3.47639 3.75 4.16675C3.75 4.85711 4.30964 5.41675 5 5.41675Z" stroke="#A9AAB5"></path>
                                    </g>
                                </svg>
                                <span style="font-size:12px; color:#7b7878">{{ \App\CPU\translate('_ Vandavasi')}}</span>
                            </div>
                        </div>
                        <div class="card bg-gray-light">
                            <a href="" style="cursor: pointer;">
                                <img class="" style="width: 100%; border-radius:5px;height:100%;" src="{{asset('storage/app/public/banner/2022-12-14-63999ce562f6c.png')}}">
                            </a>
                            <div class="p-2">
                                <label style="color:#000000; font-size:17px; font-weight: bold">{{ \App\CPU\translate('Singh_Farms')}}</b></label><br>
                                <svg class="me-1 flex-shrink-0" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M8.75 4.16675C8.75 7.08341 5 9.58341 5 9.58341C5 9.58341 1.25 7.08341 1.25 4.16675C1.25 3.17219 1.64509 2.21836 2.34835 1.5151C3.05161 0.811836 4.00544 0.416748 5 0.416748C5.99456 0.416748 6.94839 0.811836 7.65165 1.5151C8.35491 2.21836 8.75 3.17219 8.75 4.16675Z" stroke="#A9AAB5"></path>
                                    <path d="M5 5.41675C5.69036 5.41675 6.25 4.85711 6.25 4.16675C6.25 3.47639 5.69036 2.91675 5 2.91675C4.30964 2.91675 3.75 3.47639 3.75 4.16675C3.75 4.85711 4.30964 5.41675 5 5.41675Z" stroke="#A9AAB5"></path>
                                    </g>
                                </svg>
                                <span style="font-size:12px; color:#7b7878">{{ \App\CPU\translate(' _Himachal_Pradesh')}}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Organic certified farms --}}

{{-- Skincare, Babycare & More --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Skincare,_Babycare_&_More')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('A_beautiful_you,_naturally')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="skincare_bodycare">
                        @foreach(\App\Model\Banner::where('banner_type','Skincare, Bodycare & More')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                            <div class="card bg-gray-light" style="height:250px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                </a>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Skincare, Babycare & More --}}

{{-- Floor Cleaners --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Floor_Cleaners,_Detergents_and_more')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Chemical_free_homes')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="floor_cleaners">
                         @foreach(\App\Model\Banner::where('banner_type','Floor Cleaners, Detergents & More')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                             <div class="card bg-gray-light" style="height:230px">
                                 <a href="{{$banner->url}}" style="cursor: pointer;">
                                     <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                 </a>
                                 <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                             </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Floor Cleaners --}}

{{-- our patner sectoin --}}
<section>
    <div class="container-fluid rtl my-5"  style="background-color:rgb(246, 241, 241); width:100%;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <h4 style="font-color:#993333 ! important">{{ \App\CPU\translate('Our_Partner_Making_History')}}<br>{{ \App\CPU\translate('Your_Kitchen_Healthy')}}</h4>
                    <p>{{ \App\CPU\translate('Chemical-free,_carefully-sourced_products_with_a_premium_on_quality-everything_your_kitchen_needs')}}</p>
                </div>
                <div class="col-lg-7">
                    <div class="row" style="background: rgb(246, 241, 241);border-radius: 20px;">
                        <div class="col-md-12">
                            <div class="feature-product pl-pr-2">
                                <div class="carousel-wrap p-1">
                                    <div class="owl-carousel owl-theme " id="Healthy_Kitchen_With_Wellbe1">
                                        @foreach($featured_products as $product)
                                            <div  style="margin:5px;margin-bottom: 30px;">
                                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                                                @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
{{-- /our patner section --}}

{{-- Products grid (Healthy Kitchen With Wellbe) --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Healthy_Kitchen_With_Wellbe')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Healthy_Kitchen_With_Wellbe">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- /Products grid (Healthy Kitchen With Wellbe) --}}

 {{-- Good Food Image --}}
<section>
    <div class="container rtl my-5">
        <div class="col-lg-12">
            <div class="row">
                <img class="" style="width: 100%; border-radius:5px;" src="{{asset('storage/app/public/banner/Infographics 1.png')}}">
            </div>
        </div>
    </div>

</section>
{{-- /Good Food Image --}}

{{-- Shop By Categories --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Shop_By_Categories')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme" id="Shop_By_Categories">
                        <div class="card custom_img">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Skincare  3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Personal_Care')}}</h5>
                                <ul style="text-align: left">
                                    <li>{{ \App\CPU\translate('Bath')}}</li>
                                    <li>{{ \App\CPU\translate('Body_Care')}}</li>
                                    <li>{{ \App\CPU\translate('Make_Up')}}</li>
                                    <li>{{ \App\CPU\translate('Skin_Care')}}</li>
                                    <li>{{ \App\CPU\translate('Hair')}}</li>
                                    <li>{{ \App\CPU\translate('Oral_Care')}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card custom_img">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Skincare  3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Home_Living')}}</h5>
                                <ul  style="text-align: left">
                                    <li>{{ \App\CPU\translate('Cleaners')}}</li>
                                    <li>{{ \App\CPU\translate('Laundry')}}</li>
                                    <li>{{ \App\CPU\translate('Home_Perfumes')}}</li>
                                    <li>{{ \App\CPU\translate('Covid_free')}}</li>
                                    <li>{{ \App\CPU\translate('Pooja_Needs')}}</li>
                                    <li>{{ \App\CPU\translate('Home_Linen')}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card custom_img">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Skincare  3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Daily_Fresh')}}</h5>
                                <ul style="text-align: left">
                                    <li>{{ \App\CPU\translate('Fruits')}}</li>
                                    <li>{{ \App\CPU\translate('Vegetables')}}</li>
                                    <li>{{ \App\CPU\translate('Dairy_Products')}}</li>
                                    <li>{{ \App\CPU\translate('Juices')}}</li>
                                    <li>{{ \App\CPU\translate('Bakery')}}</li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card custom_img">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Skincare  3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Health_&_Wellness')}}</h5>
                                <ul style="text-align: left">
                                    <li>{{ \App\CPU\translate('Health_Juice')}}</li>
                                    <li>{{ \App\CPU\translate('Juice_By_Health_Conditions')}}</li>
                                    <li>{{ \App\CPU\translate('Shop_By_Brands')}}</li>
                                    <li>{{ \App\CPU\translate('Health_Supplements')}}</li>
                                    <li>{{ \App\CPU\translate('Ayurvedic')}}</li>
                                    <li>{{ \App\CPU\translate('Accessories')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Shop By Categories --}}

{{-- Products grid (Big Saver Combo) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Big_Saver_combo')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Big_Saver_combo">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Big Saver Combo) --}}

{{----}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-2">
                    <div class="owl-carousel owl-theme " id="Video">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4864195.png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4864196.png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4864195.png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 4864196.png')}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Baby And Infant Care --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Baby_And_Infant_Care')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Best_Quality_products_for_little_one')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="baby_infant">
                         @foreach(\App\Model\Banner::where('banner_type','Baby And Infant Care')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                             <div class="card bg-gray-light" style="height:230px">
                                 <a href="{{$banner->url}}" style="cursor: pointer;">
                                     <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                 </a>
                                 <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                             </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Baby And Infant Care --}}

{{-- Products grid (Top Deals) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Top_Deals')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Top_Deals">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Top Deals) --}}

{{-- Stories That Inspire --}}
<div class="container mb-4">
    <div class="row" style="border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Stories_That_Inspire')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Stories_That_Inspire">
                        <div class="card">
                            <img class="card-img-top"  style="height:300px" src="{{asset('storage/app/public/banner/2022-12-14-63999d35d954b.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h4 class="text-stroke text-white mt-10">
                                {{ \App\CPU\translate('Will_There_Be_A_Decline_In_Crop_Yield_In_Future?')}}
                                </h4>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner')}}/2022-12-14-63999d19998e2.png">
                            <div class="card-img-overlay card-inverse">
                                <h4 class="text-stroke text-white mt-10">
                                    {{ \App\CPU\translate('Will_There_Be_A_Decline_In_Crop_Yield_In_Future?')}}
                                </h4>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/2022-12-14-63999d0231d86.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h4 class="text-stroke text-white mt-10">
                                    {{ \App\CPU\translate('Will_There_Be_A_Decline_In_Crop_Yield_In_Future?')}}
                                </h4>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/2022-12-14-63999ce562f6c.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h4 class="text-stroke text-white mt-10">
                                    {{ \App\CPU\translate('Will_There_Be_A_Decline_In_Crop_Yield_In_Future?')}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Stories That Inspire --}}

{{-- Products grid (Most Popular) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Most_Popular')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Most_Popular">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Most Popular) --}}

{{-- Great Memories Begin With Good Food --}}
<div class="container mb-4">
    <div class="row" style="border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Great_Memories_Begin_With_Good_Food')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Great_Memories_Begin_With_Good_Food">
                        <div class="card">
                            <img class="card-img-top"  style="height:300px" src="{{asset('storage/app/public/banner/Group 4864198 (1).png')}}">

                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Group 4864199 (1).png')}}">

                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Group 4864198 (1).png')}}">

                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Group 4864199 (1).png')}}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Great Memories Begin With Good Food --}}

{{-- Products grid (Seasonal Delights) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Seasonal_Delights')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Seasonal_Delights">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Seasonal Delights) --}}

{{-- Your Stories with us--}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Your_Stories_With_Us')}}</h2>
            </div>
        </div>
        <div class="col-md-12" >
            <div class="row">
                <div class="col-lg-6">
                    <video width=100% controls="controls autoplay">
                        <source src="https://www.youtube.com/watch?v=E6uzb7rdkeo" type="video/youtube" />
                    </video>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-10">
                            <p>
                                Milk samples given were excellent and I switched over to A2 milk. I am Impressed on the staff who have  a personal touch and i think that the greens taste very extraordinary. All veggies are fresh and taste amazing and the price is not unreasonable matches with market with chemicals.
                            </p>
                        </div>
                        <div class="col-lg-2">
                            <img class="card-img-top"  style="height:60px; width:60px" src="{{asset('storage/app/public/banner/Group 2 Copy 3.png')}}">
                            <img class="card-img-top" style="height:60px; width:60px" src="{{asset('storage/app/public/banner/Group 2 Copy 4.png')}}">
                            <img class="card-img-top" style="height:60px; width:60px" src="{{asset('storage/app/public/banner/Group 2 Copy.png')}}">
                            <img class="card-img-top" style="height:60px; width:60px" src="{{asset('storage/app/public/banner/Group 2.png')}}">
                            <img class="card-img-top" style="height:60px; width:60px" src="{{asset('storage/app/public/banner/Group 2.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- /Your Stories with us--}}

{{-- Beat The Heat --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Beat_The_Heat_With_These_Tips')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:20px;padding-right: 20px;padding-top: 10px;">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme " id="Beat_The_Heat_With_These_Tips">
                        <div class="card bg-gray-light custom_img" style="background-color: #f9ffe6">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Skincare  3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Skincare_Essentials')}}</h5>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Gental_sunscreens_for_your_skin')}}</p>
                            </div>
                            <div>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        </div>
                        <div class="card bg-gray-light custom_img" style="background-color: #fffae6">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/__Hydrate 3.png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Stay_Hydrated')}}</h5>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Stay_refreshed_with_tender_coconut_water')}}</p>
                            </div>
                            <div>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        </div>
                        <div class="card bg-gray-light custom_img" style="background-color:  #ffeee6">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/Layer 2 (1).png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Summers')}}{{ \App\CPU\translate('_Superfood')}}</h5>
                                <p style="font-size:12px;">{{ \App\CPU\translate('The_goodness_of_curd')}}</p>
                            </div>
                            <div>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        </div>
                        <div class="card bg-gray-light custom_img" style="background-color:  #fff2e6">
                            <div style="height:150px">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="" style="width: 50%; border-radius:5px;" src="{{asset('storage/app/public/banner')}}/Layer 2 (2).png">
                                </a>
                            </div>
                             <div>
                                <h5>{{ \App\CPU\translate('Diet_Must-haves')}}</h5>
                                <p style="font-size:12px;">{{ \App\CPU\translate('Cooling_fruits_and_veggies')}}</p>
                            </div>
                            <div>
                                <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius">{{ \App\CPU\translate('Shop_Now')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Beat The Heat --}}

{{-- Eat Seasonal --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Eat_Seasonal')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Freshly_harvested_-_nothing_that')}}'{{ \App\CPU\translate('s_from_cold_storage')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="eat_seasonal">
                         @foreach(\App\Model\Banner::where('banner_type','Fruits & Vegitables')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                             <div class="card bg-gray-light" style="height:230px">
                                 <a href="{{$banner->url}}" style="cursor: pointer;">
                                     <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                 </a>
                                 <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                             </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Eat Seasonal --}}

{{-- Top Subscribed Products --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Top_Subscribed_Product')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('You_daily_dose_of_health')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="top_subscribed">
                         @foreach(\App\Model\Banner::where('banner_type','Fruits & Vegitables')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                             <div class="card bg-gray-light" style="height:230px">
                                 <a href="{{$banner->url}}" style="cursor: pointer;">
                                     <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                 </a>
                                 <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                             </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Top Subscribed Products --}}

{{-- Products grid (These Deals Wont Last) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('These_Deals_Wont_Last')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="These_Deals_Wont_Last">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (These Deals Wont Last) --}}

{{-- Products grid (Zero-Waste Categories) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Zero-Waste_Categories')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Zero-Waste_Categories">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Zero-Waste Categories) --}}

{{-- Shop By Diet Type --}}
<div class="container mb-4">
    <div class="row" style="border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Shop_By_Diet_Type')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Shop_By_Diet_Type">
                        <div class="card">
                            <img class="card-img-top"  style="height:300px" src="{{asset('storage/app/public/banner/Diet Keto 1.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h2 class="text-stroke text-center mt-6" style="color:#206040 !important;">
                                    {{ \App\CPU\translate('Vegan')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Diet Keto 1.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h2 class="text-stroke text-center mt-6" style="color:#e6b800 !important;">
                                    {{ \App\CPU\translate('Keto')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Diet__glutten free 1.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h2 class="text-stroke text-center mt-6" style="color:#660033 !important;">
                                    {{ \App\CPU\translate('Low_Carb')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" style="height:300px" src="{{asset('storage/app/public/banner/Diet__glutten free 1.png')}}">
                            <div class="card-img-overlay card-inverse">
                                <h2 class="text-stroke text-center mt-6" style="color:#ff6699 !important;">
                                    {{ \App\CPU\translate('Gluten_Free')}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Shop By Diet Type --}}

{{-- Products grid (Limited Period Offers) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Limited_Period_Offers')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Limited_Period_Offers">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                              @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Limited Period Offers) --}}

{{-- Shop By Mood--}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="text-center" style="font-weight: bold">{{ \App\CPU\translate('Shop_By_Mood')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:20px;padding-right: 20px;padding-top: 10px;">
                <div class="carousel-wrap p-2">
                    <div class="owl-carousel owl-theme " id="Shop_By_Mood">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5294 (1).png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5293 (1).png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5295 (1).png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5296 (1).png')}}">
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{asset('storage/app/public/banner/Group 5297 (1).png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- Top Products for you --}}

<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Top_Product_For_You')}}</h2>
                <p class="text-center" style="font-size: 20px;">{{ \App\CPU\translate('Inspired_By_Your_Browsing_History')}}</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="top_products_for_you">
                         @foreach(\App\Model\Banner::where('banner_type','Fruits & Vegitables')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                             <div class="card bg-gray-light" style="height:230px">
                                 <a href="{{$banner->url}}" style="cursor: pointer;">
                                     <img class="" style="width: 100%; border-radius:5px;height:100%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                                 </a>
                                 <a href="{{$banner->url}}" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40">{{ \App\CPU\translate('Shop_Now')}}</a>
                             </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- /Top Products for you --}}

{{-- We Deliver For Free In Communities Near You--}}
<section>
    <div class="container-fluid rtl my-5"  style="background-color:rgb(246, 232, 234); width:100%;">
        <div class="row">
            <div class="col-lg-12 text-center p-4">
                <h4>{{ \App\CPU\translate('We_Deliver_For_Free_In_Communities_Near_You')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" type="submit" class="search_form search" id="search_form_home">
                    <span class="fa fa-search"></span>
                    <input class="form-control top_left_bottom_right" autocomplete="off" id="search"
                        placeholder="Search Community" name="name"  style="">
                </form>
            </div>
            <div class="col-lg-6">
                <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm rounded-pill btn-outline-dark bg-light">{{ \App\CPU\translate('HSR_Layout')}}</a>
                <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm rounded-pill btn-outline-dark bg-light">{{ \App\CPU\translate('Bommanahalli')}}</a>
                <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm rounded-pill btn-outline-dark bg-light">{{ \App\CPU\translate('Koramangala')}}</a>
                <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm rounded-pill btn-outline-dark bg-light">{{ \App\CPU\translate('Sarjapur')}}</a>
                <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm rounded-pill btn-outline-dark bg-light">{{ \App\CPU\translate('Yelahankala')}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                    <div class="carousel-wrap p-1">
                        <div class="owl-carousel owl-theme " id="Community">
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 799.png">
                                </a>
                                <label>{{ \App\CPU\translate('Shobha_Daffodils')}}</label>
                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 804.png">
                                </a>
                                <label>{{ \App\CPU\translate('Phoenix_Kessaku')}}</label>
                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 807.png">
                                </a>
                                <label>{{ \App\CPU\translate('Surabhi_Appartments')}}</label>
                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 804.png">
                                </a>
                                <label>{{ \App\CPU\translate('Hoodi_Appartment')}}</label>
                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 799.png">
                                </a>
                                <label>{{ \App\CPU\translate('Florentine')}}</label>

                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 804.png">
                                </a>
                                <label>{{ \App\CPU\translate('Springfields')}}</label>

                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 804.png">
                                </a>
                                <label>{{ \App\CPU\translate('Aavalon')}}</label>

                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 807.png">
                                </a>
                                <label>{{ \App\CPU\translate('Baily')}}</label>

                            </div>
                            <div class="card text-center" style="background-color:rgb(246, 232, 234); border:none;">
                                <a href="{{$banner->url}}" style="cursor: pointer;">
                                    <img class="p-3" src="{{asset('storage/app/public/banner')}}/Ellipse 799.png">
                                </a>
                                <label>{{ \App\CPU\translate('Yelahankala')}}</label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

{{-- /We Deliver For Free In Communities Near You--}}

{{-- Products grid (Your Last Viewed) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Your_Last_Viewed')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Your_Last_Viewed">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                                @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /Products grid (Your Last Viewed) --}}

{{-- Products grid (Buy It Again) --}}
<div class="container mb-4">
    <div class="row" style="background: white;border-radius: 20px;">
        <div class="col-md-12" >
            <div class="feature-product-title">
                <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Buy_It_Again')}}</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="feature-product" style="padding-left:10px;padding-right: 10px;padding-top: 10px;">
                <div class="carousel-wrap p-1">
                    <div class="owl-carousel owl-theme " id="Buy_It_Again">
                        @foreach($featured_products as $product)
                            <div  style="margin:5px;margin-bottom: 30px;">
                                {{-- @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings]) --}}
                                @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- /Products grid (Buy It Again) --}}

{{-- Shop By Brands You Love --}}
<div class="mt-3 mb-3 brand-slider">
    <div class="col-md-12" >
        <div class="feature-product-title">
            <h2 class="col-md-12 text-center" style="font-weight: bold">{{ \App\CPU\translate('Shop_By_Brands_You_Love')}}</h2>
        </div>
    </div>
    <div class="owl-carousel owl-theme p-2" id="brands-slider">
        @foreach($brands as $brand)
            <div class="text-center">
                <a href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                    <div class="card align-items-center justify-content-center"
                         style="height:100px;margin:5px;">
                        <img style="border-radius: 50%;"
                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                            src="{{asset("storage/app/public/brand/$brand->image")}}" alt="{{$brand->name}}">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
{{-- /Shop By Brands You Love --}}



{{-- --}}
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-4 p-2" >
            <div class="card"  style="background: rgb(251, 228, 197)">
                <div class="col-lg-8">
                    <h1>{{ \App\CPU\translate('Subscribe_To_Our_Newsletter')}}</h1>
                    <p>{{ \App\CPU\translate('A_monthly_nugget_on_what_you_love_at_The_Organic_World._And_no,_we_wont_spam!')}}</p>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-8 p-2">
                    <div class="card" style="background: rgb(251, 228, 197)">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1>{{ \App\CPU\translate('Health_On_The_Go')}}</h1>
                                    <p>{{ \App\CPU\translate('Click_To_Download')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card"  style="background: rgb(251, 228, 197)">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1>{{ \App\CPU\translate('Get_In_Touch')}}</h1>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>

                        <div class="col-lg-12">
                            <p>{{ \App\CPU\translate('Let_us_know_what_you_want,_feel_and_think-always_happy_to_hear_from_you!')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
{{-- / --}}



{{-- /changing the way you live --}}
    {{-- icon Band --}}
    {{-- <section class="container rtl mt-3 col-lg-10" >
        <div class="features-wrap-one wow fadeInUp" id="second_container">
            <div class="card" style="background: #f8f6ef; border: none;">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="icon">
                                        <img style="height: 90px;width:95px;" src="{{ asset('public/assets/front-end/png/farm_to_kitchen.png') }}"
                                                    alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12 mt-lg-3">
                                    <div class="text">
                                        <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Farm_to_Kitchen')}}</h6>
                                        <p style="font-size: 14px;">{{ \App\CPU\translate('Next_day_delivery')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4">
                            <div class="icon">
                                <img style="height: 90px;width:95px;" src="{{ asset('public/assets/front-end/png/Organically_grown.png') }}"
                                            alt="">
                            </div>
                                </div>
                                <div class="col-lg-8 col-sm-12 mt-lg-3">
                            <div class="text">
                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Organically_grown')}}</h6>
                                <p style="font-size: 14px;">{{ \App\CPU\translate('Zero_chemical_pesticides')}}</p>
                            </div>
                                </div>
                        </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4">
                            <div class="icon">
                                <img style="height: 90px;width:95px;" src="{{ asset('public/assets/front-end/png/quality_assured.png') }}"
                                alt="">
                            </div>
                                </div>
                                <div class="col-lg-8 col-sm-12 mt-lg-3">
                            <div class="text">
                                <h6 class="mb-0" style="font-weight: 700;">{{ \App\CPU\translate('Quality_Assured')}}</h6>
                                <p style="font-size: 14px;">{{ \App\CPU\translate('Minimally_processed')}}</p>
                            </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- icon Band --}}
    {{--brands--}}
    <section class="container rtl mt-3">
        <!-- Heading-->
        {{-- <div class="section-header">
            <div style="color: black;font-weight: 700;
            font-size: 22px;">
                <span> {{\App\CPU\translate('brands')}}</span>
            </div>
            <div style="margin-right:2px;">
                <a class="text-capitalize view-all-text" href="{{route('brands')}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
        </div> --}}
    {{--<hr class="view_border">--}}
    <!-- Grid-->

        {{-- <div class="mt-3 mb-3 brand-slider">
            <div class="owl-carousel owl-theme p-2" id="brands-slider">
                @foreach($brands as $brand)
                    <div class="text-center">
                        <a href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:100px;margin:5px;">
                                <img style="border-radius: 50%;"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                    src="{{asset("storage/app/public/brand/$brand->image")}}" alt="{{$brand->name}}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> --}}
        {{-- Banner  --}}
        <div class="rtl mt-3 mb-3 my-4">
            <div class="row justify-content-center">
                {{-- <div class="col-12 lg-heading text-center">
                    <h2 style="font-size: 30px; font-weight:800;">Over 2000 products which are Organic and Natural</h2>
                    <p>Chemical-free better choices</p>
                </div> --}}


                @foreach(\App\Model\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)

                <div class="col-md-3 col-lg-3 col-6 mt-2 mt-md-0">
                    {{-- <div class="top_card p-3 text-center text-white" style="background-color: #BD4D29; border-radius: 20px 20px 0px 0px; font-family: 'BoldenVan';
                    font-style: normal;
                    font-weight: 400;
                    font-size: 24px;
                    line-height: 31px;"> 40% off
                    </div> --}}
                    <a href="{{$banner->url}}" style="cursor: pointer;">
                        <img class="" style="width: 100%; border-radius:5px;height:auto;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                    </a>
                    {{-- <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">Shop Now</a> --}}
                </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="container rtl mt-3 mb-3 my-5">
            <div class="row justify-content-center">
                <div class="col-12 lg-heading text-center">
                    <h2 style="font-size: 30px; font-weight:800;">Make A Better Choice</h2>
                    <p>Wide range of organic & natural products</p>
                </div>
                @foreach(\App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                <div class="col-md-3 col-lg-3 col-sm-6 mt-2 mt-md-0">
                    <a href="{{$banner->url}}" style="cursor: pointer;">
                        <img class="" style="width: 100%; border-radius:5px;height:auto;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                    </a>
                    <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">Shop Now</a>
                </div>
                @endforeach
            </div>
        </div> --}}
    </section>

    {{--  --}}







    <!-- Products grid (featured products)-->

    {{-- @if ($featured_products->count() > 0 )
    <div class="container mb-4">
        <div class="row" style="background: white;border-radius: 20px;">
            <div class="col-md-12" >
                <div class="feature-product-title">
                    {{ \App\CPU\translate('Harvest_of_The_Season')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                    <div class="carousel-wrap p-1">
                        <div class="owl-carousel owl-theme " id="featured_products_list">
                            @foreach($featured_products as $product)
                                <div  style="margin:5px;margin-bottom: 30px;">
                                    @include('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings])
                                  {{-- @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings]) --}}

                                {{-- </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif --}}
     <!-- Products grid (featured products)-->

     {{-- <section class="container rtl mt-3">
     <div class="rtl mt-3 mb-3 my-3">
            <div class="row justify-content-center">
                <div class="col-12 lg-heading text-center">
                    <h2 style="font-size: 30px; font-weight:800;">{{ \App\CPU\translate('Choose_By_Categories')}}</h2>

                </div>
                @foreach(\App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->take(4)->get() as $banner)
                <div class="col-md-3 col-lg-3 mt-2 mt-md-0 col-6">
                    {{-- <div class="top_card p-3 text-center text-white" style="background-color: #BD4D29; border-radius: 20px 20px 0px 0px; font-family: 'BoldenVan';
                    font-style: normal;
                    font-weight: 400;
                    font-size: 24px;
                    line-height: 31px;"> 40% off
                    </div> --}}
                    {{-- <a href="{{$banner->url}}" style="cursor: pointer;">
                        <img class="" style="width: 100%; border-radius:5px;height:auto;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                    </a> --}}
                    {{-- <a href="https://www.reapmind.com" class="font-13 font-800 btn btn-sm btn-dark btn-tr-bl-radius position-absolute bottom-40 start-40">Shop Now</a> --}}
                {{-- </div>
                @endforeach
            </div>
        </div>
    </section>  --}}


    {{-- why chose happy harvest Farms --}}
    {{-- <section style="background-color: #5A3B21">
        <div class="container rtl my-4">
               <div class="row justify-content-center pt-3">
                   <div class="col-lg-12 lg-heading text-center mb-60 wow fadeInUp">
                       <h2  style="font-size: 30px; font-weight:800;" class="text-white">{{ \App\CPU\translate('Why_Order_From_Happy_Harvest_Farms')}}?</h2>
                   </div>
                   <div class="row mx-3" id="Why">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/NextDayDel.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white"> {{ \App\CPU\translate('Next-day_delivery')}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/Sustainably farmed.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white">
                                            {{ \App\CPU\translate('Sustainably_farmed')}}
                                            </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/Chemical free.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white">
                                            {{ \App\CPU\translate('Chemical_free')}}
                                            </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/Wide network.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white">
                                            {{ \App\CPU\translate('Wide_network_of_organic_farmers')}}
                                            </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/Quality assured.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white">
                                            {{ \App\CPU\translate('Quality_Assured')}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="service-box text-center mb-70 wow fadeInUp p-2" style="background-color: #7E5623;">
                                <div class="icon">
                                    <img style="height: 60%;width:60%;" src="{{ asset('public/assets/front-end/png/Easy returns.png') }}"
                                    alt="">
                                </div>
                                <div class="text">
                                    <h3 class="title text-white">
                                        <a href="" class="text-white">
                                        {{ \App\CPU\translate('Easy_Return_Policy')}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                   </div>

                </div>
           </div>
       </section>  --}}
    {{-- why chose happy harvest Farms --}}

    {{--featured deal--}}
    @php($featured_deals=\App\Model\FlashDeal::with(['products'=>function($query_one){
                $query_one->with('product.reviews')
        ->whereHas('product',function($query_two){
            $query_two->active();
        })
        ->whereHas('product.shop_pincode',function($q){
                    $q->where('pincode',session()->get('pincode'));
                });
    }])

    ->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))
    ->where(['status'=>1])
    ->where(['deal_type'=>'feature_deal'])
    ->first())

{{-- {{$featured_deals}} --}}
    @if(isset($featured_deals))
        <section class="container featured_deal rtl mb-2">
            <div class="row" style="background: #BD4D29;padding:5px;padding-bottom: 25px; border-radius:20px;">
                <div class="col-12 pb-2" >
                    @if (count($featured_deals->products)>0)
                        <a class="text-capitalize mt-2 mt-md-0 {{Session::get('direction') === "rtl" ? 'float-left' : 'float-right'}}" href="{{route('products',['data_from'=>'featured_deal'])}}"
                            style="color: white !important;{{Session::get('direction') === "rtl" ? 'margin-left: 21px;' : 'margin-right: 21px;'}}">
                            {{ \App\CPU\translate('view_all')}}
                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                        </a>
                    @endif
                </div>
                <div class="col-xl-3 col-md-4 d-flex align-items-center justify-content-center right">
                    <div class="m-4">
                        <span class="featured_deal_title"
                            style="padding-top: 12px; font-family: 'BoldenVan';">{{ \App\CPU\translate('Trending')}}<br> {{ \App\CPU\translate('Harvest')}}</span>
                        <br>

                        {{-- <span style="color: white;text-align: left !important;">{{ \App\CPU\translate('See the latest deals and exciting new offers ')}}!</span> --}}

                    </div>

                </div>

                <div class="col-xl-9 col-md-8 d-flex align-items-center justify-content-center {{Session::get('direction') === "rtl" ? 'pl-4' : 'pr-4'}}">
                    <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                        @foreach($featured_deals->products as $key=>$product)
                            @include('web-views.partials._feature-deal-product',['product'=>$product->product, 'decimal_point_settings'=>$decimal_point_settings])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- <div class="col-lg-10 offset-lg-1 my-5">
        <h2 class="col-md-12 text-center" style="font-weight: bold">Dal, Grains, Oils and Flours </h2>
        <p class="text-center" style="font-size: 20px;">Organic certifed, Chemical-free</p>
        <div class="row">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="dal_item">
                    @foreach ( $dal_items as $dal_item )

                            <div class="card bg-gray-light">
                                <img class="card-img-top mb-3"  src="{{asset('storage/app/public/sub_category')}}/{{$dal_item['icon']}}">

                                <div class="card-body text-center">
                                    <h6 class="card-title my-2">{{ $dal_item->name}}</h6>
                                    <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                                </div>
                            </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Organic and affordable fruits --}}
    {{-- <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <!-- <img src="{{asset("public/assets/front-end/png/new-arrivals.png")}}" alt=""> -->

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <!-- <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p> -->
               Dal, Grains, Oils and Flours
            </div>
        </div>
    </div>
    <div class="container rtl mb-3" style="padding-left: 5px !important; padding-right:11px !important;">
        <div class="col-md-12">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="dal_item">


                    @foreach($dal_items as $key=>$dal_item)

                            <div class="card bg-gray-light mx-3"  onclick="location.href='https://theorganicworld.reapmind.com/products?id=32&data_from=category&page=1'">
                                <img class="card-img-top mb-3"  src="{{asset('storage/app/public/sub_category')}}/{{$dal_item['icon']}}">

                                <div class="card-body text-center">
                                    <h6 class="card-title my-2">{{ $dal_item->name}}</h6>
                                    <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                                </div>
                            </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
    {{-- /Organic and affordable fruits --}}

    {{-- Organic and affordable fruits --}}
    {{-- <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <!-- <img src="{{asset("public/assets/front-end/png/new-arrivals.png")}}" alt=""> -->

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <!-- <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p> -->
               Organic and affordable Fruits and Vegetables
            </div>
        </div>
    </div>
    <div class="container rtl mb-3" style="padding-left: 5px !important; padding-right:11px !important;">
        <div class="col-md-12">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="switch-veges-product">


                    @foreach($Fruits_vegitables as $key=>$product)


                    @include('web-views.partials._product-card-1',['product'=>$product, 'name'=>'organic'])

                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
    {{-- /Organic and affordable fruits --}}

    {{-- <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <!-- <img src="{{asset("public/assets/front-end/png/new-arrivals.png")}}" alt=""> -->

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <!-- <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p> -->
                New Launch Dairy & Bakery Products
            </div>
        </div>
    </div> --}}
    {{-- <div class="container rtl mb-3" style="padding-left: 5px !important; padding-right:11px !important;">
        <div class="col-md-12">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="switch-veges-product_staples">


                   @foreach($home_essential as $key=>$product)


                    @include('web-views.partials._product-card-1',['product'=>$product, 'name'=>'organic'])

                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

     {{-- <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <!-- <img src="{{asset("public/assets/front-end/png/new-arrivals.png")}}" alt=""> -->

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <!-- <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p> -->
                Festive Special Snacks and Bevarages
            </div>
        </div>
    </div> --}}
    {{-- <div class="container rtl mb-3" style="padding-left: 5px !important; padding-right:11px !important;">
        <div class="col-md-12">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="switch-staples-product">
                    @foreach($sanck_sweet as $key=>$product)


                    @include('web-views.partials._product-card-1',['product'=>$product, 'name'=>'organic'])

                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
    {{--deal of the day--}}
    {{-- <div class="container rtl">
        <div class="row">
            <!-- Deal of the day/Recommended Product -->
            <div class="col-xl-3 col-md-4 pb-4 mt-3 pl-0 pr-0">
                <div class="deal_of_the_day" style="background: {{$web_config['primary_color']}};height: 784px;">
                    @if(isset($deal_of_the_day) && isset($deal_of_the_day->product))
                        <div class="d-flex justify-content-center align-items-center" style="width: 70%;margin:auto;">
                            <h1 class="align-items-center" style="color: white"> {{ \App\CPU\translate('deal_of_the_day') }}</h1>
                        </div>
                        <div class="recomanded-product-card">

                            <div class="d-flex justify-content-center align-items-center" style="margin:20px 20px -20px 20px;padding-top: 20px;">
                                <img style="border-radius:5px 5px 0px opx;"
                                    src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$deal_of_the_day->product['thumbnail']}}"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                    alt="">
                            </div>
                            <div style="background:#ffffff;margin:20px;padding-top: 10px;height: 200px;border-radius: 0px 0px 5px 5px;">
                                <div style="text-align: left; padding: 20px;">

                                    @php($overallRating = \App\CPU\ProductManager::get_overall_rating($deal_of_the_day->product['reviews']))
                                    <div class="rating-show" style="height:125px; ">
                                        <h5 style="font-weight: 600; color: {{$web_config['primary_color']}}">
                                            {{\Illuminate\Support\Str::limit($deal_of_the_day->product['name'],30)}}
                                        </h5>
                                        <span class="d-inline-block font-size-sm text-body">
                                            @for($inc=0;$inc<5;$inc++)
                                                @if($inc<$overallRating[0])
                                                    <i class="sr-star czi-star-filled active"></i>
                                                @else
                                                    <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                @endif
                                            @endfor
                                            <label class="badge-style">( {{$deal_of_the_day->product->reviews_count}} )</label>
                                        </span>
                                    </div>
                                    <div class="float-right">

                                        @if($deal_of_the_day->product->discount > 0)
                                            <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                {{\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)}}
                                            </strike>
                                        @endif
                                        <span class="text-accent" style="margin: 10px;font-size: 22px !important;">
                                            {{\App\CPU\Helpers::currency_converter(
                                                $deal_of_the_day->product->unit_price-(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))
                                            )}}
                                        </span>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="recomanded-buy-button">
                            <button class="buy_btn" style="color:{{$web_config['primary_color']}}"
                                    onclick="location.href='{{route('product',$deal_of_the_day->product->slug)}}'">{{\App\CPU\translate('buy_now')}}
                            </button>
                        </div>
                    @else
                        @php($product=\App\Model\Product::active()->inRandomOrder()->first())
                        @if(isset($product))
                            <div class="d-flex justify-content-center align-items-center">
                                <h1 style="color: white"> {{ \App\CPU\translate('recommended_product') }}</h1>
                            </div>
                            <div class="recomanded-product-card">

                                <div class="d-flex justify-content-center align-items-center" style="margin:20px 20px -20px 20px;padding-top: 20px;">
                                    <img style=""
                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                        alt="">
                                </div>
                                <div style="background:#ffffff;margin:20px;padding-top: 10px;height: 200px;border-radius: 0px 0px 5px 5px;">
                                    <div style="text-align: left; padding: 20px;">

                                        @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product['reviews']))
                                        <div class="rating-show" style="height:125px; ">
                                            <h5 style="font-weight: 600; color: {{$web_config['primary_color']}}">
                                                {{\Illuminate\Support\Str::limit($product['name'],40)}}
                                            </h5>
                                            <span class="d-inline-block font-size-sm text-body">
                                                @for($inc=0;$inc<5;$inc++)
                                                    @if($inc<$overallRating[0])
                                                        <i class="sr-star czi-star-filled active"></i>
                                                    @else
                                                        <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                    @endif
                                                @endfor
                                                <label class="badge-style">( {{$product->reviews_count}} )</label>
                                            </span>
                                        </div>
                                        <div class="float-right">

                                            @if($product->discount > 0)
                                                <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                    {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                                </strike>
                                            @endif
                                            <span class="text-accent" style="margin: 10px;font-size: 22px !important;">
                                                {{\App\CPU\Helpers::currency_converter(
                                                    $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                                                )}}
                                            </span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="recomanded-buy-button">
                                <button class="buy_btn" style="color:{{$web_config['primary_color']}}"
                                        onclick="location.href='{{route('product',$product->slug)}}'">{{\App\CPU\translate('buy_now')}}
                                </button>
                            </div>

                        @endif
                    @endif
                </div>

            </div>
            <!-- Latest products -->
            <div class="col-xl-9 col-md-8 mt-2 pl-0 pr-0">
                <div class="latest-product-margin" style="margin-{{Session::get('direction') === "rtl" ? 'right:30px' : 'left:30px'}}">
                    <div class="d-flex justify-content-between">
                        <div class="" style="text-align: center;">
                            <span class="for-feature-title" style="text-align: center;font-size:22px !important; font-weight:700">{{ \App\CPU\translate('latest_products')}}</span>
                        </div>
                        <div style="margin-right: 4px;">
                            <a class="text-capitalize view-all-text"
                               href="{{route('products',['data_from'=>'latest'])}}">
                                {{ \App\CPU\translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        @foreach($latest_products as $product)
                            <div class="col-xl-3 col-sm-6 col-md-6 col-6 mb-4">
                                <div style="margin:2px;">
                                    @include('web-views.partials._single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


{{-- @php($main_section_banner = \App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->latest()->first())
    @if (isset($main_section_banner))
    <div class="container rtl mb-3">
        <div class="row" >
            <div class="col-12 pl-0 pr-0">
                <a href="{{$main_section_banner->url}}"
                    style="cursor: pointer;">
                    <img class="d-block footer_banner_img" style="width: 100%;border-radius: 5px;height: auto !important;"
                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                            src="{{asset('storage/app/public/banner')}}/{{$main_section_banner['photo']}}">
                </a>
            </div>
        </div>
    </div>
    @endif --}}

    @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
    {{--categries--}}
    {{-- <div class="container rtl">
        <div class="row"> --}}
            {{-- @if ($business_mode == 'multi')
                <div class="col-md-6 {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}">
                    <div class="card" style="min-height: 380px;">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="categories-title">
                                    <span style="font-weight: 600;font-size: 16px;">{{ \App\CPU\translate('categories')}}</span>
                                </div>
                                <div class="categories-view-all">
                                    <a class="text-capitalize view-all-text"
                                    href="{{route('categories')}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-3">
                                @foreach($categories as $key=>$category)

                                    @if ($key<10)
                                    <div class="text-center"  style="margin: 5px;">
                                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                            <img style="vertical-align: middle; height: 100px;border-radius: 5px;"
                                                onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                src="{{asset("storage/app/public/category/$category->icon")}}"
                                                alt="{{$category->name}}">
                                            <p class="text-center small "
                                            style="margin-top: 5px">{{Str::limit($category->name, 12)}}</p>
                                        </a>
                                    </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-12 pl-0 pr-0">
                    <div class="card" style="min-height: 232px;">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div style="{{Session::get('direction') === "rtl" ? 'margin-right: 20px;' : 'margin-left: 22px;'}}">
                                    <span style="font-weight: 600;font-size: 16px;">{{ \App\CPU\translate('categories')}}</span>
                                </div>
                                <div style="{{Session::get('direction') === "rtl" ? 'margin-left: 15px;' : 'margin-right: 13px;'}}">
                                    <a class="text-capitalize view-all-text"
                                    href="{{route('categories')}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-3">
                                @foreach($categories as $key=>$category)
                                    @if ($key<11)
                                        <div class="text-center"  style="margin: 5px;">
                                            <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                                <img style="vertical-align: middle; height: 100px;border-radius: 5px;"
                                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                    src="{{asset("storage/app/public/category/$category->icon")}}"
                                                    alt="{{$category->name}}">
                                                <p class="text-center small "
                                                style="margin-top: 5px">{{Str::limit($category->name, 12)}}</p>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}
            <!-- top sellers -->

        {{-- @if ($business_mode == 'multi')
            @if(count($top_sellers) > 0)
                <div class="col-md-3 mt-2 mt-md-0 seller-card" >
                    <div class="card" style="min-height: 383px;">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="seller-list-title">
                                    <span style="font-weight: 600;font-size: 18px;">{{ \App\CPU\translate('sellers')}}</span>
                                </div>
                                <div class="seller-list-view-all">
                                    <a class="text-capitalize view-all-text"
                                    href="{{route('sellers')}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between mt-3">
                                @foreach($top_sellers as $key=>$seller)
                                    @if ($key<10)

                                        @if($seller->shop)
                                            <div style="margin: 5px;">
                                                <center>
                                                    <a href="{{route('shopView',['id'=>$seller['id']])}}">
                                                        <img
                                                            style="vertical-align: middle; padding: 2%;width:100px;height: 100px;border-radius: 50%"
                                                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                            src="{{asset("storage/app/public/shop")}}/{{$seller->shop->image}}">
                                                        <p class="text-center small ">{{Str::limit($seller->shop->name, 14)}}</p>
                                                    </a>
                                                </center>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif --}}
        {{-- </div>
    </div> --}}


    {{-- <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <img  src="{{asset("public/assets/front-end/png/new-arrivals.png")}}"
                                 alt="">

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p>
            </div>
        </div>
    </div>
    <div class="container rtl mb-3" style="">
        <div class="col-md-12" style="background-color:white;padding:20px;border-radius:10px;">
            <div class="new_arrival_product" style="margin-left:-5px;">
                <div class="carousel-wrap" >
                    <div class="owl-carousel owl-theme p-2" id="new-arrivals-product">
                        @foreach($latest_products as $key=>$product)

                                @include('web-views.partials._product-card-1',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

{{-- dal atta --}}
 {{-- <div class="col-lg-10 offset-lg-1 my-5">
        <h2 class="col-md-12 text-center" style="font-weight: bold">Atta, Dals, Rice, Oils & More</h2>
        <p class="text-center" style="font-size: 20px;">No chemicals, only great taste and flavour</p>
        <div class="row">
            <div class="col-lg-3">
                <div class="card bg-gray-light">
                    <img class="card-img-top" src="https://img.theorganicworld.com/ORG-0/Home Page Entity/Atta, Dals, Rice, Oils & More/Copy_of_Atta__Sooji___Flours-removebg-preview.png?s=" alt="Card image" style="width:12rem; place-self: center">
                    <div class="card-body text-center">
                        <h6 class="card-title">Atta, Sooji & Flours</h6>

                        <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gray-light">
                    <img class="card-img-top" src="https://img.theorganicworld.com/ORG-0/Home Page Entity/Atta, Dals, Rice, Oils & More/Copy_of_Dal-removebg-preview.png?s=" alt="Card image" style="width:12rem; place-self: center">
                    <div class="card-body text-center">
                        <h6 class="card-title">Dal</h6>
                        <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gray-light">
                    <img class="card-img-top" src="https://img.theorganicworld.com/ORG-0/Home Page Entity/Atta, Dals, Rice, Oils & More/Copy_of_Grains-removebg-preview.png?s=" alt="Card image" style="width:12rem; place-self: center">
                    <div class="card-body text-center">
                        <h6 class="card-title">Grains</h6>
                        <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gray-light">
                    <img class="card-img-top"src="https://img.theorganicworld.com/ORG-0/Home Page Entity/Atta, Dals, Rice, Oils & More/Copy_of_Oil_and_ghee-removebg-preview.png?s=" alt="Card image" style="width:12rem; place-self: center">
                    <div class="card-body text-center">
                        <h6 class="card-title">Oil & Ghee</h6>
                        <a href="#" class="btn btn-dark btn-sm btn-tr-bl-radius">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


{{-- /dal atta --}}

    {{-- <div class="container rtl mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between m-3">
                            <div>
                                <img style="height:30px;width:30px;"  src="{{asset("public/assets/front-end/png/best sellings.png")}}"
                                         alt="">
                                    <span style="margin-left:10px;text-transform: uppercase;font-weight: 700;">{{ \App\CPU\translate('best sellings')}}</span>
                            </div>
                            <div>
                                <a class="text-capitalize view-all-text"
                                    href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row ml-2 mr-3 mb-2">
                            @foreach($bestSellProduct as $key=>$bestSell)
                                @if($bestSell->product && $key<3)
                                    <div class="col-12 m-1" style="border-style: solid;
                                    border-color: #0000000d; border-radius:5px;"
                                         data-href="{{route('product',$bestSell->product->slug)}}">
                                         @if($bestSell->product->discount > 0)
                                                <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                                        @if ($bestSell->product->discount_type == 'percent')
                                                            {{round($bestSell->product->discount)}}%
                                                        @elseif($bestSell->product->discount_type =='flat')
                                                            {{\App\CPU\Helpers::currency_converter($bestSell->product->discount)}}
                                                        @endif {{\App\CPU\translate('off')}}
                                                    </span>
                                                </div>
                                            @endif
                                        <div class="row" style="padding:8px;">

                                            <div class="best-selleing-image"  >
                                                <a class="d-block d-flex justify-content-center" style="width:100%;height:100%;"
                                                    href="{{route('product',$bestSell->product->slug)}}">
                                                    <img style="border-radius:5px;"
                                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$bestSell->product['thumbnail']}}"
                                                        alt="Product"/>
                                                </a>
                                            </div>
                                            <div class="best-selling-details" style="">
                                                <h6 class="widget-product-title">
                                                    <a class="ptr"
                                                    href="{{route('product',$bestSell->product->slug)}}">
                                                        {{\Illuminate\Support\Str::limit($bestSell->product['name'],100)}}
                                                    </a>
                                                </h6>
                                                @php($bestSell_overallRating = \App\CPU\ProductManager::get_overall_rating($bestSell->product['reviews']))
                                                <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        @for($inc=0;$inc<5;$inc++)
                                                            @if($inc<$bestSell_overallRating[0])
                                                                <i class="sr-star czi-star-filled active"></i>
                                                            @else
                                                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                            @endif
                                                        @endfor
                                                        <label class="badge-style">( {{$bestSell->product->reviews_count}} )</label>
                                                    </span>
                                                </div>
                                                <div>
                                                    @if($bestSell->product->discount > 0)
                                                            <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                                {{\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)}}
                                                            </strike>
                                                    @endif
                                                </div>
                                                <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        {{\App\CPU\Helpers::currency_converter(
                                                        $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                                        )}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between m-3">
                            <div>
                                <img style="height:30px;width:30px;"  src="{{asset("public/assets/front-end/png/top-rated.png")}}"
                                         alt="">
                                    <span style="margin-left:10px;text-transform: uppercase;font-weight: 700;">{{ \App\CPU\translate('top rated')}}</span>
                            </div>
                            <div>
                                <a class="text-capitalize view-all-text"
                                    href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row ml-2 mr-3 mb-2">
                            @foreach($topRated as $key=>$top)
                                @if($top->product && $key<3)
                                    <div class="col-12 m-1" style="border-style: solid;
                                    border-color: #0000000d; border-radius:5px;"
                                         data-href="{{route('product',$top->product->slug)}}">
                                         @if($top->product->discount > 0)
                                                <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                                        @if ($top->product->discount_type == 'percent')
                                                            {{round($top->product->discount)}}%
                                                        @elseif($top->product->discount_type =='flat')
                                                            {{\App\CPU\Helpers::currency_converter($top->product->discount)}}
                                                        @endif {{\App\CPU\translate('off')}}
                                                    </span>
                                                </div>
                                            @endif
                                        <div class="row" style="padding:8px;">

                                            <div class="top-rated-image">
                                                <a class="d-block d-flex justify-content-center" style="width:100%;height:100%;"
                                                    href="{{route('product',$top->product->slug)}}">
                                                    <img style="border-radius:5px;"
                                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$top->product['thumbnail']}}"
                                                        alt="Product"/>
                                                </a>
                                            </div>
                                            <div class="top-rated-details" >
                                                <h6 class="widget-product-title">
                                                    <a class="ptr"
                                                    href="{{route('product',$top->product->slug)}}">
                                                        {{\Illuminate\Support\Str::limit($top->product['name'],100)}}
                                                    </a>
                                                </h6>
                                                @php($top_overallRating = \App\CPU\ProductManager::get_overall_rating($top->product['reviews']))
                                                <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        @for($inc=0;$inc<5;$inc++)
                                                            @if($inc<$top_overallRating[0])
                                                                <i class="sr-star czi-star-filled active"></i>
                                                            @else
                                                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                            @endif
                                                        @endfor
                                                        <label class="badge-style">( {{$top->product->reviews_count}} )</label>
                                                    </span>
                                                </div>
                                                <div>
                                                    @if($top->product->discount > 0)
                                                            <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                                {{\App\CPU\Helpers::currency_converter($top->product->unit_price)}}
                                                            </strike>
                                                    @endif
                                                </div>
                                                <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        {{\App\CPU\Helpers::currency_converter(
                                                        $top->product->unit_price-(\App\CPU\Helpers::get_product_discount($top->product,$top->product->unit_price))
                                                        )}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Banner  --}}
    {{-- <div class="container rtl mt-3 mb-3">
        <div class="row justify-content-center">
            @foreach(\App\Model\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','desc')->take(2)->get() as $banner)
                <div class="col-md-3 mt-2 mt-md-0">
                    <a href="{{$banner->url}}"
                        style="cursor: pointer;">
                         <img class="" style="width: 100%; border-radius:5px;height:auto;"
                              onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                              src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                     </a>
                </div>
            @endforeach
        </div>
    </div> --}}
    {{-- Categorized product --}}



    {{-- @foreach($home_categories as $category)
        <section class="container rtl mb-3">
            <!-- Heading-->
            <div style="background: #ffffff; padding:20px;border-radius:5px;">
                <div class="flex-around pl-4">
                    <div class="category-product-view-title " >
                        <span class="for-feature-title d-none {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}}"
                                style="font-weight: 500;font-size: 20px;{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                                {{Str::limit($category['name'],30)}}
                        </span>
                    </div>
                    <div class="category-product-view-title ml-lg-5" >
                        <span class="for-feature-title {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}}"
                                style="font-weight: 500;font-size: 20px;{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                                {{Str::limit($category['name'],30)}}
                        </span>
                    </div>
                    <div class="category-product-view-all" >
                        <a class="text-capitalize view-all-text "
                            href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                        </a>

                    </div>
                </div>

                <div class="row mt-2 mb-3 d-flex justify-content-center">
                    {{-- <div class="col-md-3 col-12 pl-3 pr-3">
                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}"
                            style="cursor: pointer;">
                             <img class="" style="width: 100%; border-radius:5px;height: 300px;"
                                  onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                  src="{{asset('storage/app/public/category')}}/{{$category['icon']}}">
                         </a>
                    </div> --}}
                     {{-- <div class="col-md-9 col-12 ">
                        <div class="row d-flex" >
                            @foreach($category['products'] as $key=>$product)
                            {{-- {{$product}} --}}
                            {{-- @if ($key<4)
                                <div class="col-md-3 col-sm-12 mt-2 mt-md-0" style="">
                                    @include('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings])
                                </div>
                            @endif
                        @endforeach
                         </div>
                    </div>


                </div>
            </div>
        </section>
    @endforeach --}}

        {{--delivery type --}}

    {{-- <div class="container rtl mb-3">
        <div class="row shipping-policy-web" style="margin-right: 0px; margin-left:0px;">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system" >
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/delivery.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('Fast Delivery all accross the country')}}
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/Payment.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('Safe Payment')}}
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/money.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('7 Days Return Policy')}}
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/Genuine.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('100% Authentic Products')}}
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

       {{-- statestics --}}
       {{-- <section class="container rtl mt-3" >
        <div class=" wow fadeInUp">
            <div class="col-lg-12 lg-heading text-center mb-60 wow fadeInUp">
                <h2  style="font-size: 30px; font-weight:800;">{{ \App\CPU\translate('Statistics')}}</h2>
            </div>
            <div class="card p-1">
                <div class="card-body" >
                    <div class="row justify-content-center" style="  box-shadow: 1px 1px 11px 11px #cfdbdf;">
                        <div class="col-xl-3 col-md-6 col-sm-12 border text-center p-2">
                            <div class="text" ><h5 id="counter" style="font-size: 48px;">1200</h5><p>Farmers</p></div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 border text-center p-2">
                            <div class="text" ><h5 id="counter1" style="font-size: 48px;">150</h5><p>Fruits & Vegetables</p></div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 border text-center p-2">
                            <div class="text" ><h5 id="counter2" style="font-size: 48px;">1500</h5><p>Tonnes harvest</p></div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 border text-center p-2">
                            <div class="text" ><h5 id="counter3" style="font-size: 48px;">13000</h5><p>Customers</p></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- statestics --}}

@endsection

@push('script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-SD7cNmH2t9Ebn3U492VlK5uu4u_RUGY&libraries=places&callback=initialize" async defer></script>
{{-- <script src=""></script>
<script src="{{ asset('public/assets/front-end') }}/js/mapInput.js"></script> --}}
{{-- <script>
  let counts=setInterval(updated);
        let upto=0;
        function updated(){
            var count= document.getElementById("counter");
            count.innerHTML=++upto + "+";
            if(upto===1200)
            {
                clearInterval(counts);
            }
        }
    let counts1=setInterval(updated1);
        let upto1=0;
        function updated1(){
            var count1= document.getElementById("counter1");
            count1.innerHTML =++upto1 + "+";
            if(upto1===150)
            {
                clearInterval(counts1);
            }
        }
        let counts2=setInterval(updated2);
        let upto2=0;
        function updated2(){
            var count2= document.getElementById("counter2");
            count2.innerHTML=++upto2 + "+";
            if(upto2===150)
            {
                clearInterval(counts2);
            }
        }
        let counts3=setInterval(updated3);
        let upto3=0;
        function updated3(){
            var count3= document.getElementById("counter3");
            count3.innerHTML=++upto3 + "+";
            if(upto3===1300)
            {
                clearInterval(counts3);
            }
        }

</script> --}}

<script>

    </script>

<script>
//    function saveCity()
//    {
//     let city = document.getElementById('city');
//     console.log(document.getElementById('city').value)
//     if(city && city.value && city.value > 0)
//     {
//         localStorage.setItem('city_id',document.getElementById('city').value);
//         window.location.href = window.location.origin +"?city="+document.getElementById('city').value
//     }
//    }

// function buy_now() {
//         addToCart('add-to-cart-form',true);
//         /* location.href = "{{route('checkout-details')}}"; */
//     }



    function initialize() {

        $('form').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        const locationInputs = document.getElementsByClassName("map-input");

        const autocompletes = [];
        const geocoder = new google.maps.Geocoder;
        for (let i = 0; i < locationInputs.length; i++) {

            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");
            const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

            const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 16.699994;
            const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 74.2450513;

            const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                center: {
                    lat: latitude,
                    lng: longitude
                },
                zoom: 13
            });
            const marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: latitude,
                    lng: longitude
                },
            });

            marker.setVisible(isEdit);

            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({
                input: input,
                map: map,
                marker: marker,
                autocomplete: autocomplete
            });
        }

        for (let i = 0; i < autocompletes.length; i++) {
            const input = autocompletes[i].input;
            const autocomplete = autocompletes[i].autocomplete;
            const map = autocompletes[i].map;
            const marker = autocompletes[i].marker;

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                marker.setVisible(false);
                const place = autocomplete.getPlace();

                geocoder.geocode({
                    'placeId': place.place_id
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        console.log(results);
                        const lat = results[0].geometry.location.lat();
                        const lng = results[0].geometry.location.lng();
                        setLocationCoordinates(autocomplete.key, lat, lng);
                    }
                });

                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    input.value = "";
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

            });
        }
    }

    function setLocationCoordinates(key, lat, lng) {
        const latitudeField = document.getElementById(key + "-" + "latitude");
        const longitudeField = document.getElementById(key + "-" + "longitude");
        latitudeField.value = lat;
        longitudeField.value = lng;
    }
</script>
    {{-- Owl Carousel --}}
    <script src="{{asset('public/assets/front-end')}}/js/owl.carousel.min.js"></script>

    <script>

 var pin_code = <?php echo (session()->get('pincode')) ?>;
    $( document ).ready(function() {
        if(!pin_code)
        {
            $('#exampleModal').modal('show');
        }
});



    cartQuantityInitialize_();

     getVariantPrice();
    $('.add-cart-form input').on('change', function () {
        getVariantPrice();
    });

     function cartQuantityInitialize_() {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');


            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
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
                    text: '{{\App\CPU\translate('Sorry, the minimum order quantity does not match')}}'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: '{{\App\CPU\translate('Sorry, stock limit exceeded')}}.'
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

        $('#flash-deal-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        });


          $('#dal_item').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 4
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#switch-veges-product').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 5
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

           $('#switch-veges-product_staples').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 4
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

        $('#web-feature-deal-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 5,
            nav: true,
            navText: ["", "<i class='fa fa-caret-right text-white ml-5'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 2
                }
            }
        });

        $('#new-arrivals-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}'></i>", "<i class='czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });



         $('#switch-staples-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-{{Session::get('direction') === "
                rtl " ? 'right' : 'left'}}'></i>", "<i class='czi-arrow-{{Session::get('direction') === "
                rtl " ? 'left' : 'right'}}'></i>"
            ],
            dots: false,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': true,
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
                    items: 3
                },
                //Small
                576: {
                    items: 3
                },
                //Medium
                768: {
                    items: 4
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
    </script>
<script>
{{-- 16/12/2022--}}
   {{-- $('#featured_products_list').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        }); --}}
        $('#fruits_vegitables').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#First_Slider').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#Make_The_Most_of_March').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#Changing_The_Way').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

        $('#Video').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#Shop_By_Mood').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

        $('#Big_Savers_This_Month').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-m'></i>", "<i class='czi-arrow-right-circle-m'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#dal_atta').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#dairy_bakery').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#snacks').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#organic-certified').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#skincare_bodycare').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#floor_cleaners').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#Shop_By_Categories').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#baby_infant').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#Stories_That_Inspire').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#Great_Memories_Begin_With_Good_Food').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#Shop_By_Diet_Type').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#top_products_for_you').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });



        $('#Community').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
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
                    items: 2
                },
                //Medium
                768: {
                    items: 4
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 8
                },
                //Extra extra large
                1800: {
                    items: 8
                }
            }
        });

        $('#top_subscribed').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });

        $('#Healthy_Kitchen_With_Wellbe').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Healthy_Kitchen_With_Wellbe1').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-w'></i>", "<i class='czi-arrow-right-circle-w'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 3
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        });
        $('#Big_Saver_combo').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Top_Deals').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Most_Popular').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#These_Deals_Wont_Last').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Zero-Waste_Categories').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Limited_Period_Offers').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

        $('#Buy_It_Again').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });

        $('#Your_Last_Viewed').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#Seasonal_Delights').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 5
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
        $('#eat_seasonal').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
        $('#Beat_The_Heat_With_These_Tips').owlCarousel({
        loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left-circle-c'></i>", "<i class='czi-arrow-right-circle-c'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('direction')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        });
</script>
    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '{{session('direction')}}': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 9
                },
                //Extra extra large
                1400: {
                    items: 9
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>



@endpush

