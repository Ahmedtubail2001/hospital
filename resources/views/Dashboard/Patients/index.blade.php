@extends('Dashboard.layouts.master')

@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/patient.patient') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/patient.Patient_list') }} </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('Patients.create') }}"
                            class="btn btn-primary">{{ trans('Dashboard/patient.Add_new_patient') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Dashboard/patient.Patient_name') }}</th>
                                    <th>{{ trans('Dashboard/patient.Email') }}</th>
                                    <th> {{ trans('Dashboard/patient.birth_date') }}</th>
                                    <th> {{ trans('Dashboard/patient.phone_number') }}</th>
                                    <th> {{ trans('Dashboard/patient.gender') }}</th>
                                    <th> {{ trans('Dashboard/patient.Blood_quarter') }}</th>
                                    <th>{{ trans('Dashboard/patient.address') }}</th>
                                    <th> {{ trans('Dashboard/patient.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Patients as $Patient)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a
                                                href="{{ route('Patients.show', $Patient->id) }}">{{ $Patient->NameLang }}</a>
                                        </td>
                                        <td>{{ $Patient->email }}</td>
                                        <td>{{ $Patient->Date_Birth }}</td>
                                        <td>{{ $Patient->Phone }}</td>
                                        <td>
                                            <div class="{{ $Patient->Gender == 1 ? 'male' : 'female' }} ml-1">
                                            </div>
                                            {{ $Patient->Gender == 1 ? trans('Dashboard/patient.male') : trans('Dashboard/patient.female') }}
                                        </td>
                                        <td>{{ $Patient->Blood_Group }}</td>
                                        <td>{{ $Patient->AddressLang }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{ trans('Dashboard/patient.Processes') }}<i
                                                        class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">

                                                    <a class="dropdown-item"
                                                        href="{{ route('Patients.edit', $Patient->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                        &nbsp;&nbsp;
                                                        {{ trans('Dashboard/patient.Edit') }} </a>

                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#Deleted{{ $Patient->id }}"><i
                                                            class="fas fa-trash"></i>&nbsp;&nbsp;
                                                        {{ trans('Dashboard/patient.Delete_Data') }} </a>

                                                    <a href="{{ route('Patients.show', $Patient->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fas fa-eye"></i> &nbsp;&nbsp;
                                                        {{ trans('Dashboard/patient.patient_information') }} </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('Dashboard.Patients.Deleted')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
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
