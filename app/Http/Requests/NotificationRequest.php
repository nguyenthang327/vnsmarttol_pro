<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable'],
            'is_pin' => ['nullable'],
            'is_visible' => ['nullable'],
            'content' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
