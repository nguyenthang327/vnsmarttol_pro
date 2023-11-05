<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class DiscountRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'code_type' => ['required'],
            'code' => ['required'],
            'limit_per_user' => ['nullable', 'integer'],
            'enable' => ['nullable', 'integer'],
            'max_discount' => ['required', 'integer'],
        ];

        if ($this->input('code_type') !== 'money_gift') {
            $rules['discount_percent'] = ['required', 'integer', 'max:100'];
            $rules['min_order'] = ['required', 'integer'];
        }

        return $rules;
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
