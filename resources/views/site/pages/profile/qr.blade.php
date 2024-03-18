@extends('site.layouts.master')
@section('content')
<section class="section_color add_invitation">
      <div class="container">
        <div class="white_bc">
          <div class="row m-0">
            <div class="col-lg-12 profile_cont">
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3">
                  <ul class="profile_nav invitation_nav">
                    <li>
                      <a href="">
                        <i class="fa fa-info"></i>
                        التفاصيل
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <i class="far fa-envelope"></i>
                        خيارات الإرسال
                      </a>
                    </li>
                    <li>
                      <a href="{{route('site.profile.qr')}}" class="active">
                        <i class="fas fa-qrcode"></i> إعدادات الباركود
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <i class="far fa-file"></i>
                        الصفحة الخاصة
                      </a>
                    </li>
                    <li>
                      <a href=""><i class="fa fa-gift"></i> الأهداء </a>
                    </li>

                    <li>
                      <a href=""><i class="far fa-chart-bar"></i> التصويت </a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-9">
                  <div class="row">
                    <div class="col-12 mb-15">
                      <h3 class="mb-15">إعدادات الباركود</h3>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <button class="scan">
                        <img src="{{surl('images/qr-code-scan.png')}}" />
                        مسح الباركود
                      </button>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <a
                        class="status green"
                        href="#contact_list"
                        data-toggle="modal"
                        data-target="#contact_list"
                      >
                        <i class="fa fa-users"></i>
                        <div class="info">
                          <span> قـائـمـة المدعوين </span>

                          200
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <a
                        class="status orange"
                        href="#qr_contact_list"
                        data-toggle="modal"
                        data-target="#qr_contact_list"
                      >
                        <i class="fa fa-user-check"></i>
                        <div class="info">
                          <span> إحصائيات المدعوين </span>
                          100
                        </div>
                      </a>
                    </div>
                    <!--End Col-->
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
@endsection
