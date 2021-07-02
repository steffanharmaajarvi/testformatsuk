<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|max:255|min:5',
            'password' => 'required|max:255',
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
            'email.required' => 'Это поле обязательно для заполнения',
            'email.unique' => 'Данный e-mail уже зарегистрирован',
            'email.max' => 'Максимальная длина 255 символов',
            'email.min' => 'Минимальная длина 5 символов',
            'password.required' => 'Это поле обязательно для заполнения',
            'password.max' => 'Максимальная длина 255 символов'
        ];
    }


}
