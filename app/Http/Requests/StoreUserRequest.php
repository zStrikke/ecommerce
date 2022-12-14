<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed', // TODO: Mejorar esta validacion
            // Esto esta guay pero no me salian buenos mensajes: https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
            // Imagino que concatenando buenas reglas de validacion se puede conseguir casi.
            'email' => 'required|string|email|max:255|unique:users,email',
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
            'password.regex' => 'The :attribute format is invalid.',
        ];
    }
}
