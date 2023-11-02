<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Contact */
class ContactResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'content' => $this->content,
            'link' => $this->link,
            'identity_website' => $this->identity_website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
