<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePack extends Model
{

    const ARRAY_SOCIAL = ['facebook', 'instagram', 'tiktok', 'twitter'];
    const SERVICE_PACK_STATUS = ['success', 'start', 'error'];

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
        'visible',
        'note_admin',
        'note',
        'info',
        'show_comment',
        'show_camxuc',
        'reaction',
        // details server
        'type_server',
        'code_server',
        'server_service',
        'api_service',
        'status_server',
        'identity_website',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!isset($model->attributes['identity_website']) || is_null($model->attributes['identity_website'])) {
                $model->attributes['identity_website'] = config('license.domain');
            }
        });
    }
}
