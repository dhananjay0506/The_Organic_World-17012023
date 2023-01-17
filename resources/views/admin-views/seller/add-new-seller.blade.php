@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('add_new_seller'))

@push('css_or_js')
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-SD7cNmH2t9Ebn3U492VlK5uu4u_RUGY&libraries=drawing,places">
    </script>
<script src={{asset("public/assets/back-end/js/multiselect-dropdown.js")}}></script>
<style>
#multiSelectElementsSelected {
border: solid 1px #000;
width: 300px;
min-height: 25px;
line-height: 30px;
padding-right: 5px;
padding-left: 5px;
float: left;
}
.multiSelectElementSelected {
line-height: 20px;
height: 20px;
background: #FFAB5C;
float: left;
padding-left: 5px;
-webkit-border-radius: 2px 2px 2px 2px;
-moz-border-radius : 2px 2px 2px 2px;
-ms-border-radius : 2px 2px 2px 2px;
-o-border-radius : 2px 2px 2px 2px;
border-radius : 2px 2px 2px 2px;
margin-right: 5px;
margin-top: 5px;
margin-bottom: 5px;
}
.multiSelectElementSelected .multiSelectClose {
float: right;
padding-right: 5px;
padding-left: 5px;
cursor: pointer;
color: #966737;
font-size: 8px;
}
#multiSelectClick {
float: left;
background: #5EBFE6;
padding: 5px;
min-height: 20px;
line-height: 20px;
border: solid 1px #000;
border-left: none;
cursor: pointer;
}
#multiSelectElements {
display: none;
width: 310px;
min-height: 20px;
line-height: 20px;
min-height: 20px;
clear: both;
border: solid 1px #000;
border-top: none;
}
.multiSelectElement {
background: #5EBFE6;
padding-right: 5px;
padding-left: 5px;
width: 300px;
cursor: pointer;
}
.multiSelectElement:nth-child(2n+1) {
background: #71E683;
}
</style>

@endpush

@section('content')
<div class="content container-fluid main-card {{Session::get('direction')}}">

    <!-- Page Title -->
    <div class="mb-4">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="{{asset('/public/assets/back-end/img/add-new-seller.png')}}" class="mb-1" alt="">
            {{\App\CPU\translate('add_new_seller')}}/{{\App\CPU\translate('WareHouse')}}
        </h2>
    </div>
    <!-- End Page Title -->

    <form class="user" action="{{route('shop.apply')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-body">
                <input type="hidden" name="status" value="approved">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2 border-bottom pb-3 mb-4 pl-4">
                    <img src="{{asset('/public/assets/back-end/img/seller-information.png')}}" class="mb-1" alt="">
                    {{\App\CPU\translate('seller_information')}}
                </h5>
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="form-group">
                            <label for="exampleFirstName" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('first_name')}}</label>
                            <input type="text" class="form-control form-control-user" id="exampleFirstName" name="f_name" value="{{old('f_name')}}" placeholder="{{\App\CPU\translate('Ex: Jhone')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleLastName" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('last_name')}}</label>
                            <input type="text" class="form-control form-control-user" id="exampleLastName" name="l_name" value="{{old('l_name')}}" placeholder="{{\App\CPU\translate('Ex: Doe')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('phone')}}</label>
                            <input type="number" class="form-control form-control-user" id="exampleInputPhone" name="phone" value="{{old('phone')}}" placeholder="{{\App\CPU\translate('Ex: +09587498')}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <center>
                                <img class="upload-img-view" id="viewer"
                                    src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                            </center>
                        </div>

                        <div class="form-group">
                            <div class="title-color mb-2 d-flex gap-1 align-items-center">Seller Image <span class="text-info">(Ratio 1:1)</span></div>
                            <div class="custom-file text-left">
                                <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                    accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label" for="customFileUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('image')}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <input type="hidden" name="status" value="approved">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2 border-bottom pb-3 mb-4 pl-4">
                    <img src="{{asset('/public/assets/back-end/img/seller-information.png')}}" class="mb-1" alt="">
                    {{\App\CPU\translate('account_information')}}
                </h5>
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('email')}}</label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="{{old('email')}}" placeholder="{{\App\CPU\translate('Ex: Jhone@company.com')}}" required>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('password')}}</label>
                        <input type="password" class="form-control form-control-user" minlength="8" id="exampleInputPassword" name="password" placeholder="{{\App\CPU\translate('Ex: 8+ Character')}}" required>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleRepeatPassword" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('confirm_password')}}</label>
                        <input type="password" class="form-control form-control-user" minlength="8" id="exampleRepeatPassword" placeholder="{{\App\CPU\translate('Ex: 8+ Character')}}" required>
                        <div class="pass invalid-feedback">{{\App\CPU\translate('Repeat')}}  {{\App\CPU\translate('password')}} {{\App\CPU\translate('not match')}} .</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2 border-bottom pb-3 mb-4 pl-4">
                    <img src="{{asset('/public/assets/back-end/img/seller-information.png')}}" class="mb-1" alt="">
                    {{\App\CPU\translate('Store')}}/{{\App\CPU\translate('Warehouse_information')}}
                </h5>

                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="shop_name" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('Store')}}/{{\App\CPU\translate('Warehouse_name')}}</label>
                        <input type="text" class="form-control form-control-user" id="shop_name" name="shop_name" placeholder="{{\App\CPU\translate('Ex: Jhone')}}" value="{{old('shop_name')}}"required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="pincode" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('select_pin_code')}}</label>
                        <select name="pincode[]" class="form-control"  multiple
                        multiselect-search="true" multiselect-select-all="true" multiselect-max-items="50">
                        @foreach ($pincode as $pincodes)
                            <option value="{{ $pincodes->pin_code }}">{{ $pincodes->pin_code }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="shop_address" class="title-color d-flex gap-1 align-items-center">{{\App\CPU\translate('Store')}}/{{\App\CPU\translate('Warehouse_address')}}</label>
                        {{-- <textarea name="shop_address" class="form-control" id="shop_address"rows="1" placeholder="{{\App\CPU\translate('Ex: Doe')}}">{{old('shop_address')}}</textarea> --}}
                         {{-- <input type="text" id="address-input" name="address" class="form-control map-input mb-2"> --}}
                         <input type="text" id="address-input" name="shop_address" class="form-control map-input mb-2">
                         <div class="form-group">
                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 form-group">
                        {{-- <label for="geo_boundaries" class="title-color d-flex gap-1 align-items-center">Shop Geo Boundaries</label>
                    <div id="map_canvas" style="width:450px; height:450px;"></div>
                    <form method="post" accept-charset="utf-8" id="map_form">
                        <input type="hidden" class="form-control" name="geo_boundry" value="" id="vertices" />
                        <input type="button" name="save" value="Save!"
                            id="save" />
                    </form> --}}
                    {{-- <label>Store Pin Codes</label>
                    <input type="text" id="" name="pin_code" class="form-control mb-2"> --}}
                </div>
                    <div class="col-sm-6 my-3">
                        {{-- <div class="form-group">
                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                        </div> --}}
                    </div>
                                            <div class="form-group">
                                    <input class="form-control" type="hidden" name="lat" id="address-latitude" onchange="Lat_long()"  />


                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="longt" id="address-longitude"  onchange="Lat_long()" />

                                </div>
                                        </div>
                    <div class="col-lg-6 form-group">
                        <center>
                            <img class="upload-img-view" id="viewerLogo"
                                src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                        </center>

                        <div class="mt-4">
                            <div class="d-flex gap-1 align-items-center title-color mb-2">
                            {{\App\CPU\translate('Store')}}/{{\App\CPU\translate('Warehouse_logo')}}
                                <span class="text-info">(Ratio 1 :1)</span>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="logo" id="LogoUpload" class="custom-file-input"
                                    accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label" for="LogoUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('logo')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <center>
                            <img class="upload-img-view upload-img-view__banner" id="viewerBanner"
                                    src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                        </center>

                        <div class="mt-4">
                            <div class="d-flex gap-1 align-items-center title-color mb-2">
                            {{\App\CPU\translate('Store')}}/{{\App\CPU\translate('Warehouse_banner')}}
                                <span class="text-info">(Ratio 3:1)</span>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="banner" id="BannerUpload" class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label" for="BannerUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('Banner')}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-end gap-10">
                    <button type="reset" onclick="resetBtn()" class="btn btn-secondary">{{\App\CPU\translate('reset')}} </button>
                    <button type="submit" class="btn btn--primary btn-user" id="apply">{{\App\CPU\translate('submit')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


<script>
    function resetBtn(){
        let placeholderImg = $("#placeholderImg").data('img');
        $('#viewer').attr('src', placeholderImg);
        $('#viewerBanner').attr('src', placeholderImg);
        $('#viewerLogo').attr('src', placeholderImg);
        $('.spartan_remove_row').click();
    }

    function openInfoWeb()
    {
        var x = document.getElementById("website_info");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@push('script')
<script>
$( document ).ready(function() {
     initialize()
});
</script>
@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif
<script>
    $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#apply').removeAttr('disabled');
            } else {
                $('#apply').attr('disabled', 'disabled');
            }

        });

    $('#exampleInputPassword ,#exampleRepeatPassword').on('keyup',function () {
        var pass = $("#exampleInputPassword").val();
        var passRepeat = $("#exampleRepeatPassword").val();
        if (pass==passRepeat){
            $('.pass').hide();
        }
        else{
            $('.pass').show();
        }
    });
    $('#apply').on('click',function () {

        var image = $("#image-set").val();
        if (image=="")
        {
            $('.image').show();
            return false;
        }
        var pass = $("#exampleInputPassword").val();
        var passRepeat = $("#exampleRepeatPassword").val();
        if (pass!=passRepeat){
            $('.pass').show();
            return false;
        }


    });
    function Validate(file) {
        var x;
        var le = file.length;
        var poin = file.lastIndexOf(".");
        var accu1 = file.substring(poin, le);
        var accu = accu1.toLowerCase();
        if ((accu != '.png') && (accu != '.jpg') && (accu != '.jpeg')) {
            x = 1;
            return x;
        } else {
            x = 0;
            return x;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewer').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileUpload").change(function () {
        readURL(this);
    });

    function readlogoURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewerLogo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readBannerURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewerBanner').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#LogoUpload").change(function () {
        readlogoURL(this);
    });
    $("#BannerUpload").change(function () {
        readBannerURL(this);
    });
</script>

<script>

onchange="myFunction(document.getElementById('address-latitude'))";

function myFunction(){
    alert();
}

 var lat_v = 16.691307;
 var long_v  = 74.244865;
      function Lat_long(){
        alert("OOPS");
       var lat_v = document.getElementById('address-latitude').getAttribute("value") && document.getElementById('address-latitude').getAttribute("value") != ''  ?  document.getElementById('address-latitude').value() : 16.691307;
        var long_v = document.getElementById('address-longitude').getAttribute("value") && document.getElementById('address-longitude').getAttribute("value") != '' ? document.getElementById('address-longitude').value() : 74.244865;
        console.log(lat_v);
        console.log(long_v);

      }

        var map; // Global declaration of the map
        var iw = new google.maps.InfoWindow(); // Global declaration of the infowindow
        var lat_longs = new Array();
        var markers = new Array();
        var drawingManager;
    //   function intializeBoundariesMap()
    //   {
    //     document.getElementById('vertices') ? document.getElementById('vertices').value = "" : '';
    //     let lat = document.getElementById('address-latitude') && document.getElementById('address-latitude').value != ''  ?  document.getElementById('address-latitude').value : 16.691307;
    //     let lng = document.getElementById('address-longitude') && document.getElementById('address-longitude').value != ''  ?  document.getElementById('address-longitude').value : 16.691307;
    //     var ltlng = new google.maps.LatLng(lat , lng);
    //     let myOptions = {
    //             zoom: 13,
    //             center: ltlng,
    //             mapTypeId: google.maps.MapTypeId.ROADMAP
    //         }
    //     let map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    //     drawingManager = new google.maps.drawing.DrawingManager({drawingMode: google.maps.drawing.OverlayType.POLYGON,drawingControl: true,drawingControlOptions: {position: google.maps.ControlPosition.TOP_CENTER,drawingModes: [google.maps.drawing.OverlayType.POLYGON]},polygonOptions: {editable: true}});
    //     drawingManager.setMap(map);
    //     google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {var newShape = event.overlay;newShape.type = event.type;});
    //     google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {overlayClickListener(event.overlay);$('#vertices').val(event.overlay.getPath().getArray());});

    //   }
        function initialize() {
            var myLatlng = new google.maps.LatLng(lat_v , long_v);
            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            // map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            // drawingManager = new google.maps.drawing.DrawingManager({
            //     drawingMode: google.maps.drawing.OverlayType.POLYGON,
            //     drawingControl: true,
            //     drawingControlOptions: {
            //         position: google.maps.ControlPosition.TOP_CENTER,
            //         drawingModes: [google.maps.drawing.OverlayType.POLYGON]
            //     },
            //     polygonOptions: {
            //         editable: true
            //     }
            // });
            // drawingManager.setMap(map);

            // google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
            //     var newShape = event.overlay;
            //     newShape.type = event.type;
            // });

            // google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
            //     overlayClickListener(event.overlay);
            //     $('#vertices').val(event.overlay.getPath().getArray());
            // });


            //
                $('form').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

         //map = new google.maps.Map(document.getElementById("address-map"), myOptions);
        const locationInputs = document.getElementsByClassName("map-input");

        const autocompletes = [];
        const geocoder = new google.maps.Geocoder;
        for (let i = 0; i < locationInputs.length; i++) {

            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");

             console.log(fieldKey);
            const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

            const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 16.699994;
            const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 74.2450513;

            const map_1 = new google.maps.Map(document.getElementById('address-map'), {
                center: {
                    lat: 16.699994,
                    lng: 74.2450513
                },
                zoom: 13
            });
            const marker = new google.maps.Marker({
                map: map_1,
                position: {
                    lat: 16.699994,
                    lng: 74.2450513
                },
            });

            marker.setVisible(true);

            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({
                input: input,
                map: map_1,
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
                        // intializeBoundariesMap();
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

        function overlayClickListener(overlay) {
            google.maps.event.addListener(overlay, "mouseup", function(event) {
                $('#vertices').val(overlay.getPath().getArray());
            });
        }
        initialize();

        $(function() {
            $('#save').click(function() {
                //iterate polygon vertices?
                console.log(document.getElementById('vertices').value);
            });
        });

         function setLocationCoordinates(key, lat, lng) {
        const latitudeField = document.getElementById(key + "-" + "latitude");
        const longitudeField = document.getElementById(key + "-" + "longitude");
        latitudeField.value = lat;
        longitudeField.value = lng;
    }
    </script>
@endpush
