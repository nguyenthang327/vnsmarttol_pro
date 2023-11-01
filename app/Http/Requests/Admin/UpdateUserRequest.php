<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->id,
            'full_name' => 'required|string|max:255',
            'phone' => ['nullable', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'facebook' => 'nullable|url',
            'password' => 'required|string|min:6|max:12',
            'ugroup' => 'required|integer|in:0,1,2,3',
            'spin_count' => 'nullable|integer',
            'status' => 'nullable|integer',
            'reason' => 'required|string|max:255',
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
