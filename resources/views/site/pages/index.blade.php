@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 flex">
                    <h1 class="animated fadeInUp" style="animation-delay: 0.3s">
                        INV 
                        
                         منصة
                        <span> الدعوات </span> الألكترونية
                    </h1>
                    <h3 class="animated fadeInUp" style="animation-delay: 0.5s">
                        دعوات الكترونية بشكل كامل تغنيك عن أي كرت دعوة آخر ، تصل لضيوفك
                        بكل سهوله عبر الواتساب مع خاصية تأكيد الحضور التي تصلك لحظه بلحظه
                        . وباركود دخول خاص لكل ضيف لتنظيم الدخول يوم مناسبتك
                    </h3>
                    <ul class="animated fadeInUp" style="animation-delay: 0.7s">
                        <li>
                            <a href="{{route('site.invitation1')}}" class="link">
                                إبـــدا تـجـربـتـك
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.invitation1')}}" class="link">
                                إبـــدا دعــواتــك
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="animated fadeInUp video_cover" style="animation-delay: 0.7s">
                        <div id="main_slider" class="carousel slide" data-ride="carousel" data-interval="10000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <video controls="hidden" autoplay muted loop width="100%" height="100%">
                                        <source src="{{ surl('images/video.m4v') }}" />
                                    </video>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ surl('images/slider2.jpg') }}" />
                                </div>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                                <li data-target="#main_slider" data-slide-to="1"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page_content">
        <nav class="navbar navbar-expand-lg nav_sticky" id="header_spy">
            <div class="container">
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="nav">
                        <li>
                            <a href="#invitations" class="nav-link"> الدعـوات</a>
                        </li>

                        <li>
                            <a href="#features" class="nav-link"> المـمـيـزات </a>
                        </li>
                        <li>
                            <a href="#congratulations" class="nav-link"> التهانى </a>
                        </li>
                        <li>
                            <a href="#pricing" class="nav-link"> الأسعار </a>
                        </li>
                        <li></li>

                        <li>
                            <a href="#clients" class="nav-link"> تجارب العملاء </a>
                        </li>
                        <li>
                            <a href="#faqs" class="nav-link"> الأسئلة الشائعة </a>
                        </li>
                    </ul>
                    <div>
                        <a href="{{route('site.invitation1')}}" class="link">
                            إبـــدا تـجـربـتـك
                        </a>
                        <a href="{{route('site.invitation1')}}" class="link">
                            إبـــدا دعــواتــك
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Start Section ==========================================-->
        <section id="invitations">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>الحياة أفضل معًا</h3>
                            <p>قم بإنشاء دعوات عبر الإنترنت لكل احتفال</p>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="60">
                        <div class="card_item">
                            <div class="cont color1">
                                <h3>عيد ميلاد للأطفال 🧒</h3>
                                <p>سليب اوفر ووحيد القرن والأبطال الخارقين والمزيد.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp1.png') }}" />
                                <img src="{{ surl('images/templates/temp1_2.png') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="90">
                        <div class="card_item">
                            <div class="cont color2">
                                <h3>استحمام الطفل 👶</h3>
                                <p>رش الطفل ، محايد بين الجنسين وأكثر من ذلك.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp2.jpg') }}" />
                                <img src="{{ surl('images/templates/temp2_2.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->

                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="120">
                        <div class="card_item">
                            <div class="cont color3">
                                <h3>عيد ميلاد لها 👩</h3>
                                <p>مفاجأة ، ذات طابع خاص ، علامة فارقة والمزيد.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp3.jpg') }}" />
                                <img src="{{ surl('images/templates/temp3_2.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->

                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="card_item">
                            <div class="cont color4">
                                <h3>احتفالات الربيع 🌺</h3>
                                <p>عيد الفصح وأعياد الميلاد وسينكو دي مايو وأكثر من ذلك.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp4.jpg') }}" />
                                <img src="{{ surl('images/templates/temp4_2.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->

                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="180">
                        <div class="card_item">
                            <div class="cont color5">
                                <h3>تجمع عائلي 👪</h3>
                                <p>لم شمل الأسرة ، وحفل الطعام ، وحفل العشاء والمزيد.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp5.jpg') }}" />
                                <img src="{{ surl('images/templates/temp5_2.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->

                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="210">
                        <div class="card_item last">
                            <div class="cont color6">
                                <h3>حدث احترافي 🖊️</h3>
                                <p>البيت المفتوح والإطلاق والاحتفال والخلاط.</p>
                            </div>
                            <div class="cover">
                                <img src="{{ surl('images/templates/temp6.jpg') }}" />
                                <img src="{{ surl('images/templates/temp6_2.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!--End Col-6-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
        <!-- Start Section ==========================================-->
        <section id="features">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>ميزات قوية للتخصيص بالكامل بطاقاتك ودعواتك عبر الإنترنت</h3>
                        </div>
                    </div>
                    @foreach ($features as $feature)
                        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="60">
                            <div class="feature_item">
                                <img src="{{ get_image($feature->icon, 'features') }}" />
                                <h3>{{ $feature->name }}</h3>
                                <p>
                                    {{ $feature->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <!--End Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->

        <!-- Start Section ==========================================-->
        <section id="congratulations">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>دعـوة خـاصـة</h3>
                            <h4>
                                ننشأ مجموعة كبيرة من التصميمات الحصرية والمعاصرة من أجلك
                                للتعبير عن أسلوبك وقصتك.
                            </h4>
                        </div>
                    </div>
                    <div class="col-lg-9" data-aos="fade-up" data-aos-delay="60">
                        <div class="owl-carousel owl-theme custom_slider">
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/1.png') }}" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/2.png') }}" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/3.png') }}" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/4.gif') }}" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/5.gif') }}" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="customize_invitation.html">
                                    <img src="{{ surl('images/design/6.gif') }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--End Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->

        <!-- Start Section  ==========================================-->
        <section id="pricing">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>أسـعـار الـدعـوات</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="package">
                            <table class="table price_table">
                                <thead>
                                    <tr>
                                        <th>حـجـم الـبـاقـة</th>
                                        <th>الـسـعـر</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                        <tr>
                                            <td>أكـثـر من {{ $package->persons }} مدعو</td>
                                            <td>{{ $package->price }} ريـال</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
        <!-- Start Section ==========================================-->
        <section id="clients">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>عملائنا</h3>
                            <p>نتشرف بخدمتكم</p>
                        </div>
                    </div>
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="60">
                        <div class="owl-carousel owl-theme story_slider">
                            @foreach ($testimonials as $testimonial)
                                <div class="item">
                                    <div class="story">
                                        <div class="cont">
                                            <h3>{{ $testimonial->title }}</h3>
                                            <h4>{{ $testimonial->subtitle }}</h4>
                                            <p>
                                                {{ $testimonial->description }}
                                            </p>
                                        </div>
                                        <img src="{{ get_image($testimonial->image, 'testimonials') }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
        <!-- Start Section ==========================================-->
        <section id="faqs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="30">
                        <div class="section_title">
                            <h3>الأسئلة الشائعة</h3>
                            <p>كل ماتحتاجه لإدارة دعوه مناسبتك</p>
                        </div>
                    </div>
                    <div class="col-lg-9" data-aos="fade-up" data-aos-delay="60">
                        <div class="accordion" id="tips">
                            @foreach ($faqs as $index => $faq)
                                <div class="panel">
                                    <a href="#toggle{{ $index }}" data-toggle="collapse"
                                        class="collapsed panel-title">
                                        {{ $faq->question }}
                                    </a>
                                    <!--End panel-title-->
                                    <div class="panel-collapse collapse" id="toggle{{ $index }}"
                                        data-parent="#tips">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                    <!--End Panel Collapse-->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
    </div>
@endsection
