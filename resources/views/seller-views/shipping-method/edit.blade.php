@extends('layouts.back-end.app-seller')
@section('title', \App\CPU\translate('Edit Shipping'))
@push('css_or_js')
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50">{{ \App\CPU\translate('shipping_method') }} {{ \App\CPU\translate('update') }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-capitalize">
                        {{ \App\CPU\translate('shipping_method_update') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.business-settings.shipping-method.update', [$method['id']]) }}"
                            method="post" style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label for="title">{{ \App\CPU\translate('title') }}</label>
                                        <input type="text" name="title" value="{{ $method['title'] }}"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label for="duration">{{ \App\CPU\translate('duration') }}</label>
                                        <input type="text" name="duration" value="{{ $method['duration'] }}"
                                            class="form-control"
                                            placeholder="{{ \App\CPU\translate('Ex') }} : 4-6 {{ \App\CPU\translate('days') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label for="duration">{{ \App\CPU\translate('No_Of_Days') }}</label>
                                        <input type="number" name="no_of_days" value="{{ $method['no_of_days'] }}"
                                            class="form-control" pattern="[0-9]"
                                            placeholder="{{ \App\CPU\translate('Ex') }} : 4-6">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label for="cost">{{ \App\CPU\translate('cost') }}</label>
                                        <input type="text" min="0" max="1000000" name="cost"
                                            value="{{ \App\CPU\BackEndHelper::usd_to_currency($method['cost']) }}"
                                            class="form-control" placeholder="{{ \App\CPU\translate('Ex') }} : 10 $">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12" style="align-self: self-end;">
                                     
                                        <label class="switch">
                                            <input type="hidden" name="free_shipping_status"
                                                class="free_shipping_status_value" value="{{ $method['free_shipping_status'] }}" />
                                            <input type="checkbox" class="free_shipping_status" id="free_shipping_status" {{ ( $method['free_shipping_status'] == 1 ) ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label> <label
                                            for="free_shipping_status">{{ \App\CPU\translate('Free_shipping') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12  {{ ( $method['free_shipping_status'] == 1 ) ? '' : 'd-none' }}" id="minimum_cart_value_div">
                                        <label
                                            for="minimum_cart_value">{{ \App\CPU\translate('Minimum_cart_value') }}</label>
                                        <input type="number" min="0" max="1000000" id="minimum_cart_value"
                                            name="minimum_cart_value" class="form-control" value="{{ $method['minimum_cart_value'] }}">
                                    </div>
                                </div>
                            </div>

                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary float-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}">{{ \App\CPU\translate('Update') }}</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // $('#minimum_cart_value_div').hide();
        $(document).on('change', '.free_shipping_status', function() {

            if ($(this).prop("checked") == true) {
                $('#minimum_cart_value_div').removeClass( "d-none" );
                $('#minimum_cart_value').prop('required', true);
                $('.free_shipping_status_value').val(1);
                $(this).val(1);
            } else if ($(this).prop("checked") == false) {
                $('#minimum_cart_value_div').addClass( "d-none" );
                $('#minimum_cart_value').prop('required', false);
                $('.free_shipping_status_value').val(0);
                $('#minimum_cart_value').val(null);
            }
        });

       
    </script>
@endpush
