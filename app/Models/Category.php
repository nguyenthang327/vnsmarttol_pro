<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'sort',
        'icon',
        'name',
        'display_name',
        'slug',
        'content',
        'display',
    ];
}
