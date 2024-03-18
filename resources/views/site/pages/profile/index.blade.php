@extends('site.layouts.master')
@section('content')
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row m-0">
                    <div class="col-lg-12 profile_cont">
                        <div class="head">
                            <h3>أهلا {{ $user->name }} 🎉</h3>
                            <a href="{{ route('site.invitation1') }}" class="link"> + إنشاء دعوة </a>
                        </div>
                        <div class="cont p-0">
                            @foreach ($user->invitations as $invitation)
                                @php
                                    $payment_details = json_decode($invitation->payment->payment_details);
                                @endphp
                                <div class="invitation_item">
                                    <div class="cover">
                                        <div class="photo">
                                            <img src="{{ get_image($invitation->template['image'], 'templates') }}" />
                                        </div>
                                        <div class="cont">
                                            <a href="{{ route('site.invitation', ['id' => $invitation->id]) }}">
                                                {{ $invitation->package->name }} </a>
                                            <p>بواسطة : {{ $user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="date">
                                        <span>{{ \Jenssegers\Date\Date::parse($invitation->date)->format('l') }}</span>
                                        <span>{{ \Jenssegers\Date\Date::parse($invitation->date)->format('j F') }}
                                        </span><span> {{ $invitation->time }}</span>
                                    </div>
                                    <div class="action">
                                        {{-- <a href="add_invitation4.html" class="link white">
                                            فاتورة الدفع
                                        </a> --}}
                                        <a href="{{ route('site.invitation', ['id' => $invitation->id]) }}"
                                            class="icon_link fa fa-eye"></a>

                                        <button
                                            data-url="{{ route('site.profile.invitation.delete', ['id' => $invitation->id]) }}"
                                            class="icon_link red_bc fa fa-times delete-btn"></button>
                                    </div>
                                </div>
                            @endforeach
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
