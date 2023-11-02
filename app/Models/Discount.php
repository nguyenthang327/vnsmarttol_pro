<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code_type',
        'code',
        'discount_percent',
        'limit_per_user',
        'enable',
        'min_order',
        'max_discount',
    ];
}
