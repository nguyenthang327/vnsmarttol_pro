<?php

namespace App\Http\Requests;

use App\Models\OTP;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordByOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', function ($attribute, $value, $fail) {
                $otp = OTP::where('code', $value)
                    ->where('user_id', $this->user_id)
                    ->orderBy('id', 'desc')
                    ->first();
                if(!$otp){
                    return $fail(trans('language.otp_not_exist'));
                } else if($otp->status == OTP::STATUS_USED){
                    return $fail(trans('language.otp_used'));
                }
                $now = Carbon::now();
                $timeExpiredAt = Carbon::parse($otp->expires_at);
                if($now->gt($timeExpiredAt)){
                    return $fail(trans('language.otp_expired'));
                }
            }],
            'password' => ['required', 'min:6', 'max:32'],
        ];
    }
}
