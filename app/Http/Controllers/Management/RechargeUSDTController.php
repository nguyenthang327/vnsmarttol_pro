<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\Management\USDTService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RechargeUSDTController extends Controller
{

    protected $USDTService;

    public function __construct(USDTService $USDTService) {
        $this->USDTService = $USDTService;
    }
    public function index()
    {
        return view();
    }

    public function store(Request $request)
    {
        try{    
            $data = $this->USDTService->store($request);
            return response()->json([
                "status" => 1,
                "msg" => 'Đang tạo hóa đơn, nhập hóa đơn để tiếp tục giao dịch',
                "data" => $data,
            ]);
        }catch(Exception $e){
            Log::error('[RechargeUSDTController][store] error:' . $e->getMessage());
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
