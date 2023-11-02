<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Discount */
class DiscountResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code_type' => $this->code_type,
            'code' => $this->code,
            'discount_percent' => $this->discount_percent,
            'limit_per_user' => $this->limit_per_user,
            'enable' => $this->enable,
            'min_order' => $this->min_order,
            'max_discount' => $this->max_discount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
