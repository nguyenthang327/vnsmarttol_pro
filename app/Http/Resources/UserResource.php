<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'api' => $this->api,
            'ip' => $this->ip,
            'device' => $this->device,
            'cheat' => $this->cheat,
            'identity_website' => $this->identity_website,
            'status' => $this->status,
            'spin_count' => $this->spin_count,
            'full_name' => $this->full_name,
            'price' => (int)$this->price,
            'all_money' => (int)$this->all_money,
            'avatar' => $this->avatar,
            'facebook' => $this->facebook,
            'phone' => $this->phone,
            'reason' => $this->reason,
            'ugroup' => $this->ugroup,
            'created_at' => $this->created_at
        ];
    }
}
