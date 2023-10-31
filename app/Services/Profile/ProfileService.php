<?php

namespace App\Services\Profile;

use App\Helpers\StringHelper;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileService
{
    public function updateProfile($request){
        DB::beginTransaction();
        try{
            $user = auth()->user();
            $user = User::where('id', $user->id)->first();

            $params = [
                'full_name' => $request->input('full_name'),
                'avatar' => $request->input('avatar'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'facebook' => $request->input('facebook'),
            ];
            if($request->input('old_password') && Hash::check($request->input('old_password'), $user->password)){
               $params['password'] = Hash::make($request->input('new_password')); 
               $params['api'] = StringHelper::generateAPI();
            }
            $user->update($params);

            DB::commit();
            return $user;
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[ProfileService][updateProfile] error:' . $e->getMessage());
            throw new Exception('[ProfileService][updateProfile] error: ' . $e->getMessage());
        }
    }
}