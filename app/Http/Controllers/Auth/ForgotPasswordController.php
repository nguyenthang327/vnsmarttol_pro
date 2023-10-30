<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordByOtpRequest;
use App\Jobs\SendMailForgotPasswordJob;
use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
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

        return view('homepage.pages.forgot-password');
    }

    /**
     * send otp 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::where('email', $request->input('email'))
                ->first();
            if (!$user) {
                return response()->json([
                    'status' => 0,
                    'msg' => trans('message.user_not_exists')
                ]);
            }

            $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            OTP::create([
                'user_id' => $user->id,
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(config('constants.time_expires_at')),
                'status' => OTP::STATUS_UNUSED,
            ]);

            dispatch(new SendMailForgotPasswordJob($user, $code));

            DB::commit();
            return response()->json([
                'status' => 1,
                'msg' => trans('message.success'),
                'data' => $user->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => trans('message.error')
            ]);
        }
    }

    public function changePassByOTP(ChangePasswordByOtpRequest $request)
    {
        try {
            DB::beginTransaction();
            User::where('id', $request->input('user_id'))->update(['password' => Hash::make($request->input('password'))]);

            OTP::where('user_id', $request->input('user_id'))
                ->where('code', $request->input('code'))
                ->update(['status' => OTP::STATUS_USED]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'msg' => trans('message.success')
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => trans('message.error')
            ]);
        }
    }
}
