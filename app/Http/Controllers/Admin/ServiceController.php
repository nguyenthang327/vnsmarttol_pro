<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $pathView = 'admin.pages.services.';

    public function facebookIndex()
    {
        return view($this->pathView . 'facebook');
    }
}
