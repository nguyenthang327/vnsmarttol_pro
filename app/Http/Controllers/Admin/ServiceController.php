<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function facebookIndex()
    {
        return view('admin.pages.services.facebook');
    }
}
