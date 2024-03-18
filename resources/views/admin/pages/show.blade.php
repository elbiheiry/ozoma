@extends('admin.layouts.master')
@section('content')
    <div class="dash_header">
        <div class="side">
            <button class="toggle-btn icon-btn">
                <i class="fa fa-bars"></i>
            </button>
            عــزومــة
        </div>
        <button>
            <i class="fa fa-power-off"></i>
        </button>
    </div>
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_title">
                <i class="far fa-envelope"></i> الدعــوات
            </div>
            <div class="widget_content">
                <div class="row profile_form">
                    <div class="col-sm-6">
                        <div class="data_text">
                            <span> إسم المناسبة </span>
                            {{ $invitation->title }}
                        </div>
                        <!--End Data-->
                    </div>
                    <!--End Col-->
                    <div class="col-sm-6">
                        <div class="data_text">
                            <span> الموقع </span>
                            {{ $invitation->address }}
                        </div>
                        <!--End Data-->
                    </div>
                    <!--End Col-->
                    <div class="col-sm-6">
                        <div class="data_text">
                            <span> التاريخ </span>
                            {{ $invitation->date }}
                        </div>
                        <!--End Data-->
                    </div>
                    <!--End Col-->
                    <div class="col-sm-6">
                        <div class="data_text">
                            <span> التوقيت </span>
                            {{ $invitation->time }}
                        </div>
                        <!--End Data-->
                    </div>
                    <!--End Col-->
                    <div class="col-sm-12">
                        <div class="data_text">
                            <span> الصيغة </span>
                            {{ $invitation->header }}
                        </div>
                        <!--End Data-->
                    </div>
                </div>
                <!--End Row-->
            </div>
        </div>
    </div>
@endsection
