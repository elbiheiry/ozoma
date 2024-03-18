@if (request()->routeIs('site.index'))
    <div class="modal fade" id="offer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="offer">
                        <h3>إنشاء بطاقة خاصة</h3>
                        <p>إنشاء بطاقة تهنئة بمناسبة عيد الفطر وأرسالها إلى من تحب</p>

                        <img src="{{ surl('images/modal_invite.jpg') }}" />
                        <a href="{{route('site.customize')}}" class="link"> إنشاء بطاقة </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (auth()->guard('site')->guest())
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog small" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">
                        <i class="fa fa-lock"></i> تـسـجـيـل الـدخـول
                    </div>
                    <form class="login-form" method="POST" action="{{ route('site.login') }}">
                        @csrf
                        <div class="form-group form-group-icon">
                            <input type="number" class="form-control" placeholder="رقم الهاتف " name="phone" />
                            <i class="fa fa-phone"></i>
                        </div>
                        <span class="hint text-right mb-15">
                            سيتم إرسال رمز تأكيدى على هذا الرقم
                        </span>

                        <button class="link mb-0">
                            <span> تسجيل دخول </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">
                        تم إرسال كود التحقق على رقم الهاتف المسجل لدينا
                    </div>
                    <form class="confirm_code" method="post" action="{{ route('site.login.code') }}">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group text-center">
                            <label class="text-center"> إدخل الكود </label>
                            <input type="text" class="form-control min-inpt" maxlength="1" name="code1" />
                            <input type="text" class="form-control min-inpt" maxlength="1" name="code2" />
                            <input type="text" class="form-control min-inpt" maxlength="1" name="code3" />
                            <input type="text" class="form-control min-inpt" maxlength="1" name="code4" />
                        </div>
                        <button type="submit" class="link">
                            <span> تـأكـيـد الـكـود </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
