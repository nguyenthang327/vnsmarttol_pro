<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class ContactRequest extends BaseRequest
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
