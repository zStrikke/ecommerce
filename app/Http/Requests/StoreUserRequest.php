<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
            'password' => Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),
            // Esto esta guay pero no me salian buenos mensajes: https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
            //https://laravel.com/docs/8.x/validation#validating-passwords
            // Imagino que concatenando buenas reglas de validacion se puede conseguir casi.
            'email' => 'required|string|email|max:255|unique:users,email',
            'file' => 'sometimes|required|image|min:1|max:4000'
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
