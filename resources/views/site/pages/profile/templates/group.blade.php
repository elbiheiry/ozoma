<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link red_bc" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">تعديل بيانات مجموعة إتصال</div>
        <form method="put" action="{{ route('site.profile.contacts.groups.update', ['id' => $group->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <div class="form-group">
                <label> إسم المجموعة </label>
                <input type="text" class="form-control" name="name" value="{{ $group->name }}" />
            </div>

            <button class="link" type="submit">
                <span> حفظ التعديلات </span>
            </button>
        </form>
    </div>
</div>
