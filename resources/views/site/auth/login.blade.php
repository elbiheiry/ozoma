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
      <title> INV | Invation Platform </title>

    <!-- Fave Icons
    ================================-->
    <link rel="shortcut icon" href="{{ surl('images/icon.png') }}" />

    <!-- CSS Files
    ================================-->
    <link rel="stylesheet" href="{{ surl('vendor/bootstrap/bootstrap.min.css') }}" />
    <script src="https://kit.fontawesome.com/b13df7021e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ surl('vendor/aos/animate.css') }}" />
    <link rel="stylesheet" href="{{ surl('vendor/aos/aos.css') }}" />
    <link rel="stylesheet" href="{{ surl('css/style.css') }}" />
</head>

<body>
    @include('site.layouts.models')
    <div class="loading">
        <div class="load_cont">
            <img src="{{ surl('images/loading.gif') }}" />
        </div>
    </div>
    <!-- Header
    ==========================================-->
      <header class="fixed">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                     <a href="{{route('site.index')}}" class="logo" alt="logo">
                         <img src="{{ surl('images/logo.png') }}" />
                      </a>
                      <ul class="links">
                        <li>
                            <a href="{{ route('site.register') }}" class="link">
                                إنشاء حساب جديد
                            </a>
                       </li>
                     </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Section
    ==========================================-->
    <section class="login_section">
        <form class="login shadow login-form" method="POST" action="{{ route('site.login') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h3>تسجيل دخول</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="  رقم الهاتف " name="phone" />
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <button class="link" type="submit">
                            <span> تسجيل دخول </span>
                        </button>
                        <div class="w-100">
                             <a href="{{route('site.index')}}" class="logo" alt="logo">
                              
                      العودة للرئيسية
                      </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- JS & Vendor Files
    ==========================================-->
    <script src="{{ surl('vendor/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ surl('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ surl('vendor/aos/aos.js') }}"></script>

    <script src="{{ aurl('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ surl('js/main.js') }}"></script>
    <script src="{{ aurl('js/admin.js') }}"></script>

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
</body>

</html>
