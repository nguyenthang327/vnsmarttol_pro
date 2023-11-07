<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseFormRequest;

class ContactFormRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable'],
            'content' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'identity_website' => ['nullable'],
        ];
    }
}
