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
                            <a href="{{route('site.index')}}" class="link">
                                العودة للرئيسية 
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
        <form class="login shadow" method="POST" action="{{ route('site.register') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h3>تسجيل دخول</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="  الإسم بالكامل " name="name" />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <i class="fa fa-envelope"></i>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="  البريد الإلكتروني " name="email" />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                         <i class="fa fa-phone"></i>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="  رقم الهاتف " name="phone" />

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <i class="fa fa-lock"></i>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="  الرقم السري " name="password" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <i class="fa fa-lock"></i>
                        <input type="password" class="form-control" placeholder=" تاكيد الرقم السري "
                            name="password_confirmation" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <button class="link" type="submit">
                            <span> تسجيل دخول </span>
                        </button>
                       
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

    <script src="{{ surl('js/main.js') }}"></script>
</body>

</html>
