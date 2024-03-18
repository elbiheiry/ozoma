@extends('admin.layouts.master')
@section('content')
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_title">الشروط والأحـكـام</div>
            <div class="widget_content">
                <form method="put" action="{{ route('admin.terms.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <textarea class="form-control" name="description">{{ $terms->description }}</textarea>
                    </div>
                    <button class="link" type="submit">
                        <span> حفظ التعديلات </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea"
        });
    </script>
@endpush
