@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    اضافة سيارة جديدة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاسعاف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة سيارة
                    جديدة</span>
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
                    <form action="{{ route('Ambulance.update', 'test') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.ambulance_number') }}</label>
                                <input type="text" name="car_number" value="{{ $ambulance->car_number }}"
                                    class="form-control @error('car_number') is-invalid @enderror">
                                <input type="hidden" name="id" value="{{ $ambulance->id }}">
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.car_model_en') }}</label>
                                <input type="text" name="car_model_en" value="{{ $ambulance->car_model_en }}"
                                    class="form-control @error('car_model') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.car_model_ar') }}</label>
                                <input type="text" name="car_model_ar" value="{{ $ambulance->car_model_ar }}"
                                    class="form-control @error('car_model') is-invalid @enderror">
                            </div>


                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.Type_car') }}</label>
                                <select class="form-control" name="car_type">
                                    <option value="1" {{ $ambulance->car_type == 1 ? 'selected' : '' }}>{{ trans('Dashboard/ambulance.Owned') }}</option>
                                    <option value="2" {{ $ambulance->car_type == 2 ? 'selected' : '' }}>{{ trans('Dashboard/ambulance.Leasing') }}</option>
                                </select>
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-3">
                                <label>{{ trans('Dashboard/ambulance.driver_name_en') }}</label>
                                <input type="text" name="driver_name_en" value="{{ $ambulance->driver_name_en }}"
                                    class="form-control @error('driver_name') is-invalid @enderror">
                            </div>

                            <div class="col-3">
                                <label>{{ trans('Dashboard/ambulance.driver_name_ar') }}</label>
                                <input type="text" name="driver_name_ar" value="{{ $ambulance->driver_name_ar }}"
                                    class="form-control @error('driver_name') is-invalid @enderror">
                            </div>

                            <div class="col-3">
                                <label>{{ trans('Dashboard/ambulance.license_number') }}</label>
                                <input type="number" name="driver_license_number"
                                    value="{{ $ambulance->driver_license_number }}"
                                    class="form-control @error('driver_license_number') is-invalid @enderror">
                            </div>

                            <div class="col-6">
                                <label>{{ trans('Dashboard/ambulance.phone_number') }}</label>
                                <input type="number" name="driver_phone" value="{{ $ambulance->driver_phone }}"
                                    class="form-control @error('driver_phone') is-invalid @enderror">
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.notes_en') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_en">{{ $ambulance->notes_en }}</textarea>
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.notes_ar') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes_ar">{{ $ambulance->notes_ar }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/ambulance.status_ambulance') }}</label>
                                &nbsp;
                                <input name="is_available" {{ $ambulance->is_available == 1 ? 'checked' : '' }}
                                    value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{ trans('Dashboard/ambulance.Save_data') }}</button>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>

    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
