@extends('admin.layouts.master')
@push('models')
    <div class="modal fade" id="add_package" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة باقة</div>
                    <form method="post" action="{{ route('admin.packages.store') }}" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label> إسم الباقة </label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label> السعر </label>
                            <input type="text" class="form-control" name="price" />
                        </div>
                        <div class="form-group">
                            <label> عدد الأشخاص </label>
                            <input type="text" class="form-control" name="persons" />
                        </div>
                        <div class="form-group">
                            <label> الـمـمـيـزات </label>
                            <textarea class="form-control" name="advantages"></textarea>
                        </div>
                        <button class="link green_bc" type="submit">
                            <span> + إضافة بـاقـة </span>
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
                <i class="fa fa-dollar-sign"></i>
                الـبـاقـات
                <button data-toggle="modal" data-target="#add_package" class="link green_bc widget_link">
                    + إضافة بـاقـة
                </button>
            </div>
            <div class="widget_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="small_cell">#</th>
                            <th>إسم الباقة</th>
                            <th>عدد الأشخاص</th>
                            <th>السعر</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($packages as $package)
                            <tr>
                                <td class="small_cell">{{ $x }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->persons }}</td>
                                <td>{{ $package->price }} ريال</td>
                                <td>
                                    <button class="link green_bc btn-modal-view"
                                        data-url="{{ route('admin.packages.edit', ['id' => $package->id]) }}">
                                        <i class="fa fa-info"> </i>
                                        تعديل البيانات
                                    </button>
                                    <button class="delete-btn icon_link fa fa-times red_bc"
                                        data-url="{{ route('admin.packages.delete', ['id' => $package->id]) }}"></button>
                                </td>
                            </tr>
                            @php
                                $x++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
