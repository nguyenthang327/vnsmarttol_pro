<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePack extends Model
{
    protected $fillable = [
        'sort',
        'name',
        'display_name',
        'price_stock',
        'price_lv0',
        'price_lv1',
        'price_lv2',
        'price_lv3',
        'min_order',
        'max_order',
        'content',
        'instructional_video',
        'visible',
        'note_admin',
        'note',
        'info',
        'show_comment',
        'show_camxuc',
        'reaction',
        'code_server',
        'type_server',
        'api_server',
        'status_server',
        'service_id',
        'identity_website',
    ];
}
