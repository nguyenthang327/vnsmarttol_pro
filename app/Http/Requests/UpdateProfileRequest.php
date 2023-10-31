<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateProfileRequest extends FormRequest
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
        $user = auth()->user();
    
        $rules = [
            'full_name' => 'required|string|max:255',
            'avatar' => 'nullable',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => ['nullable', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'facebook' => 'nullable',
            'new_password' => 'nullable|min:6|max:12',
            'confirm_password' => 'same:new_password',
        ];
    
        $rules['old_password'] = [];
        if($this->input('new_password')){
            $rules['old_password'] = ['required'];
        }

        if($this->input('old_password')){
            $rules['old_password'] = array_merge($rules['old_password'], [function ($attribute, $value, $fail) use ($user) {
                $check = Hash::check($value, $user->password);
                if(!$check){
                    return $fail(trans('language.old_password_incorrect'));
                }
            }]);
        }

        return $rules;
    }
}
