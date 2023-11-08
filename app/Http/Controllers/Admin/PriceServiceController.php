<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceServiceController extends Controller
{
    protected $pathView = 'admin.pages.priceService.';

    public function index()
    {
        return view($this->pathView . 'index');
    }
}
