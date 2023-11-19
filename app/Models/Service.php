<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'sort',
        'name',
        'display_name',
        'slug',
        'icon',
        'content',
        'instructional_video',
        'visible',
        'category_id',
    ];
}
