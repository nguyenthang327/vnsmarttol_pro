<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'username' => ['required'],
            'price' => ['required'],
            'time' => ['nullable', 'date'],
            'note' => ['nullable'],
            'user_read' => ['nullable'],
            'is_auto' => ['nullable'],
            'payment_source' => ['nullable'],
            'extra' => ['nullable'],
            'auto_banks_id' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
