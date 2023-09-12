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
                    <a href="{{ route('Doctors.create') }}" class="btn btn-primary" role="button"
                        aria-pressed="true">{{ trans('Dashboard/doctor.add_doctors') }}</a>

                    <button type="button" class="btn btn-danger"
                        id="btn_delete_all">{{ trans('Dashboard/doctor.delete_select') }}
                    </button>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0"> <input name="select_all" id="example-select-all"
                                            type="checkbox" /> </th>
                                    <th class="wd-15p border-bottom-0"> {{ trans('Dashboard/doctor.img') }}
                                    </th>
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
                                    {{-- <th class="wd-20p border-bottom-0">{{ trans('Dashboard/doctor.price') }} --}}
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
                                        <td>
                                            <input type="checkbox" name="delete_select" id="delete_select_check"
                                                value="{{ $doctor->id }}" class="delete_select">
                                        </td>
                                        <td>
                                            @if ($doctor->image)
                                                <img src="{{ Url::asset('Dashboard/img/doctors/' . $doctor->image->filename) }}"
                                                    height="50px" width="50px" alt="">
                                            @else
                                                <img src="{{ Url::asset('Dashboard/img/doctors/doctor_default.png') }}"
                                                    height="50px" width="50px" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $doctor->nameLang }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->section->nameLang }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>

                                            @foreach ($doctor->doctorappointments as $appointments)
                                                <span class="badge badge-primary p-1">
                                                    {{ $appointments->nameLang }}
                                                </span>
                                            @endforeach

                                        </td>
                                        {{-- <td>{{ $doctor->price }}</td> --}}
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $doctor->status == 1 ? trans('Dashboard/doctor.Enabled') : trans('Dashboard/doctor.Not_enabled') }}
                                        </td>
                                        <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{ trans('Dashboard/doctor.Processes') }}<i
                                                        class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item"
                                                        href="{{ route('Doctors.edit', $doctor->id) }}"><i
                                                            style="color: #0ba360"
                                                            class="text-success ti-user"></i>&nbsp;&nbsp;
                                                        {{ trans('Dashboard/doctor.edit_data') }}</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_password{{ $doctor->id }}"><i
                                                            class="text-primary ti-key"></i>&nbsp;&nbsp;{{ trans('Dashboard/doctor.change_password') }}</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_status{{ $doctor->id }}"><i
                                                            class="text-warning ti-back-right"></i>&nbsp;&nbsp;
                                                        {{ trans('Dashboard/doctor.Status_change') }}</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete{{ $doctor->id }}"><i
                                                            class="text-danger  ti-trash"></i>&nbsp;&nbsp;{{ trans('Dashboard/doctor.delete_data') }}</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    {{-- @include('Dashboard.Doctors.edit') --}}
                                    @include('Dashboard.Doctors.delete')
                                    @include('Dashboard.Doctors.delete_select')
                                    @include('Dashboard.Doctors.update_password')
                                    @include('Dashboard.Doctors.update_status')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>

    <script>
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("input[id=delete_select_check]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
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
