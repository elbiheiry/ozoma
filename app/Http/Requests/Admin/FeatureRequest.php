<?php

namespace App\Http\Requests\Admin;

use App\Models\Feature;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FeatureRequest extends FormRequest
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
            'icon' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'name' => ['required' , 'string' , 'max:255'],
            'description' => ['required']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'icon' => ['image' , 'max:2048', 'mimes:png,jpg,jpeg'],
            'name' => ['required' , 'string' , 'max:255'],
            'description' => ['required']
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
            'icon' => 'الأيقونة',
            'name' => 'الإسم',
            'description' => 'الوصف'
        ];
    }

    public function store()
    {
        $data = $this->all();    
        $data['icon'] = image_manipulate($this->icon , 'features' , 68 , 68);
        
        Feature::create($data);
    }

    public function update($id)
    {
        $feature = Feature::findOrFail($id);

        $data = $this->all();

        if($this->icon){
            image_delete($feature->icon , 'features');
            $data['icon'] = image_manipulate($this->icon , 'features' , 68 , 68);
        }
        
        $feature->update($data);
    }
}
