<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index(){
        try{
            $user = Auth::user();
            return view('management.pages.information.index', compact('user'));
        }catch(Exception $e){
            Log::error('[ProfileController][index] error:' . $e->getMessage());
            return back()->with(['error' => trans('message.error')]);
        }
    }
}
