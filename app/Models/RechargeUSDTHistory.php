<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeUSDTHistory extends Model
{
    use HasFactory;

    protected $table = 'recharge_usdt_histories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const STATUS_COMPLETED = 'completed';
    const STATUS_WAITING = 'waiting';
    const STATUS_EXPIRED= 'expired';
}
