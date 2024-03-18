@extends('admin.layouts.master')
@push('models')
    <div class="modal fade" id="add_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة قالب</div>
                    <form method="post" action="{{ route('admin.invitations.templates.store') }}" class="ajax-form">
                        @csrf
                        <div class="form-group">
                            <label> إضافة صوره </label>
                            <input type="file" name="image" />
                        </div>
                        <div class="form-group">
                            <label> الأسم </label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label> النوع </label>
                            <select class="form-control" name="invitation_type_id">
                                <option value="0">إختر النوع</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
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
                القوالب
                <button data-toggle="modal" data-target="#add_type" class="link green_bc widget_link">
                    + إضافة قالب
                </button>
            </div>
            <div class="widget_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="small_cell">#</th>
                            <th>الإسم</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($templates as $template)
                            <tr>
                                <td class="small_cell">{{ $x }}</td>
                                <td>{{ $template->name }}</td>
                                <td>
                                    <button class="icon_link green_bc btn-modal-view"
                                        data-url="{{ route('admin.invitations.templates.edit', ['id' => $template->id]) }}">
                                        <i class="fa fa-info"> </i>
                                    </button>
                                    <button class="delete-btn icon_link fa fa-times red_bc"
                                        data-url="{{ route('admin.invitations.templates.delete', ['id' => $template->id]) }}"></button>
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
