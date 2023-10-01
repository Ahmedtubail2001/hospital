@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

<div>

    @if ($InvoiceSaved)
        <div class="alert alert-info"> {{ trans('Dashboard/group_invoices.data_saved') }}</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">{{ trans('Dashboard/group_invoices.data_edit') }}.</div>
    @endif

    @if ($show_table)
        @include('livewire.group_invoices.Table')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="row">

                <div class="col">
                    <label>{{ trans('Dashboard/group_invoices.Patient_name') }}</label>
                    <select wire:model="patient_id" class="form-control" required>
                        <option value="">-- {{ trans('Dashboard/group_invoices.Choose_list') }} --</option>
                        @foreach ($Patients as $Patient)
                            <option value="{{ $Patient->id }}">{{ $Patient->namelang }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>{{ trans('Dashboard/group_invoices.doctor_name') }}</label>
                    <select wire:model="doctor_id" wire:change="get_section" class="form-control"
                        id="exampleFormControlSelect1" required>
                        <option value="">-- {{ trans('Dashboard/group_invoices.Choose_list') }} --</option>
                        @foreach ($Doctors as $Doctor)
                            <option value="{{ $Doctor->id }}">{{ $Doctor->namelang }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="col">
                    <label>{{ trans('Dashboard/group_invoices.Section') }}</label>
                    <input wire:model="section_id" type="text" class="form-control" readonly>
                </div> --}}

                <div class="col">
                    <label> {{ trans('Dashboard/single_invoices.Section') }}</label>
                    <input wire:model="section_id" type="text" class="form-control" readonly>
                </div>

                <div class="col">
                    <label> {{ trans('Dashboard/group_invoices.Invoice_type') }}</label>
                    <select wire:model="type" class="form-control" {{ $updateMode == true ? 'disabled' : '' }}>
                        <option value="">-- {{ trans('Dashboard/group_invoices.Choose_list') }} --</option>
                        <option value="1"> {{ trans('Dashboard/group_invoices.monetary') }}</option>
                        <option value="2"> {{ trans('Dashboard/group_invoices.Late_payment') }}</option>
                    </select>
                </div>


            </div><br>

            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Dashboard/group_invoices.Service_name') }}</th>
                                            <th> {{ trans('Dashboard/group_invoices.Service_price') }}</th>
                                            <th> {{ trans('Dashboard/group_invoices.discount_value') }}</th>
                                            <th>{{ trans('Dashboard/group_invoices.Tax_rate') }}</th>
                                            <th> {{ trans('Dashboard/group_invoices.Tax_value') }}</th>
                                            <th> {{ trans('Dashboard/group_invoices.Total_with_tax') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <select wire:model="Group_id" class="form-control"
                                                    wire:change="get_price" id="exampleFormControlSelect1">
                                                    <option value="">--
                                                        {{ trans('Dashboard/group_invoices.Choose_list') }} --</option>
                                                    @foreach ($Groups as $Group)
                                                        <option value="{{ $Group->id }}">{{ $Group->namelang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input wire:model="price" type="text" class="form-control" readonly>
                                            </td>
                                            <td><input wire:model="discount_value" type="text" class="form-control"
                                                    readonly></td>
                                            <th><input wire:model="tax_rate" type="text" class="form-control"
                                                    readonly></th>
                                            <td><input type="text" class="form-control" value="{{ $tax_value }}"
                                                    readonly></td>
                                            <td><input type="text" class="form-control" readonly
                                                    value="{{ $subtotal + $tax_value }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>
            <input class="btn btn-outline-success" type="submit"
                value=" {{ trans('Dashboard/group_invoices.Confirm_data') }}">
        </form>
    @endif

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
