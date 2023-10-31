<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\Profile\ProfileService;
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

    public function update(UpdateProfileRequest $request){
        try{
            $profileService = new ProfileService();
            $data = $profileService->updateProfile($request);
            if(!$data){
                return response()->json([
                    'status' => 0,
                    'msg' => trans('message.user_not_exists')
                ]);
            }
            return response()->json([
                'status' => 1,
                'msg' => trans('message.success'),
                'data' => $data
            ]);
        }catch(Exception $e){
            Log::error('[ProfileController][updateProfile] error:' . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => trans('message.error')
            ]);
        }
    }
}
