<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'sort',
        'name',
        'slug',
        'icon',
        'content',
        'display',
        'category_id',
    ];
}
