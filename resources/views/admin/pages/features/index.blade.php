@extends('admin.layouts.master')
@push('models')
    <div class="modal fade" id="add_feature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة ميزة</div>
                    <form method="post" action="{{ route('admin.features.store') }}" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label> إضافة أيقونة </label>
                            <input type="file" name="icon" />
                        </div>
                        <div class="form-group">
                            <label> الأسم </label>
                            <input type="text" class="form-control" name="name" />
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
                الـمـمـيـزات
                <button data-toggle="modal" data-target="#add_feature" class="link green_bc widget_link">
                    + إضافة ميزة
                </button>
            </div>
            <div class="widget_content">
                <div class="row">
                    @foreach ($features as $feature)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="feature_item">
                                <img src="{{ get_image($feature->icon, 'features') }}" />
                                <h3>{{ $feature->name }}</h3>
                                <p>
                                    {{ $feature->description }}
                                </p>
                                <div class="w-100">
                                    <button class="icon_link green_bc btn-modal-view"
                                        data-url="{{ route('admin.features.edit', ['id' => $feature->id]) }}">
                                        <i class="fa fa-info"> </i>
                                    </button>
                                    <button class="delete-btn icon_link fa fa-times red_bc"
                                        data-url="{{ route('admin.features.delete', ['id' => $feature->id]) }}"></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
