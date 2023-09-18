@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    {{ trans('Dashboard/patient.Edit_patient_data') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/patient.patient') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/patient.Edit_patient_data') }}</span>
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
                    <form action="{{ route('Patients.update', 'test') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <label>{{ trans('Dashboard/patient.Patient_name_en') }}</label>
                                <input type="text" name="name_en" value="{{ $Patient->name_en }}"
                                    class="form-control @error('name') is-invalid @enderror " required>
                                <input type="hidden" name="id" value="{{ $Patient->id }}">
                            </div>

                            <div class="col-3">
                                <label>{{ trans('Dashboard/patient.Patient_name_ar') }}</label>
                                <input type="text" name="name_ar" value="{{ $Patient->name_ar }}"
                                    class="form-control @error('name') is-invalid @enderror " required>
                                <input type="hidden" name="id" value="{{ $Patient->id }}">
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/patient.Email') }}</label>
                                <input type="email" name="email" value="{{ $Patient->email }}"
                                    class="form-control @error('email') is-invalid @enderror" required>
                            </div>


                            <div class="col">
                                <label>{{ trans('Dashboard/patient.birth_date') }}</label>
                                <input class="form-control fc-datepicker" value="{{ $Patient->Date_Birth }}"
                                    name="Date_Birth" type="text" required>
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-3">
                                <label>{{ trans('Dashboard/patient.phone_number') }}</label>
                                <input type="number" name="Phone" value="{{ $Patient->Phone }}"
                                    class="form-control @error('Phone') is-invalid @enderror" required>
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/patient.gender') }}</label>
                                <select class="form-control" name="Gender" required>
                                    <option value="1" {{ $Patient->Gender == 1 ? 'selected' : '' }}>
                                        {{ trans('Dashboard/patient.male') }}</option>
                                    <option value="2" {{ $Patient->Gender == 2 ? 'selected' : '' }}>
                                        {{ trans('Dashboard/patient.female') }}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/patient.Blood_quarter') }}</label>
                                <select class="form-control" name="Blood_Group" required>
                                    <option value="O-"{{ $Patient->Blood_Group == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="O+" {{ $Patient->Blood_Group == 'O+' ? 'selected' : '' }}>O+
                                    </option>
                                    <option value="A+" {{ $Patient->Blood_Group == 'A+' ? 'selected' : '' }}>A+
                                    </option>
                                    <option value="A-" {{ $Patient->Blood_Group == 'A-' ? 'selected' : '' }}>A-
                                    </option>
                                    <option value="B+" {{ $Patient->Blood_Group == 'B+' ? 'selected' : '' }}>B+
                                    </option>
                                    <option value="B-" {{ $Patient->Blood_Group == 'B-' ? 'selected' : '' }}>B-
                                    </option>
                                    <option value="AB+"{{ $Patient->Blood_Group == 'AB+' ? 'selected' : '' }}>AB+
                                    </option>
                                    <option value="AB-"{{ $Patient->Blood_Group == 'AB-' ? 'selected' : '' }}>AB-
                                    </option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('Dashboard/patient.address_en') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="Address_en">{{ $Patient->Address_en }}</textarea>
                            </div>

                            <div class="col">
                                <label>{{ trans('Dashboard/patient.address_ar') }}</label>
                                <textarea rows="5" cols="10" class="form-control" name="Address_ar">{{ $Patient->Address_ar }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{ trans('Dashboard/patient.save') }}</button>
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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
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
