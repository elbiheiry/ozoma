@extends('site.layouts.master')
@section('content')
    <div class="invite_body"
        style="background: url('{{ get_image($invitation->template['image'], 'templates') }}') no-repeat;background-size: contain;margin: 25px auto;width: 460px;height: 580px;text-align: center;display: flex;align-items: center;justify-content: center;flex-direction: column;">
        @if ($invitation->sign)
            <img src="{{ get_image($invitation->sign, 'invitations') }}"
                style="width: 100px;height: 100px;object-fit: contain;margin-bottom: 5px;" />
        @else
            <img src="{{ surl('images/logo.png') }}"
                style="width: 100px;height: 100px;object-fit: contain;margin-bottom: 5px;" />
        @endif

        <h3
            style="text-align: center;margin: 15px 0 0;font-size: 28px;font-weight: 700;word-spacing: 2px;font-family: system-ui;color: #4761a2;">
            {{ $invitation->title }}
        </h3>
        <h2
            style="text-align: center;margin: 15px 0 20px;font-size: 84px;font-weight: bold;font-family: system-ui;color: #004970;line-height: 111px;font-style: italic;">
            {{ $invitation->template->type->name }}
        </h2>
        <p
            style="text-align: center;line-height: 20px; margin: 15px 0;font-size: 22px;font-weight: 700;font-family: system-ui;color: #4660a1;">
            <span style="letter-spacing: 1px; display: inline-block">
                {{ \Jenssegers\Date\Date::parse($invitation->date)->format('l j F Y') }}</span>
            <span style="display: inline-block"> / {{ $invitation->time }} </span>
        </p>
        <h4
            style="text-align: center;font-size: 20px;margin: 15px 0;font-weight: 700;font-family: system-ui;color: #4660a1;">
            {{ $invitation->city }} - {{ $invitation->address }}
        </h4>
    </div>
    <div style="text-align: center;">
        <a href=""
            style="display: none;vertical-align: middle;line-height: 40px;text-align: center;font-size: 14px;padding: 0 15px;background-color: #004970;color: #ffffff;font-weight: 400;border-radius: 5px;text-decoration: none;font-family: system-ui;margin: 0;">
            قبول الدعوة
        </a>
        <a href=""
            style="display: none;vertical-align: middle;line-height: 40px;text-align: center;font-size: 14px;padding: 0 15px;background-color: #f44336;color: #ffffff;font-weight: 400;border-radius: 5px;text-decoration: none;font-family: system-ui;margin: 0;">
            رفض الدعوة
        </a>
        <a href="{{ route('site.profile.index') }}"
            style="display: inline-block;vertical-align: middle;line-height: 40px;text-align: center;font-size: 14px;padding: 0 15px;background-color: #f44336;color: #ffffff;font-weight: 400;border-radius: 5px;text-decoration: none;font-family: system-ui;margin: 0;">
            عودة للخلف
        </a>
    </div>
@endsection
