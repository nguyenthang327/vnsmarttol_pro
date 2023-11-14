<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order' => ['required', 'integer'],
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
            'min_order' => ['required', 'integer'],
            'max_order' => ['required', 'integer'],
            'content' => ['required'],
            'display' => ['required'],
            'note_admin' => ['nullable'],
            'show_comment' => ['nullable', 'integer'],
            'show_camxuc' => ['nullable', 'integer'],
            'server' => ['nullable'],
            'service_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
