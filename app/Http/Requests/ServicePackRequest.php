<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'integer'],
            'name' => ['required'],
            'display_name' => ['nullable'],
            'price_stock' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
            'min_order' => ['required', 'integer'],
            'max_order' => ['required', 'integer'],
            'content' => ['required'],
            'visible' => ['required'],
            'note_admin' => ['nullable'],
            'note' => ['nullable'],
            'info' => ['nullable'],
            'show_comment' => ['nullable', 'integer'],
            'show_camxuc' => ['nullable', 'integer'],
            'reaction' => ['nullable'],
            'code_server' => ['required'],
            'type_server' => ['required'],
            'api_service' => ['required'],
            'status_server' => ['nullable'],
            'service_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
