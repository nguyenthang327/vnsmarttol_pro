<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'regex:/^[A-Za-z]{1}[A-Za-z0-9]{5,20}$/', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:32'],
            're_password' => 'required|same:password',
        ];
    }
}
