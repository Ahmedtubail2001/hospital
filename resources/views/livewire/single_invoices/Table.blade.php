@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection


<div class="row row-sm">
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">
                        {{ trans('Dashboard/single_invoices.Add_new_invoice') }}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> {{ trans('Dashboard/single_invoices.Service_name') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Patient_name') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Invoice_date') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.doctor_name') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Section') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Service_price') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.discount_value') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Tax_rate') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Tax_value') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Total_with_tax') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Invoice_type') }}</th>
                                <th> {{ trans('Dashboard/single_invoices.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($single_invoices as $single_invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $single_invoice->Service->nameLang }}</td>
                                    <td>{{ $single_invoice->Patient->nameLang }}</td>
                                    <td>{{ $single_invoice->invoice_date }}</td>
                                    <td>{{ $single_invoice->Doctor->nameLang }}</td>
                                    <td>{{ $single_invoice->Section->nameLang }}</td>
                                    <td>{{ number_format($single_invoice->price, 2) }}</td>
                                    <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                                    <td>{{ $single_invoice->tax_rate }}%</td>
                                    <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                                    <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                                    <td>
                                        <div
                                            class="{{ $single_invoice->type == 1 ? 'monetary' : 'Late payment' }} ml-1">
                                        </div>
                                        {{ $single_invoice->type == 1
                                            ? trans('Dashboard/single_invoices.monetary')
                                            : trans('Dashboard/single_invoices.Late_payment') }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                type="button">{{ trans('Dashboard/single_invoices.Processes') }}<i
                                                    class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    wire:click="edit({{ $single_invoice->id }})"><i
                                                        class="fas fa-edit"></i>&nbsp;&nbsp;
                                                    {{ trans('Dashboard/single_invoices.Edit') }} </a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_invoice"
                                                    wire:click="delete({{ $single_invoice->id }})"><i
                                                        class="fas fa-trash"></i>&nbsp;&nbsp;
                                                    {{ trans('Dashboard/single_invoices.Delete_Data') }} </a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    wire:click="print({{ $single_invoice->id }})"><i
                                                        class="fas fa-eye"></i>&nbsp;&nbsp;
                                                    {{ trans('Dashboard/single_invoices.Print') }} </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('livewire.single_invoices.delete')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->
</div>

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
