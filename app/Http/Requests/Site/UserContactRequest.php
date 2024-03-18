<?php

namespace App\Http\Requests\Site;

use App\Models\UserContact;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserContactRequest extends FormRequest
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
            'name' => ['required' , 'string' , 'max:225'],
            'email' => ['required' , 'string' , 'email' , 'max:225','unique:user_contacts,email'],
            'phone' => ['required' , 'unique:user_contacts,phone']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'name' => ['required' , 'string' , 'max:225'],
            'email' => ['required' , 'string' , 'email' , 'max:225','unique:user_contacts,email,'.$this->id],
            'phone' => ['required' , 'unique:user_contacts,phone,'.$this->id]
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
            'name' => 'الإسم',
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف'
        ];
    }

    public function store()
    {
        $data = $this->all();
        $data['user_id'] = auth()->guard('site')->id();

        UserContact::create($data);
    }

    public function update($id)
    {
        UserContact::findOrFail($id)->update($this->all());
    }
}
