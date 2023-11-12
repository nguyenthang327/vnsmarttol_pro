<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'sort',
        'icon',
        'name',
        'slug',
        'content',
        'display',
    ];
}
