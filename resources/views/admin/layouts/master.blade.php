<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('admin.layouts.head')

<body data-spy="scroll" data-target="#header_spy" data-offset="70" class="gray_bc">
    @stack('models')
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
    <!-- Preloader
    ==========================================-->
    <div class="loading">
        <div class="load_cont">
            <img src="{{ aurl('images/loading.gif') }}" />
        </div>
    </div>
    @include('admin.layouts.sidebar')
    @include('admin.layouts.header')
    @yield('content')

    @include('admin.layouts.scripts')
</body>

</html>
