<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'image',
        'content',
        'link',
        'identity_website',
    ];
}
