<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'admin_note',
        'count',
        'data',
        'user_id',
        'link',
        'username',
        'math',
        'uid',
        'msg',
        'price',
        'price_current',
        'price_left',
        'type',
        'server',
        'time',
        'site',
        'original',
        'present',
        'order_id',
        'order_code',
        'type_service',
        'note',
        'status',
        'refund_count',
        'refund_subtraction',
        'other',
        'identity_website',
    ];

    protected $casts = [
        'uid' => 'string',
        'time' => 'datetime',
    ];

    const TYPE_RECHARGE_CARD = 'recharge_card';
    const TYPE_BANK_MB = 'bank_mb';
}
