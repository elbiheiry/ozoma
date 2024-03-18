<div class="modal-content">
    <div class="modal-body text-center">
        <button class="icon_link" data-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <div class="modal_title">تعديل بيانات </div>
        <form method="put" action="{{ route('admin.invitations.types.update', ['id' => $type->id]) }}"
            class="ajax-form">
            @csrf
            @method('put')
            <div class="form-group">
                <label> الأسم </label>
                <input type="text" class="form-control" name="name" value="{{ $type->name }}" />
            </div>
            <button class="link green_bc" type="submit">
                <span> حفظ التعديلات </span>
            </button>
        </form>
    </div>
</div>
