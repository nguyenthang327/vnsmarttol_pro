<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreConfigBankRequest extends FormRequest
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
            'bank_code' => 'required|in:mbbank,other',
            'bank_name' => 'required|string|max:200',
            'card_holder' => 'required|string|max:200',
            'account_number' => 'required|string|max:200',
            'url_image' => 'nullable|string|max:240',
            'note' => 'required',
            'min_bank' => 'required|integer|min:1',
            'discount' => 'required|numeric|min:0',
            "password_bank" => 'nullable',
            'token' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 0,
                'msg' => $validator->errors()->first()
            ], Response::HTTP_OK)
        );
    }
}
