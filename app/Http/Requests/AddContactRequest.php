<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContactRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.max' => 'Максимальная длина 255 символов',
            'phone.required' => 'Это поле обязательно для заполнения',
            'phone.max' => 'Максимальная длина 255 символов'
        ];
    }

}
