<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code_type' => ['required'],
            'code' => ['required'],
            'discount_percent' => ['required', 'integer'],
            'limit_per_user' => ['nullable', 'integer'],
            'enable' => ['nullable', 'integer'],
            'min_order' => ['nullable', 'integer'],
            'max_discount' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
