<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable'],
            'content' => ['nullable'],
            'link' => ['nullable'],
            'identity_website' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
