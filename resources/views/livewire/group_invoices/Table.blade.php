@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection


<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">
    {{ trans('Dashboard/group_invoices.Add_new_invoice') }}</button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('Dashboard/group_invoices.Service_name') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Patient_name') }}</th>
                <th> {{ trans('Dashboard/group_invoices.Invoice_date') }}</th>
                <th>{{ trans('Dashboard/group_invoices.doctor_name') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Section') }}</th>
                <th> {{ trans('Dashboard/group_invoices.Service_price') }}</th>
                <th> {{ trans('Dashboard/group_invoices.Tax_value') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Tax_rate') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Tax_value') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Total_with_tax') }}</th>
                <th> {{ trans('Dashboard/group_invoices.Invoice_type') }}</th>
                <th>{{ trans('Dashboard/group_invoices.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($group_invoices as $group_invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $group_invoice->Group->namelang }}</td>
                    <td>{{ $group_invoice->Patient->namelang }}</td>
                    <td>{{ $group_invoice->invoice_date }}</td>
                    <td>{{ $group_invoice->Doctor->namelang }}</td>
                    <td>{{ $group_invoice->Section->namelang }}</td>
                    <td>{{ number_format($group_invoice->price, 2) }}</td>
                    <td>{{ number_format($group_invoice->discount_value, 2) }}</td>
                    <td>{{ $group_invoice->tax_rate }}%</td>
                    <td>{{ number_format($group_invoice->tax_value, 2) }}</td>
                    <td>{{ number_format($group_invoice->total_with_tax, 2) }}</td>
                    <td>
                        <div class="{{ $group_invoice->type == 1 ? 'monetary' : 'Late payment' }} ml-1">
                        </div>
                        {{ $group_invoice->type == 1
                            ? trans('Dashboard/group_invoices.monetary')
                            : trans('Dashboard/group_invoices.Late_payment') }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                type="button">{{ trans('Dashboard/single_invoices.Processes') }}<i
                                    class="fas fa-caret-down mr-1"></i></button>
                            <div class="dropdown-menu tx-13">

                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    wire:click="edit({{ $group_invoice->id }})"><i
                                        class="fas fa-edit"></i>&nbsp;&nbsp;
                                    {{ trans('Dashboard/single_invoices.Edit') }} </a>

                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#delete_invoice" wire:click="delete({{ $group_invoice->id }})"><i
                                        class="fas fa-trash"></i>&nbsp;&nbsp;
                                    {{ trans('Dashboard/single_invoices.Delete_Data') }} </a>

                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    wire:click="print({{ $group_invoice->id }})"><i
                                        class="fas fa-eye"></i>&nbsp;&nbsp;
                                    {{ trans('Dashboard/single_invoices.Print') }} </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
    </table>
    @include('livewire.group_invoices.delete')
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
