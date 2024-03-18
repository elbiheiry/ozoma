@extends('admin.layouts.master')
@push('models')
    <div class="modal fade" id="add_testimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة راي عميل</div>
                    <form method="post" action="{{ route('admin.testimonials.store') }}" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label> إضافة صورة </label>
                            <input type="file" name="image" />
                        </div>
                        <div class="form-group">
                            <label> العنوان </label>
                            <input type="text" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label> العنوان الفرعي </label>
                            <input type="text" class="form-control" name="subtitle" />
                        </div>
                        <div class="form-group">
                            <label> الوصف </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button class="link green_bc" type="submit">
                            <span> + إضافة </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="common-modal">
        <div class="modal-dialog" id="edit-area">

        </div>
    </div>
@endpush
@section('content')
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_title">
                <i class="far fa-star" aria-hidden="true"></i>
                اراء العملاء
                <button data-toggle="modal" data-target="#add_testimonial" class="link green_bc widget_link">
                    + إضافة راي
                </button>
            </div>
            <div class="widget_content">
                <div class="row">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="feature_item">
                                <img src="{{ get_image($testimonial->image, 'testimonials') }}" />
                                <h3>{{ $testimonial->title }}</h3>
                                <p>
                                    {{ $testimonial->subtitle }}
                                </p>
                                <div class="w-100">
                                    <button class="icon_link green_bc btn-modal-view"
                                        data-url="{{ route('admin.testimonials.edit', ['id' => $testimonial->id]) }}">
                                        <i class="fa fa-info"> </i>
                                    </button>
                                    <button class="delete-btn icon_link fa fa-times red_bc"
                                        data-url="{{ route('admin.testimonials.delete', ['id' => $testimonial->id]) }}"></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
