<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Payment */
class PaymentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'username' => $this->username,
            'price' => $this->price,
            'time' => $this->time,
            'note' => $this->note,
            'user_read' => $this->user_read,
            'is_auto' => $this->is_auto,
            'payment_source' => $this->payment_source,
            'extra' => $this->extra,
            'auto_banks_id' => $this->auto_banks_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
