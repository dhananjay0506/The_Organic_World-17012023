@extends('layouts.front-end.app')
@section('title', \App\CPU\translate('Login'))
@push('css_or_js')
    <style>
        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: {{$web_config['primary_color']}};
        }

        .for-no-account {
            margin: auto;
            text-align: center;
        }
    </style>

    <style>
        .input-icons i {
            /* position: absolute; */
            cursor: pointer;
        }

        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }

        .icon {
            padding: 9% 0 0 0;
            min-width: 40px;
        }

        .input-field {
            width: 94%;
            padding: 10px 0 10px 10px;
            text-align: center;
            border-right-style: none;
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

        .btn-tr-bl-radius2{
            border-radius: 0px 10px 0px 10px;
            padding: 1px 10px;
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
     {{-- <div class="container py-4 py-lg-5 my-4"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <h2 class="h4 mb-1">{{\App\CPU\translate('sign_in')}}</h2>
                        <hr class="mt-2"> --}}
                        {{-- <h3 class="font-size-base pt-4 pb-2">{{\App\CPU\translate('or_using_form_below')}}</h3> --}}
                        {{-- <form class="needs-validation mt-2" autocomplete="off" action="{{route('customer.auth.login')}}"
                              method="post" id="form-id">
                            @csrf
                            <div class="form-group">
                                <label for="si-email">{{\App\CPU\translate('email_address')}}
                                    / {{\App\CPU\translate('phone')}}</label>
                                <input class="form-control" type="text" name="user_id" id="si-email"
                                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                       value="{{old('user_id')}}"
                                       placeholder="{{\App\CPU\translate('Enter_email_address_or_phone_number')}}"
                                       required>
                                <div
                                    class="invalid-feedback">{{\App\CPU\translate('please_provide_valid_email_or_phone_number')}}
                                    .
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="si-password">{{\App\CPU\translate('password')}}</label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                           style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">

                                <div class="form-group">
                                    <input type="checkbox"
                                           class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"
                                           name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="" for="remember">{{\App\CPU\translate('remember_me')}}</label>
                                </div>
                                <a class="font-size-sm" href="{{route('customer.auth.recover-password')}}">
                                    {{\App\CPU\translate('forgot_password')}}?
                                </a>
                            </div> --}}
                            {{-- recaptcha --}}
                            {{-- @php($recaptcha = \App\CPU\Helpers::get_business_settings('recaptcha'))
                            @if(isset($recaptcha) && $recaptcha['status'] == 1)
                                <div id="recaptcha_element" style="width: 100%;" data-type="image"></div>
                                <br/>
                            @else
                                <div class="row p-2">
                                    <div class="col-6 pr-0">
                                        <input type="text" class="form-control form-control-lg" name="default_captcha_value" value=""
                                            placeholder="{{\App\CPU\translate('Enter captcha value')}}" style="border: none" autocomplete="off">
                                    </div>
                                    <div class="col-6 input-icons" style="background-color: #FFFFFF; border-radius: 5px;">
                                        <a onclick="javascript:re_captcha();">
                                            <img src="{{ URL('/customer/auth/code/captcha/1') }}" class="input-field" id="default_recaptcha_id" style="display: inline;width: 90%; height: 75%">
                                            <i class="tio-refresh icon"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif --}}
                            {{-- <button class="btn btn-primary btn-block btn-shadow"
                                    type="submit">{{\App\CPU\translate('sign_in')}}</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 flex-between row p-0" style="direction: {{ Session::get('direction') }}">
                                <div class="mb-3 {{Session::get('direction') === "rtl" ? '' : 'ml-2'}}">
                                    <h6>{{ \App\CPU\translate('no_account_Sign_up_now') }}</h6>
                                </div>
                                <div class="mb-3 {{Session::get('direction') === "rtl" ? 'ml-2' : ''}}">
                                    <a class="btn btn-outline-primary"
                                       href="{{route('customer.auth.sign-up')}}">
                                        <i class="fa fa-user-circle"></i> {{\App\CPU\translate('sign_up')}}
                                    </a>
                                </div>
                            </div>
                            @foreach (\App\CPU\Helpers::get_business_settings('social_login') as $socialLoginService)
                                @if (isset($socialLoginService) && $socialLoginService['status']==true)
                                    <div class="col-sm-6 text-center mb-1">
                                        <a class="btn btn-outline-primary"
                                           href="{{route('customer.auth.service-login', $socialLoginService['login_medium'])}}"
                                           style="width: 100%">
                                            <i class="czi-{{ $socialLoginService['login_medium'] }} mr-2 ml-n1"></i>{{\App\CPU\translate('sign_in_with_'.$socialLoginService['login_medium'])}}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
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
            <div id="singin" class="col-lg-7 col-sm-12 row">
                <div class="col-2"></div>
                <div class="col-8 mt-5 pt-5">
                    <label class="heading">{{\App\CPU\translate('Welcome_to')}}</label><br>
                    <label class="heading" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('The_Organic_World')}}</label><br>
                    <label>{{\App\CPU\translate('Your_journey_to')}}</label> <label style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('better_choices')}}</label> <label>{{\App\CPU\translate('being_now!')}}</label>
                    <button id="signinbtn" class="btn btn-primary btn-tr-bl-radius btn-sm string-limit" type="button"><i class="fa fa-phone" style="color:white;margin-right:10px"></i>{{ \App\CPU\translate('Sign_in_with_Phone_Number')}}</button>
                    <label class="h7 mt-4"><span>OR</span></label>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mt-2" style="height:55px;">
                            <div class="card p-3" style="background-color:#f7f7f7">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <img class="logo-image lazyload" src="https://static.cdnlogo.com/logos/g/35/google-icon.svg" data-src="https://static.cdnlogo.com/logos/g/35/google-icon.svg" alt="Google Icon Logo Vector SVG">
                                    </div>
                                    <div class="col-8">
                                        {{ \App\CPU\translate('Google')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2" style="height:55px;">
                            <div class="card p-3" style="background-color:#f7f7f7">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <img class="logo-image lazyload" src="https://i.pinimg.com/564x/d5/18/ec/d518eceea19f4b1a2ee032ddc634dd7d.jpg" style="height:30px; width:40px;">
                                    </div>
                                    <div class="col-8">
                                        {{ \App\CPU\translate('Facebook')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="col-6">
                            {{ \App\CPU\translate('New_at_the_organic_world')}}?
                        </div>
                        <div class="col-6">
                            <button class="btn string-limit btn-tr-bl-radius2" type="button" style="border-color:{{$web_config['primary_color']}};color:{{$web_config['primary_color']}};">{{ \App\CPU\translate('Sign_In')}}</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 p-5">
                            <img  src="{{asset('storage/app/public/banner/image 49.png')}}" alt="Second slide">
                        </div>
                        <div class="col-lg-6 col-sm-12 p-5">
                            <img src="{{asset('storage/app/public/banner/image 48.png')}}" alt="Second slide">
                        </div>
                    </div>
                </div>
                <div class="col-2 p-3">
                    {{ \App\CPU\translate('close_')}}<a href="{{route('home')}}"><i class="fa fa-close" style="color:{{$web_config['primary_color']}};border: 0.5px solid; border-radius:100%; padding:4px;"></i></a>
                </div>
            </div>

            <div id="phonenumber" class="col-lg-7 col-sm-12 p-5 row">
                <div class="col-2"></div>
                <div class="col-8 mt-5 pt-5">
                    <a id="back"><i class="fa fa-long-arrow-left" style="font-size:24px; color: {{$web_config['primary_color']}}"></i></a>&nbsp  {{\App\CPU\translate('Back')}}<br>
                    <label class="heading">{{\App\CPU\translate('Sign_in')}}</label><br>
                    <label class="heading" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('with_your_number')}}</label><br>
                    <label>{{\App\CPU\translate('Enter_the_')}}</label> <label style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('phone_number')}}</label> <label>{{\App\CPU\translate('associated_with_your_account')}}</label>
                    <div class="mt-4">

                        <form class="needs-validation mt-2" autocomplete="off" action="{{route('customer.auth.login')}}" method="post" id="form-id">
                            @csrf
                            <div id="form">
                                <div class="form-item">
                                    <p class="formLabel">{{\App\CPU\translate('Phone_number')}}</p>
                                    <input class="form-style" type="text" name="user_id" id="si-email"
                                       value="{{old('user_id')}}"
                                       required>
                                        <div
                                            class="invalid-feedback">{{\App\CPU\translate('please_provide_valid_email_or_phone_number')}}
                                            .
                                        </div>

                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary btn-tr-bl-radius btn-block btn-shadow"
                                    type="submit">{{\App\CPU\translate('Proceed')}}</button>

                                    {{-- <button id="otpbtn" class="btn btn-primary btn-sm string-limit" type="button" style="border-radius: 0px 5px 0px 5px; width:100%;font-size:16px">{{ \App\CPU\translate('Proceed')}}</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2 p-3">
                    {{ \App\CPU\translate('close_')}}<a href="{{route('home')}}"><i class="fa fa-close" style="color:{{$web_config['primary_color']}};border: 0.5px solid; border-radius:100%; padding:4px;"></i></a>
                </div>
            </div>

            {{-- <div id="otp" class="col-lg-7 col-sm-12 p-5 row">
                <div class="col-2"></div>
                <div class="col-8 mt-5 pt-5">
                    <a id="back2"><i class="fa fa-long-arrow-left" style="font-size:24px; color: {{$web_config['primary_color']}}"></i></a>&nbsp  {{\App\CPU\translate('Back')}}<br>
                    <label class="heading">{{\App\CPU\translate('Welcome_Back')}}</label><br>
                    <label class="heading" style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('Rohan_Khanna!')}}</label><br>
                    <label>{{\App\CPU\translate('Enter_the_')}}</label> <label style="color: {{$web_config['primary_color']}}">{{\App\CPU\translate('OTP')}}</label> <label>{{\App\CPU\translate('send_to_your_number')}}</label>
                    <div class="mt-4">
                        <div id="form">
                            <div class="form-item">
                                <input type="text" name="text1" id="text1" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                <input type="text" name="text2" id="text2" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                <input type="text" name="text3" id="text3" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"/>
                                <input type="text" name="text4" id="text4" class="form-style1" autocomplete="off" maxlength="1" pattern="[0-9]+"s/>
                            </div>
                            <div id="countdown" ></div>
                            <div class="mt-4">
                                <button class="btn btn-primary btn-sm string-limit" type="button" style="border-radius: 0px 5px 0px 5px; width:100%;font-size:16px">{{ \App\CPU\translate('Submit')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 p-3">
                    {{ \App\CPU\translate('close_')}}<a href="{{route('home')}}"><i class="fa fa-close" style="color:{{$web_config['primary_color']}};border: 0.5px solid; border-radius:100%; padding:4px;"></i></a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('script')

    {{-- recaptcha scripts start --}}
    {{-- @if(isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{ \App\CPU\Helpers::get_business_settings('recaptcha')['site_key'] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                defer></script>
        <script>
            $("#form-id").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{\App\CPU\translate('Please check the recaptcha')}}");
                }
            });
        </script>
    @else
        <script type="text/javascript">
            function re_captcha() {
                $url = "{{ URL('/customer/auth/code/captcha') }}";
                $url = $url + "/" + Math.random();
                document.getElementById('default_recaptcha_id').src = $url;
                console.log('url: '+ $url);
            }
        </script>
    @endif --}}
    {{-- recaptcha scripts end --}}
    <script>
        $( document ).ready(function() {
            console.log('hii');
            $('header').addClass('d-none');
            document.getElementById('anouncement').setAttribute('style', 'display:none !important');
            // document.getElementById('anouncement_2').setAttribute('style', 'display:none !important');
            $('.bg-secondary-light').addClass('d-none');
            $('.footer').addClass('d-none');
            $("#phonenumber").hide();
            $("#otp").hide();

            $("#signinbtn").click(function(){
                $("#singin").hide();
                $("#phonenumber").show();
                $("#otp").hide();
            });

            $("#back").click(function(){
                $("#singin").show();
                $("#phonenumber").hide();
                $("#otp").hide();
            });

            var formInputs = $('input[type="text"]');
            formInputs.focus(function() {
                $(this).parent().children('p.formLabel').addClass('formTop');
            });
        });
    </script>
@endpush
