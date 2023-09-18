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
    {{ trans('Dashboard/insurance.edit_Insurance') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/main-sidebar_trans.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/insurance.Insurance') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('insurance.update', 'test') }}" method="post">
                        @method('PUT')
                        @csrf

                        {{-- input hidden value => id   --}}
                        <input type="hidden" name="id" value="{{ $insurances->id }}">

                        <div class="row">

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_code') }}</label>
                                <input type="text" name="insurance_code" value="{{ $insurances->insurance_code }}"
                                    class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_name') }}</label>
                                <input type="text" name="name_en" value="{{ $insurances->name_en }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Company_name') }}</label>
                                <input type="text" name="name_ar" value="{{ $insurances->name_ar }}"
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
                                    value="{{ $insurances->discount_percentage }}"
                                    class="form-control @error('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.Insurance_bearing_percentage') }} %</label>
                                <input type="number" name="Company_rate" value="{{ $insurances->Company_rate }}"
                                    class="form-control @error('Company_rate') is-invalid @enderror">
                                @error('Company_rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.notes') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_en">{{ $insurances->notes_en }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/insurance.notes') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_ar">{{ $insurances->notes_ar }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>حالة التفعيل</label>
                                &nbsp;
                                <input name="status" {{ $insurances->status == 1 ? 'checked' : '' }} value="1"
                                    type="checkbox" class="form-check-input" id="exampleCheck1">
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
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>


    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('dashboard/js/form-elements.js') }}"></script>
@endsection
