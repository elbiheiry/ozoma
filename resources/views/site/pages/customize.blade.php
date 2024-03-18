@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="section_color add_invitation">
        <div class="container">
            <div class="white_bc">
                <div class="row m-0">
                    <div class="col-lg-7 col-md-6">
                        <div class="invite_setting">
                            <div class="invite_info">
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a data-toggle="tab" href="#t0" class="active">
                                            بـطـاقـة شـخـصـية
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#t1" class="">
                                            هـنـئ مـن تـحـب
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <form id="t0" class="tab-pane fade in active show ajax-form" style="max-width: 100%"
                                        method="post" action="{{ route('site.customize.new_template') }}">
                                        @csrf
                                        @method('post')
                                        <div class="form-group mb-15">
                                            <label> الأسم </label>
                                            <input type="text" class="form-control" name="name" />
                                        </div>
                                        <div class="form-group mb-15">
                                            <label> نموذج الدعوة </label>
                                            <select class="form-control" name="invitation_type_id">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-15">
                                            <div class="check_item upload_img">
                                                <input type="file" name="image" id="image-input1"
                                                    onchange="loadFile(event)" />
                                                <button type="button" class="link">+ تحميل صورة الدعوه</button>
                                            </div>
                                        </div>
                                        {{-- <button class="link">مـعـايـنـة</button> --}}
                                        <button class="link" type="submit">تـحـمـيـل</button>
                                    </form>
                                    <form id="t1" class="tab-pane fade in ajax-form" style="max-width: 100%" method="post"
                                        action="{{ route('site.customize.new_template') }}">
                                        @csrf
                                        @method('post')
                                        <div class="form-group mb-15">
                                            <label> إسـمـك </label>
                                            <input type="text" class="form-control" name="name" />
                                        </div>
                                        <div class="form-group mb-15">
                                            <label> إسـم الـمـرسـل إلـيـه </label>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="form-group mb-15">
                                            <label> نموذج الدعوة </label>
                                            <select class="form-control" name="invitation_type_id">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-15">
                                            <div class="check_item upload_img">
                                                <input type="file" name="image" id="image-input2"
                                                    onchange="loadFile1(event)" />
                                                <button type="button" class="link">+ تحميل صورة الدعوه</button>
                                            </div>
                                        </div>
                                        {{-- <button class="link">مـعـايـنـة</button> --}}
                                        <button class="link" type="submit">تـحـمـيـل</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--End Col-->
                    <div class="col-lg-5 col-md-6">
                        <div class="preview">
                            <img src="{{ surl('images/eid.jpg') }}" id="output" />
                        </div>
                    </div>
                    <!--End Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End Div-->
        </div>
        <!--End Container-->
    </section>
@endsection
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    var loadFile1 = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
