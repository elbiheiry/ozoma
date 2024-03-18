@extends('admin.layouts.master')
@push('models')
    <div class="modal fade" id="add_faq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة سؤال</div>
                    <form method="post" action="{{ route('admin.faqs.store') }}" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label> السؤال </label>
                            <input type="text" class="form-control" name="question" />
                        </div>
                        <div class="form-group">
                            <label> الوصف </label>
                            <textarea class="form-control" name="answer"></textarea>
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
                <i class="fa fa-question"></i> الأسـئـلـة الـشائـعـة
                <button data-toggle="modal" data-target="#add_faq" class="link green_bc widget_link">
                    + إضافة سؤال
                </button>
            </div>
            <div class="widget_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="small_cell">#</th>
                            <th>السؤال</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($faqs as $faq)
                            <tr>
                                <td class="small_cell">{{ $x }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>
                                    <button class="link green_bc btn-modal-view"
                                        data-url="{{ route('admin.faqs.edit', ['id' => $faq->id]) }}">
                                        <i class="fa fa-info"> </i>
                                        تعديل البيانات
                                    </button>
                                    <button class="delete-btn icon_link fa fa-times red_bc"
                                        data-url="{{ route('admin.faqs.delete', ['id' => $faq->id]) }}"></button>
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
