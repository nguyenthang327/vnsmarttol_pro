<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'price',
        'time',
        'note',
        'user_read',
        'is_auto',
        'payment_source',
        'extra',
        'auto_banks_id',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];
}
