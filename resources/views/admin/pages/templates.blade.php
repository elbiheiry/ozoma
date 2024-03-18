@extends('admin.layouts.master')
@section('content')
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_title">
                <i class="fa fa-image"></i> الـقـوالـب
                <button data-toggle="modal" data-target="#add_template" class="link green_bc widget_link">
                    + إضافة قالب
                </button>
            </div>
            <div class="widget_content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="temp_item">
                            <img src="{{ aurl('images/1.png') }}" />
                            <h3>إسم القالب</h3>
                            <div class="w-100">
                                <button class="icon_link green_bc" data-toggle="modal" data-target="#edit_template">
                                    <i class="fa fa-info"> </i>
                                </button>
                                <button data-toggle="modal" data-target="#remove_template"
                                    class="icon_link fa fa-times red_bc"></button>
                            </div>
                        </div>
                    </div>
                    <!--End Serv Item-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="temp_item">
                            <img src="{{ aurl('images/2.png') }}" />
                            <h3>إسم القالب</h3>
                            <div class="w-100">
                                <button class="icon_link green_bc" data-toggle="modal" data-target="#edit_template">
                                    <i class="fa fa-info"> </i>
                                </button>
                                <button data-toggle="modal" data-target="#remove_template"
                                    class="icon_link fa fa-times red_bc"></button>
                            </div>
                        </div>
                    </div>
                    <!--End Serv Item-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="temp_item">
                            <img src="{{ aurl('images/3.png') }}" />
                            <h3>إسم القالب</h3>
                            <div class="w-100">
                                <button class="icon_link green_bc" data-toggle="modal" data-target="#edit_template">
                                    <i class="fa fa-info"> </i>
                                </button>
                                <button data-toggle="modal" data-target="#remove_template"
                                    class="icon_link fa fa-times red_bc"></button>
                            </div>
                        </div>
                    </div>
                    <!--End Serv Item-->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="temp_item">
                            <img src="{{ aurl('images/4.png') }}" />
                            <h3>إسم القالب</h3>
                            <div class="w-100">
                                <button class="icon_link green_bc" data-toggle="modal" data-target="#edit_template">
                                    <i class="fa fa-info"> </i>
                                </button>
                                <button data-toggle="modal" data-target="#remove_template"
                                    class="icon_link fa fa-times red_bc"></button>
                            </div>
                        </div>
                    </div>
                    <!--End Serv Item-->
                </div>
            </div>
        </div>
    </div>
@endsection
