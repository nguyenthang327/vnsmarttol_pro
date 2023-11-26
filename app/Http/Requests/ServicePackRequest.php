<?php

namespace App\Http\Requests;

class ServicePackRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'integer'],
            'display_name' => ['nullable'],
            'cost' => ['nullable', 'numeric'],
            'min_order' => ['required', 'integer', 'min:0', 'lt:max_order'],
            'max_order' => ['required', 'integer', 'min:0', 'gt:min_order'],
            'content' => ['nullable'],
            'visible' => ['nullable'],
            'note_admin' => ['nullable'],
            'note' => ['nullable'],
            'info' => ['nullable'],
            'show_comment' => ['nullable', 'integer'],
            'show_camxuc' => ['nullable', 'integer'],
            'reaction' => ['nullable'],
            'code_server' => ['required'],
            'server_service' => ['required'],
            'api_service' => ['required'],
            'price_stock' => ['required', 'numeric', 'min:0'],
            'name' => ['required', 'string', 'max:255'],
            'status_server' => ['nullable'],
            'service_id' => ['nullable', 'integer'],
        ];
    }
}
