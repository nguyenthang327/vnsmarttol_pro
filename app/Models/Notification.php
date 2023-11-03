<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'image',
        'is_pin',
        'is_visible',
        'content',
    ];
}
