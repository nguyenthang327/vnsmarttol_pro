<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banker extends Model
{
    use HasFactory;

    protected $table = 'banker';

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const DATA_BANKER = ['mbbank' => 'MB Bank', 'orther' => 'Khác - Không dùng Auto'];

}
