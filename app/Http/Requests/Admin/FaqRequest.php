<?php

namespace App\Http\Requests\Admin;

use App\Models\Faq;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FaqRequest extends FormRequest
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
            'question' => ['required' , 'string' , 'max:255'],
            'answer' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'question' => 'السؤال',
            'answer' => 'الوصف'
        ];
    }

    public function store()
    {
        Faq::create($this->all());
    }

    public function update($id)
    {
        Faq::findOrFail($id)->update($this->all());
    }
}
