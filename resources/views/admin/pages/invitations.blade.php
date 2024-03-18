@extends('admin.layouts.master')
@section('content')
    <div class="dashboard_content">
        <div class="widget">
            <div class="widget_title">
                <i class="far fa-envelope"></i> الدعــوات
            </div>
            <div class="widget_content">
                <div class="table-responsive">
                    <table class="table datatable" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="small_cell">#</th>
                                <th>إسم الدعوة</th>
                                <th>تاريخ لدعوة</th>
                                <th>صاحب الدعوة</th>
                                <th>رقم الهاتف</th>
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
                                    <td>{{ $invitation->user->name }}</td>
                                    <td>{{ $invitation->phone }}</td>

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
            </div>
        </div>
    </div>
@endsection
