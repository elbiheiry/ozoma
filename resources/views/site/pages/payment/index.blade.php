@extends('site.layouts.master')
@section('content')
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row m-0">
                    <div class="col-lg-12 profile_cont p-0">
                        <div class="cont">

                            <h3>تفاصيل الدفع</h3>
                            @if (\Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ \Session::get('success') }}</p>
                                </div>
                            @endif
                            <form role="form"
                                action="{{ route('site.payment.stripe', ['id' => $id, 'status' => $status]) }}"
                                method="post" class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf
                                <div class='row'>
                                    <div class="col-md-12">
                                        <div class='form-group inline-data required'>
                                            <label>الإسم علي البطاقة</label>
                                            <input class='form-control' size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class='form-group inline-data required'>
                                            <label>رقم البطاقة</label>
                                            <input autocomplete='off' class='form-control card-number' size='20'
                                                type='text'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class='form-group cvc inline-data required'>
                                            <label>CVV</label>
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='مثال. 311'
                                                size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class='form-group expiration inline-data required'>
                                            <label>شهر إنتهاء الصلاحية</label>
                                            <input class='form-control card-expiry-month' placeholder='مثال : 05' size='2'
                                                type='text'>
                                        </div>
                                        <div class='form-group expiration inline-data required'>
                                            <label>سنة إنتهاء الصلاحية</label>
                                            <input class='form-control card-expiry-year' placeholder='مثال : 2022' size='4'
                                                type='text'>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12 error form-group d-none'>
                                        <div class='alert-danger alert'>خطأ برجاء إعاده المحاوله مره اخري
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="link m-0 mt-15" type="submit">إدفع الان</button>
                                        <a class="link m-0 mt-15" href="{{ route('site.invitation4', ['id' => $id]) }}"
                                            style="background-color: red;">العودة للموقع</a>
                                    </div>
                                </div>
                            </form>
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
@push('js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
@endpush
