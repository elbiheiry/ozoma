<?php

namespace App\Http\Requests\Admin;

use App\Models\InvitationTypeTemplate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvitationTypeTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }

    /**
     * on creation set validation rules 
     *
     * @return array
     */
    protected function onCreate() {
        return [
            'image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'name' => ['required' , 'string' , 'max:255'],
            'invitation_type_id' => ['not_in:0']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'image' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'name' => ['required' , 'string' , 'max:255'],
            'invitation_type_id' => ['not_in:0']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
    }

    public function attributes()
    {
        return [
            'image' => 'صورة القالب',
            'name' => 'إسم القالب',
            'invitation_type_id' => 'النوع التابع له'
        ];
    }

    public function store()
    {
        $data = $this->all();

        $data['image'] = image_manipulate($this->image , 'templates' , 300 , 250);

        InvitationTypeTemplate::create($data);
    }

    public function update($id)
    {
        $template = InvitationTypeTemplate::findOrFail($id);

        $data = $this->except('image');

        if ($this->image) {
            image_delete($template->image , 'templates');
            $data['image'] = image_manipulate($this->image , 'templates' , 300 , 250);
        }

        $template->update($data);
    }
}
