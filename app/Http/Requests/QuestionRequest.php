<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required'],
            'answer' => ['required'],
            'identity_website' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
