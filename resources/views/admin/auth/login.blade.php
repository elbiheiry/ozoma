<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Meta Tags
        ==============================-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="copyright" content="" />
      <title> INV | Invation Platform  </title>>

    <!-- Fave Icons
    ================================-->
    <link rel="shortcut icon" href="{{ aurl('images/icon.png') }}" />

    <!-- CSS Files
    ================================-->
    <link rel="stylesheet" href="{{ aurl('vendor/bootstrap/bootstrap.min.css') }}" />
    <script src="https://kit.fontawesome.com/b13df7021e.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{ aurl('vendor/datatable/datatables.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ aurl('vendor/aos/animate.css') }}" />
    <link rel="stylesheet" href="{{ aurl('vendor/aos/aos.css') }}" />
    {{-- <link rel="stylesheet" href="vendor/steps/wizard.css" /> --}}
    <link rel="stylesheet" href="{{ aurl('css/style.css') }}" />
</head>

<body class="login-wrap" data-spy="scroll" data-target="#header_spy" data-offset="70" class="gray_bc">
    <!-- Preloader
    ==========================================-->
    <div class="loading">
        <div class="load_cont">
            <img src="{{ aurl('images/loading.gif') }}" />
        </div>
    </div>
    <div class="flex login_flex">
    <form action="{{ route('admin.login') }}" method="post" class="login-form center-height">
        <div class="form-title">
            <i class="fa fa-lock"></i>
            تسجيل دخول الان
        </div>
        <div class="form-group">
            <label>البريد الإلكتروني </label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>الرقم السري </label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="link widget_link">
                تسجيل دخول
            </button>
        </div>
        @csrf
        @method('POST')
    </form>
    </div>
    <!--End Form-->

    <!-- JS & Vendor Files
    ==========================================-->
    <script src="{{ aurl('vendor/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ aurl('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ aurl('vendor/counterto.js') }}"></script>
    <script src="{{ aurl('vendor/countdown.js') }}"></script>
    <script src="{{ aurl('vendor/jquery.simple.timer.js') }}"></script>
    <script src="{{ aurl('vendor/datatable/datatables.min.js') }}"></script>
    <script src="{{ aurl('vendor/aos/aos.js') }}"></script>
    <script src="{{ aurl('vendor/steps/jquery.steps.js') }}"></script>
    <script src="{{ aurl('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ aurl('js/main.js') }}"></script>
    <script src="{{ aurl('js/admin.js') }}"></script>
    <script>
        $(document).on('submit', '.login-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                'إنتظر');

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
                    var errors = [];
                    $.each(response.errors, function(index, value) {
                        errors.push(value);
                    });
                    notification("danger", errors[0], "fas fa-times");
                    form.find(":submit").attr('disabled', false).html(
                        'دخول');
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
</body>

</html>
