@extends('admin.layouts.master')
@section('content')
    <div class="dashboard_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="widget">
                        <div class="widget_title">
                            <i class="fa fa-users"></i> الـمـسـتـخـدمـيـن
                        </div>
                        <div class="widget_content">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable" style="width: 100%">
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
                                            $x = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="small_cell">{{ $x }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td><span class="en">{{ $user->phone }}</span></td>
                                                <td>
                                                    <button class="fa fa-times icon_link red_bc delete_btn"
                                                        data-url="{{ route('admin.users.delete', ['id' => $user->id]) }}"></button>
                                                </td>
                                            </tr>
                                            @php
                                                $x++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
