<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePack extends Model
{
    protected $fillable = [
        'sort',
        'name',
        'price',
        'cost',
        'min_order',
        'max_order',
        'content',
        'display',
        'note_admin',
        'show_comment',
        'show_camxuc',
        'server',
        'service_id',
    ];
}
