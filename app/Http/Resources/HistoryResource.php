<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\History */
class HistoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'username' => $this->username,
            'link' => $this->link,
            'uid' => $this->uid,
            'msg' => $this->msg,
            'count' => $this->count,
            'price' => $this->price,
            'price_current' => $this->price_current,
            'price_left' => $this->price_left,
            'math' => $this->math,
            'type' => $this->type,
            'server' => $this->server,
            'time' => $this->time,
            'site' => $this->site,
            'original' => $this->original,
            'present' => $this->present,
            'note' => $this->note,
            'admin_note' => $this->admin_note,
            'status' => $this->status,
            'data' => $this->data,
            'refund_count' => $this->refund_count,
            'refund_subtraction' => $this->refund_subtraction,
            'other' => $this->other,
            'order_id' => $this->order_id,
            'order_code' => $this->order_code,
            'type_service' => $this->type_service,
            'identity_website' => $this->identity_website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
