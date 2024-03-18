<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link red_bc" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">+ تعديل البيانات</div>
        <form method="put" action="{{ route('site.profile.contacts.contacts.update', ['id' => $contact->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <div class="form-group">
                <label> الأسم </label>
                <input type="text" class="form-control" name="name" value="{{ $contact->name }}" />
            </div>

            <div class="form-group">
                <label> رقم الهاتف </label>
                <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" />
            </div>

            <div class="form-group">
                <label> البريد الألكتروني </label>
                <input type="email" class="form-control" name="email" value="{{ $contact->email }}" />
            </div>
            <div class="form-group">
                <label> مجموعة الإتصال </label>
                <select name="user_group_id" class="form-control">
                    <option {{ is_null($contact->user_group_id) ? 'selected' : '' }} value="">إختر مجموعة الإتصال (إذا
                        وجدت )</option>
                    @foreach (auth()->guard('site')->user()->groups
    as $group)
                        <option value="{{ $group->id }}"
                            {{ $contact->user_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="link" type="submit">
                <span> + تعديل البيانات</span>
            </button>
        </form>
    </div>
</div>
