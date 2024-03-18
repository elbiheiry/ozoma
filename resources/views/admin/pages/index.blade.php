@extends('admin.layouts.master')
@section('content')
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_content">
                <div class="row profile_form">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="dashboard_invitations.html" class="counter">
                            <img src="{{ aurl('images/invitation.gif') }}" />
                            <h3>
                                عدد الدعوات
                                <span class="timer_count" data-to="{{ \App\Models\Invitation::count() }}"
                                    data-speed="2000">{{ \App\Models\Invitation::count() }}</span>
                            </h3>
                        </a>
                    </div>
                    <!--End Col-->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="dashboard_users.html" class="counter green_bc">
                            <img src="{{ aurl('images/contacts.gif') }}" />
                            <h3>
                                الـمـسـتـخـدمـيـن
                                <span class="timer_count" data-to="{{ \App\Models\User::count() }}"
                                    data-speed="2000">{{ \App\Models\User::count() }}</span>
                            </h3>
                        </a>
                    </div>
                    <!--End Col-->

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="dashboard_templates.html" class="counter red_bc">
                            <img src="{{ aurl('images/templates.gif') }}" />
                            <h3>
                                الـقـوالـب
                                <span class="timer_count" data-to="{{ \App\Models\InvitationTypeTemplate::count() }}"
                                    data-speed="2000">{{ \App\Models\InvitationTypeTemplate::count() }}</span>
                            </h3>
                        </a>
                    </div>
                    <!--End Col-->
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-md-6">
                <div class="widget">
                    <div class="widget_title">
                        <i class="far fa-envelope"></i> أحدث الدعوات
                    </div>
                    <div class="widget_content">
                        <div class="table-responsive">
                            <table class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="small_cell">#</th>
                                        <th>إسم الدعوة</th>
                                        <th>تاريخ لدعوة</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($invitations as $invitation)
                                        <tr>
                                            <td class="small_cell">{{ $x }}</td>
                                            <td>{{ $invitation->title }}</td>
                                            <td>{{ $invitation->date }}</td>

                                            <td>
                                                <a href="{{ route('admin.invitations.show', ['id' => $invitation->id]) }}"
                                                    class="icon_link green_bc fa fa-eye">
                                                </a>
                                                <button class="fa fa-times icon_link red_bc delete_btn"
                                                    data-url="{{ route('admin.invitations.delete', ['id' => $invitation->id]) }}"></button>
                                            </td>
                                        </tr>
                                        @php
                                            $x++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('admin.invitations.index') }}" class="link mb-0">
                            <span> مشاهدة المزيد </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget">
                    <div class="widget_title">
                        <i class="fa fa-users"></i> الـمـسـتـخـدمـيـن
                    </div>
                    <div class="widget_content">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="small_cell">#</th>
                                        <th>الأسم</th>
                                        <th>رقم الهاتف</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $y = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="small_cell">{{ $y }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><span class="en">{{ $user->phone }}</span></td>
                                            <td>
                                                <button class="fa fa-times icon_link red_bc delete_btn"
                                                    data-url="{{ route('admin.users.delete', ['id' => $user->id]) }}"></button>
                                            </td>
                                        </tr>
                                        @php
                                            $y++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="link mb-0">
                            <span> مشاهدة المزيد </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
