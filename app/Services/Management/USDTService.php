<?php

namespace App\Services\Management;

use App\Models\RechargeUSDTHistory;
use Exception;
use Illuminate\Support\Facades\DB;
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
            ];

            $data = RechargeUSDTHistory::create($params);

            $result = json_decode(Http::get("https://api.web2m.com/$path/$password/$sotaikhoan/$token"));
            
            DB::commit();
            return $data;
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[USDTService][store] error:' . $e->getMessage());
            throw new Exception('[USDTService][store] error: ' . $e->getMessage());
        }
    }
}