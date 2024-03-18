<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">تعديل بيانات </div>
        <form method="put" action="{{ route('admin.invitations.templates.update', ['id' => $template->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <img src="{{ get_image($template->image, 'templates') }}" class="feature_icon" />
            <div class="form-group">
                <label> إضافة صوره </label>
                <input type="file" name="image" />
            </div>
            <div class="form-group">
                <label> الأسم </label>
                <input type="text" class="form-control" name="name" value="{{ $template->name }}" />
            </div>
            <div class="form-group">
                <label> النوع </label>
                <select class="form-control" name="invitation_type_id">
                    <option value="0">إختر النوع</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == $template->invitation_type_id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="link green_bc" type="submit">
                <span> حفظ التعديلات </span>
            </button>
        </form>
    </div>
</div>
