<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * return login page
     * @return View
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return view('homepage.pages.login');
    }

    /**
     * admin auth
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember_me'))) {
            $request->session()->regenerate();
            return response()->json([
                'status' => 1,
                'msg' => trans('message.login_successed')
            ]);
            // return redirect()->route('dashboard.index');
        }

        return response()->json([
            'status' => 0,
            'msg' => trans('message.error_login')
        ]);

        // return back()->withErrors([
        //     'login_failed' => trans('message.error_login')
        // ]);
    }

    /**
     * admin logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('homepage');
    }
}
