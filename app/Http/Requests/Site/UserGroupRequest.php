<?php

namespace App\Http\Requests\Site;

use App\Models\UserGroup;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserGroupRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'string' , 'max:225']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'إسم المجموعة'
        ];
    }

    public function store()
    {
        UserGroup::create([
            'name' => $this->name,
            'user_id' => auth()->guard('site')->id()
        ]);
    }

    public function update($id)
    {
        UserGroup::findOrFail($id)->update($this->all());
    }
}
