<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Question */
class QuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            'identity_website' => $this->identity_website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
