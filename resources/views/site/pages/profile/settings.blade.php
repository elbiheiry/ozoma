@extends('site.layouts.master')
@section('content')
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row m-0">
                    <div class="col-lg-12 profile_cont p-0">
                        <form class="cont ajax-form" method="put" action="{{ route('site.profile.phone') }}"
                            style="max-width: 100%">
                            @csrf
                            @method('put')

                            <h3>تـغـيـر رقـم الـهـاتـف</h3>
                            <div class="form-group form-group-icon">
                                <label> رقم الهاتف </label>
                                <input type="text" class="form-control" placeholder="رقم الهاتف "
                                    value="{{ $user->phone }}" />
                                <i class="fa fa-phone"></i>
                            </div>
                            <button type="submit" class="link" style="margin-top: 15px">
                                <span> تغير رقم الهاتف </span>
                            </button>
                            <div class="w-100">
                                <hr>
                            </div>
                        </form>
                        <form class="cont ajax-form" method="put" action="{{ route('site.profile.settings') }}"
                            style="max-width: 100%">
                            @csrf
                            @method('put')
                            <h3>الـبيانـات الـشخصيـة</h3>
                            <div class="row w-100">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> الأسم بالكامل </label>
                                        <input type="text" class="form-control" value=" {{ $user->name }} " />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> البريد الألكتروني </label>
                                        <input type="email" class="form-control" value="{{ $user->email }}" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="link m-0 mt-15" type="submit">حفظ التعديلات</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Div-->
        </div>
        <!--End Container-->
    </section>
@endsection
