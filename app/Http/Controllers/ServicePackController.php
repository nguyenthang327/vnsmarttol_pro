<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePackRequest;
use App\Http\Resources\ServicePackResource;
use App\Models\ServicePack;
use App\Services\Admin\ServicePackService;

class ServicePackController extends Controller
{
    protected $servicePackService;

    public function __construct(ServicePackService $servicePackService)
    {
        $this->servicePackService = $servicePackService;
    }

    public function store(ServicePackRequest $request, $type)
    {
        try {
            $typeService = $type;
            $codeServer = $request->input('code_server');
            $serverService = $request->input('server_service');
            $apiServer = $request->input('api_service');
            $name = $request->input('name');
            $priceStock = $request->input('price_stock', 0);
            $minOrder = $request->input('min_order', 50);
            $maxOrder = $request->input('max_order', 50000);
            $note = $request->input('note', '');
            if ($type == 'facebook' && $apiServer == 'subgiare') {
                $check = ServicePack::where([
                    'code_server' => $codeServer,
                    'server_service' => $serverService,
                    'api_service' => $apiServer,
                ])->first();
                if ($check) {
                    throw new \Exception('Dịch vụ đã tồn tại');
                }
                // Gọi phương thức trong ServicePackService để tạo dịch vụ gói
                $this->servicePackService->createServicePack($typeService, $codeServer, $serverService, $apiServer, $name, $priceStock, $minOrder, $maxOrder, $note);
                return response()->json([
                    "status" => 1,
                    "msg" => "Thao tác thành công!",
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "Không tìm thấy loại dịch vụ này."
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
