 <div class="modal-content">
     <div class="modal-body text-center">
         <button class="icon_link" data-dismiss="modal">
             <i class="fa fa-times"></i>
         </button>
         <div class="modal_title">تعديل بيانات الباقة</div>
         <form method="put" action="{{ route('admin.faqs.update', ['id' => $faq->id]) }}" class="ajax-form">
             @csrf
             @method('put')
             <div class="form-group">
                 <label> السؤال </label>
                 <input type="text" class="form-control" name="question" value="{{ $faq->question }}" />
             </div>
             <div class="form-group">
                 <label> الوصف </label>
                 <textarea class="form-control" name="answer">{{ $faq->answer }}</textarea>
             </div>
             <button class="link green_bc" type="submit">
                 <span> حفظ التعديلات </span>
             </button>
         </form>
     </div>
 </div>
