<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
     /**
     * return register page
     * @return View
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return view('homepage.pages.register');
    }

    /**
     * client to register
     * @param \App\Http\Requests\Frontend\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request){
        try{
            DB::beginTransaction();
            $client = User::where('email', $request->email)
                ->where('username', $request->username)
                ->first();
            if(!$client){
                $apiKey = StringHelper::generateAPI();
                $agent = InforWebHelper::getAgent();
                $domain = InforWebHelper::getDomain();

                $client = User::create([
                    'username' => strtolower($request->username),
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'api' => $apiKey,
                    'cash' => 0,
                    'active' => 1,
                    'collaborator' => 0,
                    'ip' => RegisterRequest::capture()->ip(),
                    'device' => $agent,
                    'cheat' => 'on',
                    'identity_website' => $domain,
                ]);
                $role = Role::where('name', Role::ROLE_CLIENT)->first();
                
                if($role){
                    $client->syncRoles([$role->id]);
                }
            }else{
                return response()->json([
                    'status' => 0,
                    'msg' => trans('message.register_exists')
                ]);
                // return back()->with([
                //     'register_failed' => trans('message.register_exists'),
                // ]);
            }
    
            DB::commit();

            // redirect to login
            $credentials = [
                'username' => strtolower($request->username),
                'password' => $request->password,
            ];
            Auth::attempt($credentials, $request->has('remember_me'));
            $request->session()->regenerate();
            return response()->json([
                'status' => 1,
                'msg' => trans('message.register_successed')
            ]);
            // return redirect()->route('dashboard.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error("File: ".$e->getFile().'---Line: '.$e->getLine()."---Message: ".$e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => trans('message.register_failed')
            ]);
            // return back()->with([
            //     'register_failed' => trans('message.register_failed'),
            // ]);
        }
    }
}
