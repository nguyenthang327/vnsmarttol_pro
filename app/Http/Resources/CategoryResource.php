<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Category */
class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sort' => $this->sort,
            'icon' => $this->icon,
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'display' => $this->display,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
