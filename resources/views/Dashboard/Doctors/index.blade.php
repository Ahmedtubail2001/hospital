@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/doctor.doctor') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/doctor.view_all') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{ trans('Dashboard/doctor.add_doctors') }}
                        </button>
                    </div>

                    {{-- <div class="card-header pb-0">

                        <a href="{{ route('Doctors.create') }}" class="btn btn-primary" role="button"
                            aria-pressed="true">{{ trans('Dashboard/doctor.add_doctors') }}</a>
                        <button type="button" class="btn btn-danger"
                            id="btn_delete_all">{{ trans('doctors.delete_select') }}</button>

                    </div> --}}
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Dashboard/doctor.name') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.email') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.section') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.phone') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.appointments') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.price') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.Status') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.created_at') }}
                                    </th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.Processes') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->section->name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->appointments }}</td>
                                        <td>{{ $doctor->price }}</td>
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $doctor->status == 1 ? trans('Dashboard/doctor.Enabled') : trans('Dashboard/doctor.Not_enabled') }}
                                        </td>
                                        <td>{{ $doctor->created_at }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-toggle="modal" href="#edit1"><i class="las la-pen"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete1"><i class="las la-trash"></i></a>
                                        </td>

                                    </tr>
                                    @include('Dashboard.Doctors.edit')
                                    @include('Dashboard.Doctors.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        @include('Dashboard.Doctors.add')
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
