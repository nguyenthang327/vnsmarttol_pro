<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreRechargeCardRequest extends FormRequest
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
            'NetworkCode' => 'required|in:' . 'VIETTEL' . ',' . 'MOBIFONE'  . ',' . 'VINAPHONE'  . ',' . 'VIETNAMOBILE',
            'NumberCard' => 'required',
            'SeriCard' => 'required',
            'PricesExchange' => 'required|in:' . 10000 . ',' . 20000 . ',' . 30000 . ',' . 50000 . ',' . 100000 . ',' . 200000 . ',' . 300000 . ',' . 500000 . ',' . 1000000,
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
