<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/sections_trans.edit_sections') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Sections.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $section->id }}">

                    <div class="modal-body">
                        <label
                            for="exampleInputPassword1">{{ trans('Dashboard/sections_trans.name_sections_en') }}</label>
                        <input type="text" name="name_en" class="form-control" value="{{ $section->name_en }}">
                    </div>

                    <div class="modal-body">
                        <label
                            for="exampleInputPassword1">{{ trans('Dashboard/sections_trans.name_sections_ar') }}</label>
                        <input type="text" name="name_ar" class="form-control" value="{{ $section->name_ar }}">
                    </div>


                    <div class="modal-body">
                        <label
                            for="exampleInputPassword1">{{ trans('Dashboard/sections_trans.description_en') }}</label>
                        <input type="text" name="description_en" class="form-control" value="{{ $section->description_en }}">
                    </div>


                    <div class="modal-body">
                        <label
                            for="exampleInputPassword1">{{ trans('Dashboard/sections_trans.description_ar') }}</label>
                        <input type="text" name="description_ar" class="form-control" value="{{ $section->description_ar }}">
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
