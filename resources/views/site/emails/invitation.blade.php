<label>عنوان الحدث </label>
<blockquote>{{ $details['title'] }}</blockquote>

<div class="invite_body"
    style="background: url('{{ get_image($details->template['image'], 'templates') }}') no-repeat;background-size: contain;margin: 25px auto;width: 460px;height: 580px;text-align: center;display: flex;align-items: center;justify-content: center;flex-direction: column;">
    @if ($details['sign'])
        <img src="{{ get_image($details['sign'], 'invitations') }}"
            style="width: 100px;height: 100px;object-fit: contain;margin-bottom: 5px;" />
    @else
        <h3
            style="text-align: center;margin: 15px 0 0;font-size: 28px;font-weight: 700;word-spacing: 2px;font-family: system-ui;color: #4761a2;">
            {{ $details['header'] }}
        </h3>
    @endif

    <h3
        style="text-align: center;margin: 15px 0 0;font-size: 28px;font-weight: 700;word-spacing: 2px;font-family: system-ui;color: #4761a2;">
        {{ $details['title'] }}
    </h3>
    <h2
        style="text-align: center;margin: 15px 0 20px;font-size: 84px;font-weight: bold;font-family: system-ui;color: #004970;line-height: 111px;font-style: italic;">
        {{-- {{ $details->package['name'] }} --}}
        {{ $details->template->type['name'] }}
    </h2>
    <p
        style="text-align: center;line-height: 20px; margin: 15px 0;font-size: 22px;font-weight: 700;font-family: system-ui;color: #4660a1;">
        <span style="letter-spacing: 1px; display: inline-block">
            {{ $details['date'] }} </span>
        <span style="display: inline-block"> / {{ $details['time'] }} </span>
    </p>
    <h4
        style="text-align: center;font-size: 20px;margin: 15px 0;font-weight: 700;font-family: system-ui;color: #4660a1;">
        {{ $details['city'] }} - {{ $details['address'] }}
    </h4>
</div>
<div style="text-align: center;">
    <a href=""
        style="display: inline-block;vertical-align: middle;line-height: 40px;text-align: center;font-size: 14px;padding: 0 15px;background-color: #004970;color: #ffffff;font-weight: 400;border-radius: 5px;text-decoration: none;font-family: system-ui;margin: 0;">
        قبول الدعوة
    </a>
    <a href=""
        style="display: inline-block;vertical-align: middle;line-height: 40px;text-align: center;font-size: 14px;padding: 0 15px;background-color: #f44336;color: #ffffff;font-weight: 400;border-radius: 5px;text-decoration: none;font-family: system-ui;margin: 0;">
        رفض الدعوة
    </a>
</div>
