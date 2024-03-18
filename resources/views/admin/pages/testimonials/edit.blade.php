<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">تعديل بيانات </div>
        <form method="put" action="{{ route('admin.testimonials.update', ['id' => $testimonial->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <img src="{{ get_image($testimonial->image, 'testimonials') }}" class="feature_icon" />
            <div class="form-group">
                <label> إضافة صورة </label>
                <input type="file" name="image" />
            </div>
            <div class="form-group">
                <label> العنوان </label>
                <input type="text" class="form-control" name="title" value="{{ $testimonial->title }}" />
            </div>
            <div class="form-group">
                <label> العنوان الفرعي </label>
                <input type="text" class="form-control" name="subtitle" value="{{ $testimonial->subtitle }}" />
            </div>
            <div class="form-group">
                <label> الوصف </label>
                <textarea class="form-control" name="description">{{ $testimonial->description }}</textarea>
            </div>
            <button class="link green_bc" type="submit">
                <span> حفظ التعديلات </span>
            </button>
        </form>
    </div>
</div>
