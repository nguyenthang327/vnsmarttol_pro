<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $pathView = 'admin.pages.orders.';

    public function buff()
    {
        return view($this->pathView . 'buff');
    }
}
