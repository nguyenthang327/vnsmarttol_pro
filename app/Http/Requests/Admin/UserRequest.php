<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'regex:/^[A-Za-z]{1}[A-Za-z0-9]{5,20}$/', 'unique:users,username'],
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
            'phone' => ['nullable', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'facebook' => 'nullable|url',
            'password' => 'required|string|min:6|max:12',
            'ugroup' => 'required|integer|in:0,1,2,3',
            'spin_count' => 'nullable|integer',
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
