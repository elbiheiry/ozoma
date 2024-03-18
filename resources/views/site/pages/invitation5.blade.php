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
                    <div class="bill">
                      <ul class="info">
                        <li><span> نوع الحدث</span> عقد قران</li>
                        <li><span> التاريخ</span> 4 مايو 2022</li>
                        <li><span> العنوان</span> شارع المعز - جدة</li>
                        <li><span> عدد الحضور </span> 60</li>
                      </ul>

                      <hr />
                      <div class="form-group wide_check_item">
                        <input type="radio" name="package" id="pack1" />
                        <label for="pack1">
                          <span> صغير 15 ريال </span>
                          قم بدعوة ما يصل إلى 15 ضيفًا
                        </label>
                      </div>
                      <div class="form-group wide_check_item">
                        <input type="radio" name="package" id="pack2" />
                        <label for="pack2">
                          <span> متوسط 30 ريال </span>
                          قم بدعوة ما يصل إلى 40 ضيفًا
                        </label>
                      </div>
                      <div class="form-group wide_check_item">
                        <input type="radio" name="package" id="pack3" checked />
                        <label for="pack3">
                          <span> كبير 60 ريال </span>
                          قم بدعوة ما يصل إلى 100 ضيفًا
                        </label>
                      </div>
                      <div class="total">
                        <h3>إجمالى الطلب</h3>
                        <h4>1000 ريال سعودى</h4>
                      </div>
                      <a href="add_invitation2.html" class="link white mt-15">
                        تعديل البيانات
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="bill text-center">
                      <h3>أختر وسيلة الدفع</h3>
                      <div class="payment_action">
                        <button class="link">
                          <i class="fab fa-apple-pay"></i> آبــل باى
                        </button>
                        <button class="link">
                          <i class="fab fa-cc-visa"></i>
                          الفيزا كارد
                        </button>
                        <button class="link">
                          <i class="fab fa-cc-paypal"></i>
                          الـبـاى بـال
                        </button>
                      </div>
                      <div class="w-100 text-center mt-15">
                        <button class="link">الدفع والأرسال الآن</button>
                        <button class="link red_bc">
                          الدفع والأرسال لاحقا
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--End Col-->
          </div>
          <!--End Row-->
        </div>
        <!--End Div-->
      </div>
      <!--End Container-->
    </section>
    @endsection