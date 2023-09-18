@extends('Dashboard.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
{{ trans('Dashboard/main-sidebar_trans.Insurance') }}
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/Insurance.Services') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/Insurance.Insurances') }}</span>
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
                <a href="{{ route('insurance.create') }}" class="btn btn-primary" role="button" aria-pressed="true">
                    {{ trans('Dashboard/insurance.Add_Insurance') }}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                                <tr class="table-secondary">
                                    <th>#</th>
                                    <th>{{ trans('Dashboard/insurance.Company_code') }}</th>
                                    <th>{{ trans('Dashboard/insurance.Company_name') }}</th>
                                    <th>{{ trans('Dashboard/insurance.discount_percentage') }}</th>
                                    <th>{{ trans('Dashboard/insurance.Insurance_bearing_percentage') }}</th>
                                    <th>{{ trans('Dashboard/insurance.status') }}</th>
                                    <th>{{ trans('Dashboard/insurance.notes') }}</th>
                                    <th>{{ trans('Dashboard/insurance.Processes') }}</th>
                                </tr>
                        </thead>

                        <tbody>
                                @foreach ($insurances as $insurance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $insurance->insurance_code }}</td>
                                    <td>{{ $insurance->NameLang }}</td>
                                    <td>{{ $insurance->discount_percentage }}</td>
                                    <td>{{ $insurance->Company_rate }}</td>
                                    <td class="{{ $insurance->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $insurance->status == 1 ? 'مفعل' : 'غير مفعل' }}</td>
                                    <td>{{ $insurance->NotesLang }}</td>
                                    <td>
                                        <a href="{{ route('insurance.edit', $insurance->id) }}" class="btn btn-sm btn-success"><i
                                                class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{ $insurance->id }}"><i
                                                class="fas fa-trash"></i>
                                        </button>
                                
                                    </td>
                                    @include('Dashboard.insurance.Deleted')
                                </tr>
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