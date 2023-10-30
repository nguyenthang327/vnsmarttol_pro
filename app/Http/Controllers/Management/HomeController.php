<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(){
        try{
            $user = Auth::user();
            return view('management.pages.dashboard.index', compact('user'));
        }catch(Exception $e){
            Log::error('[HomeController][index] error:' . $e->getMessage());
            return back()->with(['error' => trans('message.error')]);
        }
    }
}
