<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">تعديل بيانات </div>
        <form method="put" action="{{ route('admin.features.update', ['id' => $feature->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <img src="{{ get_image($feature->icon, 'features') }}" class="feature_icon" />
            <div class="form-group">
                <label> إضافة أيقونة </label>
                <input type="file" name="icon" />
            </div>
            <div class="form-group">
                <label> الأسم </label>
                <input type="text" class="form-control" name="name" value="{{ $feature->name }}" />
            </div>
            <div class="form-group">
                <label> الوصف </label>
                <textarea class="form-control" name="description">{{ $feature->description }}</textarea>
            </div>
            <button class="link green_bc" type="submit">
                <span> حفظ التعديلات </span>
            </button>
        </form>
    </div>
</div>
