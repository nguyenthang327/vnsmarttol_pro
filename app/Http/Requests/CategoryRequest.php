<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'integer'],
            'icon' => ['nullable'],
            'name' => ['nullable'],
            'slug' => ['nullable'],
            'content' => ['nullable'],
            'display' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
