<!-- JS & Vendor Files
    ==========================================-->
<script src="{{ surl('vendor/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{ surl('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ surl('vendor/owl/owl.carousel.js') }}"></script>
<script src="{{ surl('vendor/aos/aos.js') }}"></script>
<script src="{{ surl('vendor/jquery.simple.timer.js') }}"></script>
<script src="{{ surl('js/main.js') }}"></script>
<script>
    $(window).on("load", function() {
        $("#offer_modal").modal("show");
    });
    $(".timer").startTimer();
    $(".custom_slider").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        margin: 20,
        rtl: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            420: {
                items: 1,
                margin: 0
            },
            577: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 3
            },
        },
    });
    $(".story_slider").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        margin: 20,
        rtl: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            577: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
        },
    });
</script>
<script src="{{ aurl('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ aurl('js/admin.js') }}"></script>
@stack('js')
@if (auth()->guard('site')->guest())
    <script>
        $(document).on('submit', '.login-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html('<span>إنتظر</span>');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#user_id').val(response);
                    $('#confirm').modal('show');
                    $('#login').modal('hide');
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    notification("danger", response, "fas fa-times");
                    form.find(":submit").attr('disabled', false).html("<span> تسجيل دخول </span>");
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
        $(document).on('submit', '.confirm_code', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html('<span>إنتظر</span>');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    notification("success", "تم تسجيل الدخول بنجاح", "fas fa-check");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    notification("danger", response, "fas fa-times");
                    form.find(":submit").attr('disabled', false).html("<span> تأكيد الكود </span>");
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
    </script>
@endif
