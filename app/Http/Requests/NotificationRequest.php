<?php

namespace App\Http\Requests;

class NotificationRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $rules = [];
        if ($this->method() == 'POST') {
            $rules = [
                'image' => ['nullable', 'string', 'max:240'],
                'is_pin' => ['nullable'],
                'is_visible' => ['nullable'],
                'content' => ['required', 'string'],
            ];
        }
        return $rules;
    }

    public function authorize(): bool
    {
        return true;
    }
}
