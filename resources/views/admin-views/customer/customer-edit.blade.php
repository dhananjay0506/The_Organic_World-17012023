@extends('layouts.back-end.app')
{{--@section('title','Customer')--}}
@section('title', \App\CPU\translate('Customer Details'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
      
        <!-- Page Header -->
        <div class="d-print-none pb-2">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item">
                                <a class="breadcrumb-link"
                                   href="{{route('admin.customer.list')}}">
                                    {{\App\CPU\translate('Customers')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{\App\CPU\translate('Customer details')}}</li>
                        </ol>
                    </nav>

                    <div class="d-sm-flex align-items-sm-center">
                        <h1 class="page-header-title">{{\App\CPU\translate('Customer ID')}} #{{$customer['id']}}</h1>
                        <span class="{{Session::get('direction') === "rtl" ? 'mr-2 mr-sm-3' : 'ml-2 ml-sm-3'}}">
                        <i class="tio-date-range">
                        </i> {{\App\CPU\translate('Joined At')}} : {{date('d M Y H:i:s',strtotime($customer['created_at']))}}
                        </span>
                    </div>
                </div>


            </div>
        </div>
        <!-- End Page Header -->

        <form action="{{route('admin.customer.update',[$customer['id']])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card col-12">
                        <div class="row m-1">
                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                <label for="name">{{\App\CPU\translate('Name')}}</label>
                                <input class="form-control" name="name" type="text" value="{{$customer->name}}" id="name">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                <label for="f_name">{{\App\CPU\translate('frist_name')}}</label>
                                <input class="form-control" name="f_name" type="text" value="{{$customer->f_name}}" id="f_name">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                <label for="l_name">{{\App\CPU\translate('last_name')}}</label>
                                <input class="form-control" name="l_name" type="text" value="{{$customer->l_name}}" id="l_name">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                <label for="email">{{\App\CPU\translate('Email')}}</label>
                                <input class="form-control" name="email" type="email" value="{{$customer->email}}" id="email" readonly  style="cursor: no-drop; background-color: #f6f9fc;">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                <label for="phone">{{\App\CPU\translate('Phone')}}</label>
                                <input class="form-control" name="phone" type="phone" value="{{$customer->phone}}" id="phone">
                            </div>
                        </div>
                        <div class="m-1 text-right">
                            <button type="submit" class="btn btn-primary">{{\App\CPU\translate('Update')}}</button>
                        </div>
            </div>
           
        </form>
        <!-- End Row -->
    </div>
@endsection

@push('script_2')

   
@endpush
