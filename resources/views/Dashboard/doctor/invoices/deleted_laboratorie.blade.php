<!-- Deleted insurance -->
<div class="modal fade" id="deleted_laboratorie{{ $patient_Laboratorie->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('doctor/Invoices.Delete_laboratory_details') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Laboratories.destroy', $patient_Laboratorie->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger"> {{ trans('doctor/Invoices.Saving_data') }}</p>
                            <input type="text" class="form-control" readonly
                                value="{{ $patient_Laboratorie->descriptionlang }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('doctor/Invoices.Close') }}</button>
                        <button class="btn btn-danger">{{ trans('doctor/Invoices.Delete_data') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
