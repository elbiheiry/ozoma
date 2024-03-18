@extends('site.layouts.master')
@push('models')
    <div class="modal fade" id="select_package" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button class="icon_link red_bc" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal_title">أختر الباقة المناسبة</div>
                    <form method="post" action="{{ route('site.store1') }}" class="first-step-form">
                        @csrf
                        @method('post')
                        <input type="hidden" name="template" id="template-input">
                        @foreach ($packages as $package)
                            <div class="form-group wide_check_item">
                                <input type="radio" name="package_id" id="pack{{ $package->id }}"
                                    value="{{ $package->id }}" />
                                <label for="pack{{ $package->id }}">
                                    <span> {{ $package->name }} ({{ $package->price }} ريال) </span>
                                    قم بدعوة ما يصل إلى {{ $package->persons }} ضيفًا
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="link green_bc m-0">
                            <span> إنشاء الدعوة </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <!-- Main Section ==========================================-->
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row">
                    <div class="col-12 flex">
                        <h3>
                            <button class="categery_btn fa fa-bars"></button>
                            دعوات مميزة
                        </h3>
                        {{-- <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="بحث" />
                                <button class="icon_link fa fa-search"></button>
                            </div>
                        </form> --}}
                    </div>
                    <div class="col-lg-2">
                        <div class="category_nav">
                            <div class="title">
                                الأقـسـام

                                <button class="categery_btn fa fa-times"></button>
                            </div>
                            <ul>
                                @foreach ($types as $type)
                                    <li><a href="javascript:;" class="type-button"
                                            data-url="{{ route('site.invitation1.templates', ['id' => $type->id]) }}">{{ $type->name }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row" id="templates-area">
                            @isset($types)
                                @foreach ($types[0]->templates as $template)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <button class="design_item template" data-id="{{ $template->id }}">
                                            <img src="{{ get_image($template->image, 'templates') }}" />
                                            <h3>{{ $template->name }}</h3>
                                        </button>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).on('click', '.type-button', function() {
            var url = $(this).data('url');

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    $('#templates-area').html(data);
                }
            });
        });
        $(document).on('click', '.template', function() {
            var id = $(this).data('id');
            $('#template-input').val(id);
            $('#select_package').modal('show');
        });
        $(document).on('submit', '.first-step-form', function() {
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
                    window.location.href = response
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    notification("danger", response, "fas fa-times");
                    form.find(":submit").attr('disabled', false).html("<span> إنشاء الدعوة </span>");
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
@endpush
