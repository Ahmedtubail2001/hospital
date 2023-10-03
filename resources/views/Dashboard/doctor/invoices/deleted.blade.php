<!-- Deleted insurance -->
<div class="modal fade" id="delete{{ $patient_ray->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('doctor/Invoices.Delete_x-ray_details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rays.destroy', $patient_ray->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger"> {{ trans('doctor/Invoices.are_you_sure') }}</p>
                            <input type="text" class="form-control" readonly value="{{ $patient_ray->description_en }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('doctor/Invoices.Close') }}</button>
                        <button class="btn btn-success">{{ trans('doctor/Invoices.Saving_data') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
