<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'integer'],
            'name' => ['nullable'],
            'slug' => ['nullable'],
            'icon' => ['nullable'],
            'content' => ['nullable'],
            'display' => ['nullable'],
            'category_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
