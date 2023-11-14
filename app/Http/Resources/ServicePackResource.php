<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ServicePack */
class ServicePackResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order' => $this->order,
            'name' => $this->name,
            'price' => $this->price,
            'cost' => $this->cost,
            'min_order' => $this->min_order,
            'max_order' => $this->max_order,
            'content' => $this->content,
            'display' => $this->display,
            'note_admin' => $this->note_admin,
            'show_comment' => $this->show_comment,
            'show_camxuc' => $this->show_camxuc,
            'reaction' => $this->show_camxuc,
            'code_server' => $this->reaction,
            'type_server' => $this->code_server,
            'api_server' => $this->type_server,
            'status_server' => $this->api_server,
            'service_id' => $this->service_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
