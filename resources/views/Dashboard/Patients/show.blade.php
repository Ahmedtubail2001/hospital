@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Dashboard/patient.patient_information') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/patient.patient') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/patient.patient_information') }}

                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                    data-toggle="tab">{{ trans('Dashboard/patient.patient_information') }}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link"
                                                    data-toggle="tab">{{ trans('Dashboard/single_invoices.Invoices') }}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link"
                                                    data-toggle="tab">{{ trans('Dashboard/patient.Payments') }}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">
                                                    {{ trans('Dashboard/patient.account_statement') }}</a></li>
                                            <li class="nav-item"><a href="#tab5" class="nav-link"
                                                    data-toggle="tab">{{ trans('Dashboard/patient.X_rays') }}</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab6" class="nav-link" data-toggle="tab">
                                                    {{ trans('Dashboard/patient.Laboratory') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ trans('Dashboard/patient.Patient_name') }}</th>
                                                            <th>{{ trans('Dashboard/patient.phone_number') }}</th>
                                                            <th>{{ trans('Dashboard/patient.Email') }}</th>
                                                            <th>{{ trans('Dashboard/patient.birth_date') }}</th>
                                                            <th>{{ trans('Dashboard/patient.gender') }}</th>
                                                            <th>{{ trans('Dashboard/patient.Blood_quarter') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{ $Patient->nameLang }}</td>
                                                            <td>{{ $Patient->Phone }}</td>
                                                            <td>{{ $Patient->email }}</td>
                                                            <td>{{ $Patient->Date_Birth }}</td>
                                                            <td>
                                                                <div
                                                                    class="{{ $Patient->Gender == 1 ? 'male' : 'female' }} ml-1">
                                                                </div>
                                                                {{ $Patient->Gender == 1 ? trans('Dashboard/patient.male') : trans('Dashboard/patient.female') }}
                                                            </td>
                                                            <td>{{ $Patient->Blood_Group }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        {{-- Start Invices Patient --}}

                                        <div class="tab-pane" id="tab2">

                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ trans('Dashboard/single_invoices.Service_name') }}</th>
                                                            <th>{{ trans('Dashboard/single_invoices.Invoice_date') }}</th>
                                                            <th>{{ trans('Dashboard/single_invoices.Total_with_tax') }}
                                                            </th>
                                                            <th>{{ trans('Dashboard/single_invoices.Invoice_type') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoices as $invoice)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $invoice->Service->namelang ?? $invoice->Group->nameLang }}
                                                                </td>
                                                                <td>{{ $invoice->invoice_date }}</td>
                                                                <td>{{ $invoice->total_with_tax }}</td>

                                                                <td>
                                                                    <div
                                                                        class="{{ $invoice->type == 1 ? 'monetary' : 'Late payment' }} ml-1">
                                                                    </div>
                                                                    {{ $invoice->type == 1
                                                                        ? trans('Dashboard/single_invoices.monetary')
                                                                        : trans('Dashboard/single_invoices.Late_payment') }}
                                                                </td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="4" scope="row" class="alert alert-success">
                                                                {{ trans('Dashboard/single_invoices.Total') }}
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($invoices->sum('total_with_tax'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Invices Patient --}}



                                        {{-- Start Receipt Patient  --}}

                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ trans('Dashboard/Receipt.Date_added') }}</th>
                                                            <th> {{ trans('Dashboard/Receipt.amount') }}</th>
                                                            <th>{{ trans('Dashboard/Receipt.Description') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($receipt_accounts as $receipt_account)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $receipt_account->date }}</td>
                                                                <td>{{ $receipt_account->amount }}</td>
                                                                <td>{{ $receipt_account->descriptionlang }}</td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th scope="row" class="alert alert-success">
                                                                {{ trans('Dashboard/single_invoices.Total') }}
                                                            </th>
                                                            <td colspan="4" class="alert alert-primary">
                                                                {{ number_format($receipt_accounts->sum('amount'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Receipt Patient  --}}


                                        {{-- Start payment accounts Patient --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ trans('Dashboard/Payment.Date_added') }}</th>
                                                            <th>{{ trans('Dashboard/Payment.Description') }}</th>
                                                            <th>{{ trans('Dashboard/patient.Debit') }}</th>
                                                            <th> {{ trans('Dashboard/patient.credit') }}</th>
                                                            <th> {{ trans('Dashboard/patient.credit') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Patient_accounts as $Patient_account)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $Patient_account->date }}</td>
                                                                <td>
                                                                    @if ($Patient_account->single_invoice_id == true)
                                                                        {{ $Patient_account->invoice->Service->NameLang ?? $Patient_account->invoice->Group->NameLang }}
                                                                    @elseif($Patient_account->receipt_id == true)
                                                                        {{ $Patient_account->ReceiptAccount->DescriptionLang }}
                                                                    @elseif($Patient_account->Payment_id == true)
                                                                        {{ $Patient_account->PaymentAccount->DescriptionLang }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $Patient_account->Debit }}</td>
                                                                <td>{{ $Patient_account->credit }}</td>
                                                                <td></td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="3" scope="row" class="alert alert-success">
                                                                {{ trans('Dashboard/single_invoices.Total') }}
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($Debit = $Patient_accounts->sum('Debit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($credit = $Patient_accounts->sum('credit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-danger">
                                                                <span class="text-danger"> {{ $Debit - $credit }}
                                                                    {{ $Debit - $credit > 0 ? trans('Dashboard/patient.Debit') : trans('Dashboard/patient.credit') }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <br>

                                        </div>

                                        {{-- End payment accounts Patient --}}


                                        <div class="tab-pane" id="tab5">
                                            <p>praesentium voluptatum deleniti atque corrquas molestias excepturi sint
                                                occaecati cupiditate non provident,</p>
                                            <p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi,
                                                id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                                expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi
                                                optio cumque nihil impedit quo minus id quod maxime placeat facere
                                                possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <p>praesentium et quas molestias excepturi sint occaecati cupiditate non
                                                provident,</p>
                                            <p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi,
                                                id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                                expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi
                                                optio cumque nihil impedit quo minus id quod maxime placeat facere
                                                possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
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
