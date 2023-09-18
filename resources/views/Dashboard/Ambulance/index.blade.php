@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/ambulance.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('Dashboard/ambulance.ambulance') }}
                </span>
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
                        <a href="{{ route('Ambulance.create') }}"
                            class="btn btn-primary">{{ trans('Dashboard/ambulance.Add_new_ambulance') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Dashboard/ambulance.ambulance_number') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.car_model') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.Type_car') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.driver_name') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.license_number') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.phone_number') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.status_ambulance') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.notes') }}</th>
                                    <th>{{ trans('Dashboard/ambulance.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambulances as $ambulance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ambulance->car_number }}</td>
                                        <td>{{ $ambulance->CarModelLang }}</td>
                                        <td>
                                            <div class="{{ $ambulance->car_type == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $ambulance->car_type == 1 ? trans('Dashboard/ambulance.Owned') : trans('Dashboard/ambulance.Leasing') }}
                                        </td>
                                        <td>{{ $ambulance->NameLang }}</td>
                                        <td>{{ $ambulance->driver_license_number }}</td>
                                        <td>{{ $ambulance->driver_phone }}</td>
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $ambulance->is_available == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $ambulance->is_available == 1 ? trans('Dashboard/ambulance.Enabled') : trans('Dashboard/ambulance.Not_enabled') }}

                                        </td>
                                        <td>{{ $ambulance->NotesLang }}</td>
                                        <td>
                                            <a href="{{ route('Ambulance.edit', $ambulance->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Deleted{{ $ambulance->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('Dashboard.Ambulance.Deleted')
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
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
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
