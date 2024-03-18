@extends('site.layouts.master')
@push('models')
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
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc p-0">
                <div class="row m-0">
                    <ul class="col-12 step_status">
                        <li>
                            <span> 1 </span>
                            بيانات الدعوة
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                        <li class="active">
                            <span> 2 </span>
                            المدعوين وخيارات الإرسال
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                        <li>
                            <span> 3 </span>
                            إنهاء الدعوة
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                    </ul>
                    <div class="col-12">
                        <div class="invite_setting">
                            <h3 class="mt-0">خيارات الإرسـال</h3>
                            <form class="add_contact third-step"
                                action="{{ route('site.invitation.update2', ['id' => $id]) }}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-group wide_check_item">
                                    <input type="radio" name="send_method" id="send_method1" value="1"
                                        {{ $invitation->send_method == 1 ? 'checked' : '' }} />
                                    <label for="send_method1">
                                        إرسال الدعوات عبر رقم الهاتف
                                    </label>
                                </div>
                                <div class="form-group wide_check_item">
                                    <input type="radio" name="send_method" id="send_method2" value="2"
                                        {{ $invitation->send_method == 2 ? 'checked' : '' }} />
                                    <label for="send_method2">
                                        إرسال الدعوات عبر البريد الألكتروني
                                    </label>
                                </div>
                                <div class="form-group wide_check_item">
                                    <input type="radio" name="send_method" id="send_method3" value="3"
                                        {{ $invitation->send_method == 3 ? 'checked' : '' }} />
                                    <label for="send_method3">
                                        إرسال الدعوات عبر الهاتف والبريد الألكتروني
                                    </label>
                                </div>
                            </form>
                            <h3>قائمة المدعوين</h3>
                            <form method="post" action="{{ route('site.profile.contacts.contacts.store') }}"
                                class="ajax-form add_contact">
                                @csrf
                                @method('post')
                                <div class="w-100">
                                    <div class="add_new_contact">
                                        <input type="text" class="form-control" placeholder="إسم المدعو " name="name" />
                                        <input type="text" class="form-control" placeholder=" رقم الهاتف" name="phone" />
                                        <input type="email" class="form-control" placeholder=" البريد الألكتروني"
                                            name="email" />

                                        <button class="link" type="submit">
                                            <span> + إضافة مدعو</span>
                                        </button>
                                    </div>
                                </div>
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
                                                    <td class="wide_cell edit_cell">
                                                        {{ $contact->name }}
                                                    </td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td class="action_th">
                                                        <button class="icon_link green_bc btn-modal-view" type="button"
                                                            data-url="{{ route('site.profile.contacts.contacts.edit', ['id' => $contact->id]) }}">
                                                            <i class="fa fa-info" aria-hidden="true"> </i>
                                                        </button>
                                                        <button class="icon_link fa fa-times red_bc delete-btn"
                                                            type="button"
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
                            </form>
                        </div>
                    </div>
                    <!--End Col-->
                    <div class="col-12 top_nav">
                        <a href="{{ route('site.invitation2', ['id' => request()->id]) }}" class="link white"> السابق
                        </a>
                        <ul>
                            {{-- <li>
                                <button class="link white">حفظ كمسودة</button>
                            </li> --}}
                            <button onclick="$('.third-step').submit();" class="link">
                                التالى
                            </button>
                        </ul>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Div-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script>
        $('.third-step').on('submit', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);

            $.ajax({
                url: url,
                method: form.attr('method'),
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    window.location.href = response
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    notification("danger", response, "fas fa-times");
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
    </script>
@endpush
