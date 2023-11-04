<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankHistory extends Model
{
    use HasFactory;

    protected $table = 'bank_histories';

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const STATUS_SUCCESS = 1;

}
