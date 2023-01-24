@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('Verify'))

@push('css_or_js')
    <style>
        @media(max-width:500px){
            #sign_in{
                margin-top: -23% !important;
            }
        }
        .heading{
            font-size: 32px;
        }
        .h7 {
            font-size:16px;
            color:#9e9a9a !important;
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #000;
            line-height: 0.1em;
            margin: 10px 0 20px;
        }

        .h7 span {
            background:#fff;
            padding:0 10px;
        }
        .btn-tr-bl-radius{
            border-radius: 0px 10px 0px 10px;
            padding: 5px 10px;
            width:100%;
            font-size:16px;
        }
        #carouselExampleIndicators .carousel-indicators li{
                border:100% !important;
        }
        .eye.active1{
            border: 2px solid {{$web_config['primary_color']}};
        }
        .eye{
            border-radius: 100%;
            position: relative;
            width: 2em; height: 2em;

            transition: width .3s ease-in-out, height .3s ease-in-out;
        }
        .eye::before{
            content: "";
            /* display: block; */
            position: absolute;
            width: 1em; height: 1em;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            background: {{$web_config['primary_color']}};
            border-radius: 100%;
            transition: width, height;
            transition-duration: .5s;
            transition-timing-function: ease-in-out;
        }
        .container-fluid{
            padding-right: 0px;
            padding-left: 0px;
        }
        .componentWrapper {
            border: solid lightgrey;
            border-radius: 10px;
            padding: 15px 10px 10px;
            width: 100%;
        }

        .componentWrapper .header {
            position:absolute;
            margin-top:-25px;
            margin-left:10px;
            color:grey;
            background:white;
            border-radius:10px;
            padding:0px 10px;
        }
        .input{
            height:100%;
            border:none;
        }

        div.form-item{
            position: relative;
            display: block;
            margin-bottom: 20px;
        }
        input{
            transition: all .2s ease;
        }
        input.form-style{
            color:#8a8a8a;
            display: block;
            width: 100%;
            height: 44px;
            padding: 5px 5%;
            border:1px solid #ccc;
            -moz-border-radius: 27px;
            -webkit-border-radius: 27px;
            border-radius: 27px;
            -moz-background-clip: padding;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            background-color: #fff;
            font-family:'HelveticaNeue','Arial', sans-serif;
            font-size: 105%;
            letter-spacing: .8px;
        }
        input.form-style1{
            color:#8a8a8a;
            /* display: block; */
            width: 20%;
            height: 50px;
            padding: 5px 5%;
            border:1px solid #ccc;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            -moz-background-clip: padding;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            background-color: #fff;
            font-family:'HelveticaNeue','Arial', sans-serif;
            font-size: 105%;
            letter-spacing: .8px;
            text-align: center;
        }
        div.form-item .form-style:focus{
            outline: none;
            border:1px solid lightgrey;
            color:lightgrey;
        }
        div.form-item p.formLabel {
            position: absolute;
            left:26px;
            top:2px;
            transition:all .4s ease;
            color:#bbb;
        }
        .formTop{
            top:-13px !important;
            left:26px;
            background-color: #fff;
            padding:0 5px;
            font-size: 14px;
            color:lightgrey !important;
        }
        .formStatus{
            color:#8a8a8a !important;
        }
    </style>
@endpush

@section('content')
    {{-- <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="h4 mb-1">{{\App\CPU\translate('one_step_ahead')}}</h2>
                            <p class="font-size-sm text-muted mb-4">{{\App\CPU\translate('verify_information_to_continue')}}.</p>
                        </div>
                        <form class="needs-validation_" id="sign-up-form" action="{{ route('customer.auth.verify') }}"
                              method="post">
                            @csrf
                            <div class="col-sm-12">
                                @php($email_verify_status = \App\CPU\Helpers::get_business_settings('email_verification'))
                                @php($phone_verify_status = \App\CPU\Helpers::get_business_settings('phone_verification'))
                                <div class="form-group">
                                    @if(\App\CPU\Helpers::get_business_settings('email_verification'))
                                        <label for="reg-phone" class="text-primary">
                                            *
                                            {{\App\CPU\translate('please') }}
                                            {{\App\CPU\translate('provide') }}
                                            {{\App\CPU\translate('verification') }}
                                            {{\App\CPU\translate('token') }}
                                            {{\App\CPU\translate('sent_in_your_email') }}
                                        </label>
                                    @elseif(\App\CPU\Helpers::get_business_settings('phone_verification'))
                                        <label for="reg-phone" class="text-primary">
                                            *
                                            {{\App\CPU\translate('please') }}
                                            {{\App\CPU\translate('provide') }}
                                            {{\App\CPU\translate('OTP') }}
                                            {{\App\CPU\translate('sent_in_your_phone') }}
                                        </label>
                                    @else
                                        <label for="reg-phone" class="text-primary">* {{\App\CPU\translate('verification_code') }} / {{ \App\CPU\translate('OTP')}}</label>
                                    @endif
                                    <input class="form-control" type="text" name="token" required>
                                </div>
                            </div>
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button type="submit" class="btn btn-outline-primary">{{\App\CPU\translate('verify')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-sm-12 pt-4 px-0" style="background-color: #f8e9e9f9;">
                <img class="px-4" style="height: 70px!important; width:auto;"
                        src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                        alt="{{$web_config['name']->value}}"/>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <ol class="carousel-indicators d-none">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="height:430px" src="{{asset('storage/app/public/banner/Stroke.png')}}" alt="First slide">
                            <span class="display-3 px-3">{{\App\CPU\translate('Eat')}}</span><br>
                            <span class="display-3 px-3" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('Better')}}</span>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height:430px" src="{{asset('storage/app/public/banner/Stroke.png')}}" alt="Second slide">
                            <span class="display-3 px-3">{{\App\CPU\translate('Live')}}</span><br>
                            <span class="display-3 px-3" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('Better')}}</span>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height:430px" src="{{asset('storage/app/public/banner/Stroke.png')}}" alt="Third slide">
                            <span class="display-3 px-3">{{\App\CPU\translate('Look')}}</span><br>
                            <span class="display-3 px-3" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('Better')}}</span>
                        </div>
                    </div><br>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="mx-4" id="carouselExampleIndicator" data-ride="carousel" data-interval="2000">
                    <ol class="carousel-indicators d-none">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="eye active1" tabindex="1"></div>
                                <div class="eye" tabindex="1"></div>
                                <div class="eye" tabindex="1"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="eye" tabindex="1"></div>
                                <div class="eye active1" tabindex="1"></div>
                                <div class="eye" tabindex="1"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="eye" tabindex="1"></div>
                                <div class="eye" tabindex="1"></div>
                                <div class="eye active1" tabindex="1"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <span class="display-3">Eat</span>
                <span class="display-3 " style="color: {{$web_config['primary_color']}}">Better</span> --}}

            </div>
            <div id="otp" class="col-lg-7 col-sm-12 p-5 row">
                <div class="col-2"></div>
                <div class="col-8 mt-5 pt-5">
                    <a href="{{url()->previous()}}"><i class="fa fa-long-arrow-left" style="font-size:24px; color: {{$web_config['primary_color']}}"></i></a>&nbsp  {{\App\CPU\translate('Back')}}<br>
                    <label class="heading">{{\App\CPU\translate('Welcome_Back')}}</label><br>
                    <label class="heading" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('Rohan_Khanna!')}}</label><br>
                    <label>{{\App\CPU\translate('Enter_the_')}}</label> <label style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('OTP')}}</label> <label>{{\App\CPU\translate('send_to_your_number')}}</label>
                    <div class="mt-4">
                        <form class="needs-validation_" id="sign-up-form" action="{{ route('customer.auth.verify') }}" method="post">
                            @csrf
                            <div id="form">
                                <div class="form-item">
                                    <input type="text" name="text1" id="text1" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                    <input type="text" name="text2" id="text2" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                    <input type="text" name="text3" id="text3" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                    <input type="text" name="text4" id="text4" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"s/>
                                </div>
                                    <input type="hidden" class="form-control" type="text" name="token" id="otpconacte" >
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                <div id="countdown"></div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-tr-bl-radius btn-sm string-limit">{{\App\CPU\translate('Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2 p-3">
                    {{ \App\CPU\translate('close_')}}<a href="{{route('home')}}"><i class="fa fa-close" style="color:{{$web_config['primary_color']}};border: 0.5px solid; border-radius:100%; padding:4px;"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')

<script>
    $( document ).ready(function() {
        $('header').addClass('d-none');
        document.getElementById('anouncement_2').setAttribute('style', 'display:none !important');;
        $('.bg-secondary-light').addClass('d-none');
        $('.footer').addClass('d-none');

        var timeleft = 30;
        var downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "Resend OTP";
            } else {
                document.getElementById("countdown").innerHTML = "Your OTP will expire in  " + timeleft + "s";
            }
            timeleft -= 1;
        }, 1000);

        $(".form-style1").on("keyup",function(e) {
            var text1val = $('#text1').val();
            var text2val = $('#text2').val();
            var text3val = $('#text3').val();
            var text4val = $('#text4').val();
            $('#otpconacte').val(text1val + text2val + text3val + text4val);
            console.log($('#otpconacte').val());
        });

        var container = document.getElementsByClassName("form-item")[0];
        container.onkeyup = function(e) {
            var target = e.srcElement;
            var maxLength = parseInt(target.attributes["maxlength"].value, 10);
            var myLength = target.value.length;
            if (myLength >= maxLength) {
                var next = target;
                while (next = next.nextElementSibling) {
                    if (next == null)
                        break;
                    if (next.tagName.toLowerCase() == "input") {
                        next.focus();
                        break;
                    }
                }
            }
        }

    });
</script>
@endpush
