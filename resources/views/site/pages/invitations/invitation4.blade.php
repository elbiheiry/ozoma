@extends('site.layouts.master')
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
                        <li>
                            <span> 2 </span>
                            المدعوين وخيارات الإرسال
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                        <li class="active">
                            <span> 3 </span>
                            إنهاء الدعوة
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </li>
                    </ul>
                    <div class="col-12">
                        <div class="invite_setting">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="cart">
                                        <div class="invite_body"
                                            style="background: url('{{ get_image($invitation->template['image'], 'templates') }}') no-repeat;background-size: contain;margin: 25px auto;width: 460px;height: 580px;text-align: center;display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                            @if ($invitation->sign)
                                                <img src="{{ get_image($invitation->sign, 'invitations') }}"
                                                    style="width: 100px;height: 100px;object-fit: contain;margin-bottom: 5px;" />
                                            @else
                                                <img src="{{ surl('images/logo.png') }}"
                                                    style="width: 100px;height: 100px;object-fit: contain;margin-bottom: 5px;" />
                                            @endif

                                            <h3
                                                style="text-align: center;margin: 15px 0 0;font-size: 28px;font-weight: 700;word-spacing: 2px;font-family: system-ui;color: #4761a2;">
                                                {{ $invitation->title }}
                                            </h3>
                                            <h2
                                                style="text-align: center;margin: 15px 0 20px;font-size: 84px;font-weight: bold;font-family: system-ui;color: #004970;line-height: 111px;font-style: italic;">
                                                {{ $invitation->template->type->name }}
                                            </h2>
                                            <p
                                                style="text-align: center;line-height: 20px; margin: 15px 0;font-size: 22px;font-weight: 700;font-family: system-ui;color: #4660a1;">
                                                <span style="letter-spacing: 1px; display: inline-block">
                                                    {{ $invitation->date }}</span>
                                                <span style="display: inline-block"> / {{ $invitation->time }} </span>
                                            </p>
                                            <h4
                                                style="text-align: center;font-size: 20px;margin: 15px 0;font-weight: 700;font-family: system-ui;color: #4660a1;">
                                                {{ $invitation->city }} - {{ $invitation->address }}
                                            </h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="{{ route('site.invitation2', ['id' => $id]) }}"> تعديل البيانات
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.invitation3', ['id' => $id]) }}"> إضافة مدعوين
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="bill">
                                        <ul class="info">
                                            <li><span> نوع الحدث</span> {{ $template->type->name }}</li>
                                            <li><span> التاريخ</span> {{ $invitation->date }}</li>
                                            <li><span> العنوان</span> {{ $invitation->address }}</li>
                                            <li><span> عدد الحضور </span> {{ $invitation->package->persons }}</li>
                                        </ul>

                                        <hr />
                                        <div class="form-group wide_check_item">
                                            <input type="radio" name="package" id="pack3" checked />
                                            <label for="pack{{ $invitation->package->id }}">
                                                <span> {{ $invitation->package->name }}
                                                    ({{ $invitation->package->price }} ريال)
                                                </span>
                                                قم بدعوة ما يصل إلى {{ $invitation->package->persons }} ضيفًا
                                            </label>
                                        </div>
                                        <hr />
                                        <div class="total">
                                            <h3>إجمالى الطلب</h3>
                                            <h4>{{ $invitation->package->price }} ريال سعودي</h4>
                                        </div>

                                        <h3 class="mb-0">أختر وسيلة الدفع</h3>
                                        <div class="payment_action">
                                            <button class="link">
                                                <i class="fa-brands fa-stripe"></i> سترايب
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Col-->
                    <div class="col-12 top_nav">
                        <a href="{{ route('site.invitation3', ['id' => $id]) }}" class="link white"> السابق </a>
                        <ul>
                            <li>
                                <a href="{{ route('site.payment.index', ['id' => $id, 'status' => 'now']) }}"
                                    class="link white">الدفع
                                    والأرسال الآن</a>
                            </li>
                            <li><a href="{{ route('site.payment.index', ['id' => $id, 'status' => 'later']) }}"
                                    class="link">الدفع
                                    والأرسال لاحقا</a></li>
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
