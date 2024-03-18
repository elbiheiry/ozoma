<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('site.layouts.head')

<body data-spy="scroll" data-target="#header_spy" data-offset="80">
    <div class="loading">
        <div class="load_cont">
            <img src="{{ surl('images/loading.gif') }}" />
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" id="delete-form" method="post">
                @csrf
                @method('delete')
                <div class="modal-body text-center">
                    <div class="modal_title">هل أنت متاكد ؟</div>

                    <button class="link red_bc m-0" type="submit">
                        <span> حذف </span>
                    </button>
                    <button class="link green_bc m-0" data-dismiss="modal">
                        <span> إغلاق </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('site.layouts.models')
    @stack('models')
    @if (request()->routeIs('site.index'))
        <a href="#invitations" class="scroll_btn">
            قم بالتمرير لمعرفة المزيد ...
        </a>
    @endif

    <!-- Header
    ==========================================-->
    @include('site.layouts.header')
    @yield('content')
    <!-- Footer
    ==========================================-->

    @include('site.layouts.footer')
    <!--end Footer-->
    <a href="https://wa.me/" target="_blank" class="whats_btn fab fa-whatsapp shadow"></a>
    @include('site.layouts.scripts')
</body>

</html>
