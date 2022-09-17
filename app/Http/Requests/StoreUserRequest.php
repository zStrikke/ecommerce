<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;

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
            'password' => Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), //https://laravel.com/docs/8.x/validation#validating-passwords
            'email' => 'required|string|email|max:255|unique:users,email',
            'file' => 'sometimes|required|image|min:1|max:4000',
            /* ---------  User address data  -------------- */
            'add_user_address' => 'sometimes',
            'address_line1' => 'exclude_unless:add_user_address,on|filled|alpha_num|min:3|max:255',
            'address_line2' => 'exclude_unless:add_user_address,on|filled|alpha_num|min:3|max:255',
            'city' => 'exclude_unless:add_user_address,on|filled|alpha_num|min:3|max:255',
            'postal_code' => 'exclude_unless:add_user_address,on|filled|digits:5',
            'country' => 'exclude_unless:add_user_address,on|filled|alpha|min:3|max:255',
            'phone' => 'exclude_unless:add_user_address,on|filled|digits:9|starts_with:6,7,9',
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
