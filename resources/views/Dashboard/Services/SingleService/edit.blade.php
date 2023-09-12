<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/Service.edit_Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Service.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">

                    <div class="modal-body">
                        <label for="exampleInputPassword1">{{ trans('Dashboard/Service.name_en') }}</label>
                        <input type="text" name="name_en" class="form-control" id="name_en"
                            value="{{ $service->name_en }}">
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputPassword1">{{ trans('Dashboard/Service.name_ar') }}</label>
                        <input type="text" name="name_ar" class="form-control" id="name_ar"
                            value="{{ $service->name_ar }}">
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputPassword1">{{ trans('Dashboard/Service.description_en') }}</label>
                        <input type="text" name="description_en" class="form-control"
                            value="{{ $service->description_en }}">
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputPassword1">{{ trans('Dashboard/Service.description_ar') }}</label>
                        <input type="text" name="description_en" class="form-control"
                            value="{{ $service->description_ar }}">
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputPassword1">{{ trans('Dashboard/Service.price') }}</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ $service->price }}">
                    </div>
                    <div class="form-group modal-body">
                        <label for="status">{{ trans('Dashboard/Service.Status') }}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="{{ $service->status }}" selected>
                                {{ $service->status == 1 ? trans('Dashboard/doctor.Enabled') : trans('Dashboard/doctor.Not_enabled') }}
                            </option>
                            <option value="1">{{ trans('Dashboard/doctor.Enabled') }}</option>
                            <option value="0">{{ trans('Dashboard/doctor.Not_enabled') }}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/sections_trans.Close') }}</button>
                    <button type="submit"
                        class="btn btn-primary">{{ trans('Dashboard/sections_trans.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
