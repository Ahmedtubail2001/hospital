<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/Service.add_Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Service.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="name">{{ trans('Dashboard/Service.name_en') }}</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" ><br>

                    <label for="name">{{ trans('Dashboard/Service.name_ar') }}</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control"><br>

                    <label for="description">{{ trans('Dashboard/Service.description_en') }}</label>
                    <textarea class="form-control" name="description_en" id="description" rows="3"></textarea>

                    <label for="description">{{ trans('Dashboard/Service.description_ar') }}</label>
                    <textarea class="form-control" name="description_ar" id="description" rows="3"></textarea>

                    <label for="price">{{ trans('Dashboard/Service.price') }}</label>
                    <input type="number" name="price" id="price" class="form-control"><br>

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
