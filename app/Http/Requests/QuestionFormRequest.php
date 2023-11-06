<?php

namespace App\Http\Requests;

class QuestionFormRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:255'],
            'identity_website' => ['nullable'],
        ];
    }
}
