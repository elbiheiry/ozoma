@extends('site.layouts.master')
@push('models')
    <div class="modal fade" id="add_group_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">إضافة مجموعة إتصال</div>
                    <form method="post" action="{{ route('site.profile.contacts.groups.store') }}" class="ajax-form">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label> إسم المجموعة </label>
                            <input type="text" class="form-control" name="name" />
                        </div>

                        <button class="link" type="submit">
                            <span> حفظ التعديلات </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">+ إضافة مدعو</div>
                    <form method="post" action="{{ route('site.profile.contacts.contacts.store') }}"
                        class="ajax-form">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label> الأسم </label>
                            <input type="text" class="form-control" name="name" />
                        </div>

                        <div class="form-group">
                            <label> رقم الهاتف </label>
                            <input type="text" class="form-control" name="phone" />
                        </div>

                        <div class="form-group">
                            <label> البريد الألكتروني </label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <div class="form-group">
                            <label> مجموعة الإتصال </label>
                            <select name="user_group_id" class="form-control">
                                <option value="">إختر مجموعة الإتصال (إذا وجدت )</option>
                                @foreach ($user->groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <button class="link" type="submit">
                            <span> + إضافة مدعو</span>
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
    <div class="modal fade" id="import_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">تحميل جهات الأتصال</div>
                    <form>
                        <div class="form-group">
                            <label> أضف الملف </label>
                            <input type="file" />
                        </div>
                        <button class="link green_bc">
                            <span> + إضافة الملف </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <!-- Main Section ==========================================-->
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row m-0">

                    <div class="col-lg-12 profile_cont p-0">

                        <div class="cont">
                            <div class="add_contact p-0">
                                <div class="w-100">
                                    <button type="button" class="link green_bc" data-toggle="modal"
                                        data-target="#add_contact">
                                        + إضافة جهة إتصال
                                    </button>
                                    <!--<button class="link" data-toggle="modal" data-target="#import_contact"-->
                                    <!--    type="button">-->
                                    <!--    <i class="fa fa-upload" aria-hidden="true"></i> إستيراد-->
                                    <!--    جهات الأتصال-->
                                    <!--</button>-->
                                    <button class="link" data-toggle="modal" data-target="#add_group_contact"
                                        type="button">
                                        <i class="fa fa-users" aria-hidden="true"></i> إنشاء
                                        مجموعة
                                    </button>
                                </div>
                                <div class="w-100">
                                    <hr />
                                </div>
                                <h3>مجموعات الأتصال</h3>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th class="small_cell">#</th>
                                                <th class="wide_cell">إسم المجموعة</th>
                                                <th class="action_th"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $x = 1;
                                            @endphp
                                            @foreach ($user->groups as $group)
                                                <tr>
                                                    <td class="small_cell">{{ $x }}</td>
                                                    <td class="wide_cell">{{ $group->name }}</td>
                                                    <td class="action_th">
                                                        <button class="icon_link green_bc btn-modal-view"
                                                            data-url="{{ route('site.profile.contacts.groups.edit', ['id' => $group->id]) }}">
                                                            <i class="fa fa-info" aria-hidden="true"> </i>
                                                        </button>
                                                        <button class="icon_link fa fa-times red_bc delete-btn"
                                                            data-url="{{ route('site.profile.contacts.groups.delete', ['id' => $group->id]) }}"
                                                            aria-hidden="true"></button>
                                                    </td>
                                                </tr>
                                                @php
                                                    $x++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="w-100 h-30"></div>
                                <h3>جهات الأتصال</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="small_cell">#</th>
                                                <th class="wide_cell">الأسم</th>
                                                <th>رقم الهاتف</th>
                                                <th>البريد الألكتروني</th>
                                                <th class="action_th"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $x = 1;
                                            @endphp
                                            @foreach ($user->contacts as $contact)
                                                <tr>
                                                    <td class="small_cell">{{ $x }}</td>
                                                    <td class="wide_cell">{{ $contact->name }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td class="action_th">
                                                        <button class="icon_link green_bc btn-modal-view"
                                                            data-url="{{ route('site.profile.contacts.contacts.edit', ['id' => $contact->id]) }}">
                                                            <i class="fa fa-info" aria-hidden="true"> </i>
                                                        </button>
                                                        <button class="icon_link fa fa-times red_bc delete-btn"
                                                            data-url="{{ route('site.profile.contacts.contacts.delete', ['id' => $contact->id]) }}"
                                                            aria-hidden="true"></button>
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
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Div-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
@endsection
