<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'link',
        'uid',
        'msg',
        'count',
        'price',
        'price_current',
        'price_left',
        'math',
        'type',
        'server',
        'time',
        'site',
        'original',
        'present',
        'order_id',
        'note',
        'admin_note',
        'status',
        'data',
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
