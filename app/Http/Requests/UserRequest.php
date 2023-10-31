<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'regex:/^[A-Za-z]{1}[A-Za-z0-9]{5,20}$/', 'unique:users,username'],
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'facebook' => 'url',
            'password' => 'required|string|min:6|max:60',
            'ugroup' => 'required|integer|in:0,1,2,3',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 0,
                'msg' => $validator->errors()->first()
            ], Response::HTTP_OK)
        );
    }
}
