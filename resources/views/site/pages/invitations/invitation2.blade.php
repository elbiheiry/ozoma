@extends('site.layouts.master')
@section('content')
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc p-0">
                <div class="row m-0">
                    <ul class="col-12 step_status">
                        <li class="active">
                            <span> 1 </span>
                            بيانات الدعوة
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                        <li>
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

                    <div class="col-lg-7 col-md-6">
                        <div class="invite_setting">
                            <form class="invite_info second-step" method="post"
                                action="{{ route('site.invitation.update', ['id' => $id]) }}">
                                @csrf
                                @method('post')
                                <div class="form-group inline-data">
                                    <label>عنوان الحدث </label>
                                    <input type="text" class="form-control" placeholder="عنوان الحدث" name="title"
                                        value="{{ $invitation->title }}" />
                                </div>
                                <div class="form-group inline-data">
                                    <label> مقدمة الدعوة </label>
                                    <input type="text" class="form-control" placeholder=" مقدمة الدعوة " name="header"
                                        value="{{ $invitation->header }}" />
                                </div>
                                <div class="form-group inline-data">
                                    <label> نوع الدعوة </label>
                                    <select class="form-control" name="package_id" readonly>
                                        <option value="{{ $invitation->package_id }}">{{ $invitation->package->name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group inline-data">
                                    <label>برعاية </label>
                                    <input type="text" class="form-control" placeholder="برعاية" name="sponsor"
                                        value="{{ $invitation->sponsor }}" />
                                </div>
                                <div class="form-group inline-data">
                                    <label> تاريخ / وقت الحدث </label>
                                    <input type="date" class="form-control flatpickr-input" name="date"
                                        value={{ $invitation->date }} />
                                    <select class="form-control" name="time">
                                        <option {{ $invitation->time == '09:00 صباحا' ? 'selected' : '' }}
                                            value="09:00 صباحا">09:00
                                            صباحا</option>
                                        <option {{ $invitation->time == '09:30 صباحا' ? 'selected' : '' }}
                                            value="09:30 صباحا">09:30
                                            صباحا</option>
                                        <option {{ $invitation->time == '10:00 صباحا' ? 'selected' : '' }}
                                            value="10:00 صباحا">10:00
                                            صباحا</option>
                                        <option {{ $invitation->time == '10:30 صباحا' ? 'selected' : '' }}
                                            value="10:30 صباحا">10:30
                                            صباحا</option>
                                        <option {{ $invitation->time == '11:00 صباحا' ? 'selected' : '' }}
                                            value="11:00 صباحا">11:00
                                            صباحا</option>
                                        <option {{ $invitation->time == '11:30 صباحا' ? 'selected' : '' }}
                                            value="11:30 صباحا">11:30
                                            صباحا</option>
                                        <option {{ $invitation->time == '12:00 مساءا' ? 'selected' : '' }}
                                            value="12:00 مساءا">12:00
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '12:30 مساءا' ? 'selected' : '' }}value="12:30 مساءا">
                                            12:30
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '01:00 مساءا' ? 'selected' : '' }}value="01:00 مساءا">
                                            01:00
                                            مساءا</option>
                                        <option {{ $invitation->time == '01:30 مساءا' ? 'selected' : '' }}
                                            value="01:30 مساءا">01:30
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '02:00 مساءا' ? 'selected' : '' }}value="02:00 مساءا">
                                            02:00
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '02:30 مساءا' ? 'selected' : '' }}value="02:30 مساءا">
                                            02:30
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '03:00 مساءا' ? 'selected' : '' }}value="03:00 مساءا">
                                            03:00
                                            مساءا</option>
                                        <option {{ $invitation->time == '03:30 مساءا' ? 'selected' : '' }}
                                            value="03:30 مساءا">03:30
                                            مساءا</option>
                                        <option {{ $invitation->time == '04:00 مساءا' ? 'selected' : '' }}
                                            value="04:00 مساءا">04:00
                                            مساءا</option>
                                        <option
                                            {{ $invitation->time == '04:30 مساءا' ? 'selected' : '' }}value="04:30 مساءا">
                                            04:30
                                            مساءا</option>
                                        <option {{ $invitation->time == '05:00 مساءا' ? 'selected' : '' }}
                                            value="05:00 مساءا">05:00
                                            مساءا</option>
                                        <option {{ $invitation->time == '05:30 مساءا' ? 'selected' : '' }}
                                            value="05:30 مساءا">05:30
                                            مساءا</option>
                                        <option {{ $invitation->time == '06:00 مساءا' ? 'selected' : '' }}
                                            value="06:00 مساءا">06:00
                                            مساءا</option>
                                        <option {{ $invitation->time == '06:30 مساءا' ? 'selected' : '' }}
                                            value="06:30 مساءا">06:30
                                            مساءا</option>
                                        <option {{ $invitation->time == '07:00 مساءا' ? 'selected' : '' }}
                                            value="07:00 مساءا">07:00
                                            مساءا</option>
                                        <option {{ $invitation->time == '07:30 مساءا' ? 'selected' : '' }}
                                            value="07:30 مساءا">07:30
                                            مساءا</option>
                                    </select>
                                </div>
                                <div class="form-group inline-data">
                                    <label> صيغة التاريخ </label>
                                    <select class="form-control" name="date_format">
                                        <option {{ $invitation->date_format == 'شبه رسمي' ? 'selected' : '' }}
                                            value="شبه رسمي">شبه
                                            رسمي</option>
                                        <option {{ $invitation->date_format == 'عارضة (بدون عام)' ? 'selected' : '' }}
                                            value="عارضة (بدون عام)">عارضة (بدون عام)</option>
                                        <option {{ $invitation->date_format == 'رسمي (احتفالي)' ? 'selected' : '' }}
                                            value="رسمي (احتفالي)">رسمي (احتفالي)</option>
                                        <option {{ $invitation->date_format == 'غير رسمي (بدون يوم)' ? 'selected' : '' }}
                                            value="غير رسمي (بدون يوم)">غير رسمي (بدون يوم)</option>
                                        <option {{ $invitation->date_format == 'السليم (الشركات)' ? 'selected' : '' }}
                                            value="السليم (الشركات)">السليم (الشركات)</option>
                                    </select>
                                </div>
                                <div class="form-group inline-data">
                                    <label> المدينة </label>
                                    <input type="text" class="form-control" placeholder=" المدينة " name="city"
                                        value="{{ $invitation->city }}" />
                                </div>
                                <div class="form-group inline-data">
                                    <label> العنوان </label>
                                    <input type="text" class="form-control" placeholder="العنوان " name="address"
                                        value="{{ $invitation->address }}" />
                                </div>
                                <div class="form-group">
                                    <div class="check_item upload_img">
                                        <input type="file" name="sign" />
                                        <button type="button" class="link">+ تحميل شعار</button>
                                    </div>
                                </div>
                                {{-- <button style="display:none;" type="submit" id="submit-form"></button> --}}
                            </form>
                        </div>
                    </div>
                    <!--End Col-->
                    <div class="col-lg-5 col-md-6">
                        <div class="preview">
                            <img src="{{ get_image($invitation->template['image'], 'templates') }}" />
                        </div>
                    </div>
                    <!--End Col-->
                    <div class="col-12 top_nav">
                        <a href="{{ route('site.invitation1') }}" class="link white"> السابق </a>
                        <ul>
                            {{-- <li>
                                <button class="link white">حفظ كمسودة</button>
                            </li> --}}
                            <li>
                                <button onclick="$('.second-step').submit();" class="link">
                                    التالى
                                </button>
                            </li>
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
        $('.second-step').on('submit', function() {
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
