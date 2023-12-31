@extends('Dashboard.layouts.master-doctor')

@section('title')
    {{ trans('doctor/Invoices.review') }}
@stop

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <link href="{{ URL::asset('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('doctor/Invoices.Statements') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ trans('doctor/Invoices.review') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> {{ trans('doctor/Invoices.Invoice_date') }}</th>
                                    <th> {{ trans('doctor/Invoices.Service_name') }}</th>
                                    <th> {{ trans('doctor/Invoices.Patient_name') }}</th>
                                    <th> {{ trans('doctor/Invoices.Service_price') }}</th>
                                    <th> {{ trans('doctor/Invoices.discount_value') }}</th>
                                    <th> {{ trans('doctor/Invoices.Tax_rate') }}</th>
                                    <th> {{ trans('doctor/Invoices.Tax_value') }}</th>
                                    <th> {{ trans('doctor/Invoices.Total_with_tax') }}</th>
                                    <th> {{ trans('doctor/Invoices.Invoice_status') }}</th>
                                    <th> {{ trans('doctor/Invoices.Review_Date') }}</th>
                                    <th> {{ trans('doctor/Invoices.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td>{{ $invoice->Service->namelang ?? $invoice->Group->namelang }}</td>
                                        <td><a
                                                href="{{ route('Diagnostics.show', $invoice->patient_id) }}">{{ $invoice->Patient->namelang }}</a>
                                        </td>
                                        <td>{{ number_format($invoice->price, 2) }}</td>
                                        <td>{{ number_format($invoice->discount_value, 2) }}</td>
                                        <td>{{ $invoice->tax_rate }}%</td>
                                        <td>{{ number_format($invoice->tax_value, 2) }}</td>
                                        <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                        <td>
                                            @if ($invoice->invoice_status == 1)
                                                <span
                                                    class="badge badge-danger">{{ trans('doctor/Invoices.Under_procedure') }}</span>
                                            @elseif($invoice->invoice_status == 2)
                                                <span
                                                    class="badge badge-warning">{{ trans('doctor/Invoices.review') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-success">{{ trans('doctor/Invoices.Complete') }}</span>
                                            @endif
                                        </td>

                                        <td>{{ \App\Models\Diagnostic::where(['invoice_id' => $invoice->id])->first()->review_date }}
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{ trans('doctor/Invoices.Processes') }}<i
                                                        class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#add_diagnosis{{ $invoice->id }}"><i
                                                            class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;
                                                        {{ trans('doctor/Invoices.Add_diagnosis') }} </a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="text-warning far fa-file-alt"></i>&nbsp;&nbsp;
                                                        {{ trans('doctor/Invoices.Add_review') }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_password"><i
                                                            class="text-primary fas fa-x-ray"></i>&nbsp;&nbsp;
                                                        {{ trans('doctor/Invoices.Conversion_x-rays') }}</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_status"><i
                                                            class="text-warning fas fa-syringe"></i>&nbsp;&nbsp;
                                                        {{ trans('doctor/Invoices.Conversion_laboratory') }}</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete"><i
                                                            class="text-danger  ti-trash"></i>&nbsp;&nbsp;
                                                        {{ trans('doctor/Invoices.Delete_data') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('Dashboard.Doctor.invoices.add_diagnosis')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

        <!-- /row -->
    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection

@section('js')
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
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
