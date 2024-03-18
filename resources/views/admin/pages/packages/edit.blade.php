 <div class="modal-content">
     <div class="modal-body text-center">
         <button class="icon_link" data-dismiss="modal">
             <i class="fa fa-times"></i>
         </button>
         <div class="modal_title">تعديل بيانات الباقة</div>
         <form method="put" action="{{ route('admin.packages.update', ['id' => $package->id]) }}"
             class="ajax-form">
             @csrf
             @method('put')
             <div class="form-group">
                 <label> إسم الباقة </label>
                 <input type="text" class="form-control" name="name" value="{{ $package->name }}" />
             </div>
             <div class="form-group">
                 <label> السعر </label>
                 <input type="text" class="form-control" name="price" value="{{ $package->price }}" />
             </div>
             <div class="form-group">
                 <label> عدد الأشخاص </label>
                 <input type="text" class="form-control" name="persons" value="{{ $package->persons }}" />
             </div>
             <div class="form-group">
                 <label> الـمـمـيـزات </label>
                 <textarea class="form-control" name="advantages">{{ $package->advantages }}</textarea>
             </div>
             <button class="link green_bc" type="submit">
                 <span> حفظ التعديلات </span>
             </button>
         </form>
     </div>
 </div>
