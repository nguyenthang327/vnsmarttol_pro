<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeCardHistory extends Model
{
    use HasFactory;

    protected $table = 'recharge_card_histories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const STATUS_SUCCESS = 1;
    const STATUS_PENDING = 2;
    const STATUS_ERROR= 3;
    const STATUS_MAINTAIN= 4;
}
