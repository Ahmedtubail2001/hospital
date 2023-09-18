@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('Dashboard/insurance.Add_Insurance') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/insurance.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/insurance.Insurances') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('insurance.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_code') }}</label>
                                <input type="text" name="insurance_code" value="{{ old('insurance_code') }}"
                                    class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_name_en') }}</label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_name_ar') }}</label>
                                <input type="text" name="name_ar" value="{{ old('name_ar') }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.discount_percentage') }} %</label>
                                <input type="number" name="discount_percentage"
                                    class="form-control @error('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Insurance_bearing_percentage') }} %</label>
                                <input type="number" name="Company_rate"
                                    class="form-control @error('Company_rate') is-invalid @enderror">
                                @error('Company_rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.notes_en') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_en"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.notes_ar') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_ar"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{ trans('Dashboard/insurance.save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @include('Dashboard.layouts.js')
@endsection
