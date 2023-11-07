<?php

namespace App\Services\Management;

use App\Models\RechargeUSDTHistory;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class USDTService
{
    public function store($request){
        DB::beginTransaction();
        try{
            $user = auth()->user();
            $params = [
                'user_id' => $user->id,
                'username' => $user->username,
                'type' => 'fpayment.co',
                'usdt_number' => $request->usdt_number,
                'name' => "Tài khoản $user->username nạp usdt",
                'description' => "Tài khoản $user->username nạp usdt"
            ];

            $data = RechargeUSDTHistory::create($params);

            $setting = Setting::first();

            $urlCallback = '';
            $urlReturn = '';

            $result = json_decode(Http::get("https://fpayment.co/api/AddInvoice.php?address_wallet=$setting->usdt_address_wallet&token_wallet=$setting->usdt_token_wallet&name=$data->name&description=$data->name&amount=$data->usdt_number&request_id=$data->id&callback=$urlCallback&return_url=$urlReturn"));
            
            DB::commit();
            return $data;
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[USDTService][store] error:' . $e->getMessage());
            throw new Exception('[USDTService][store] error: ' . $e->getMessage());
        }
    }
}