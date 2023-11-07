<?php

namespace App\Http\Controllers\Management\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacebookController extends Controller
{

    protected $pathView = 'management.pages.services.facebook.';

    public function sLike(){
        return view($this->pathView . "like-speed");
    }
}
