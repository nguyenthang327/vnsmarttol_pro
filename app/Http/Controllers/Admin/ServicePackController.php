<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePackRequest;
use App\Models\ServicePack;
use App\Models\Setting;
use App\Services\Admin\ServicePackService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicePackController extends Controller
{
    protected $pathView = 'admin.pages.service_packs.';
    protected $servicePackService;

    public function __construct(ServicePackService $servicePackService)
    {
        $this->servicePackService = $servicePackService;
    }

    public function index(Request $request, $type)
    {
        $settings = Setting::select('token_subgiare')->first();
        if (empty($settings) || empty($settings->token_subgiare)) {
            return redirect()->route('admin.setting.index');
        }
        return view('admin.pages.service_packs.index', [
            'type' => $type,
            'name' => strtoupper($type)
        ]);
    }

    public function store(ServicePackRequest $request, $type)
    {
        try {
            $apiServer = $request->input('api_service', 'subgiare');
            if ($apiServer == 'subgiare') {
                $typeService = strtolower($type);
                $codeServer = $request->input('code_server');
                $serverService = $request->input('server_service');
                $name = $request->input('name');
                $priceStock = $request->input('price_stock', 0);
                $minOrder = $request->input('min_order', 50);
                $maxOrder = $request->input('max_order', 50000);
                $note = $request->input('note', '');
                if (in_array($typeService, ServicePack::ARRAY_SOCIAL)) {
                    $check = ServicePack::where([
                        'type_server' => $typeService,
                        'code_server' => $codeServer,
                        'server_service' => $serverService,
                        'api_service' => $apiServer
                    ])->first();
                    if ($check) {
                        throw new Exception("Dịch vụ {$typeService} này đã tồn tại");
                    }
                    // Gọi phương thức trong ServicePackService để tạo dịch vụ gói
                    $this->servicePackService->createServicePack($typeService, $codeServer, $serverService, $apiServer, $name, $priceStock, $minOrder, $maxOrder, $note);
                    return response()->json(["status" => 1, "msg" => "Thao tác thành công!",]);
                } else {
                    return response()->json(["status" => 0, "msg" => "Không tìm thấy loại dịch vụ này."]);
                }
            } else {
                return response()->json(["status" => 0, "msg" => "Không tồn tại server api cho dịch vụ này."]);
            }
        } catch (Exception $e) {
            return response()->json(["status" => 0, "msg" => $e->getMessage()]);
        }
    }

    public function ajaxGetServicePacks(Request $request, $type)
    {
        // Lấy dữ liệu từ request
        $start = $request->input('start');
        $length = $request->input('length');
        $order_by = $request->input('order_by');
        $order_dir = $request->input('order_dir');
        // Thực hiện truy vấn dựa trên thông tin từ request
        $query = ServicePack::query();
        $query->where(['type_server' => $type, 'api_service' => 'subgiare']);
        $query->orderBy($order_by, $order_dir);
        $subGiaRe = $query->skip($start)->take($length)->get();
        // Định dạng dữ liệu trả về
        $result = [
            'aaData' => $subGiaRe,
            'iTotalDisplayRecords' => $subGiaRe->count(),
            'iTotalRecords' => ServicePack::where(['type_server' => $type, 'api_service' => 'subgiare'])->count(),
        ];
        // Trả về dữ liệu dưới định dạng JSON
        return response()->json($result);
    }

    public function edit(ServicePack $service_pack)
    {
        $type = $service_pack->type_server;
        $name = strtoupper($type);
        return view('admin.pages.service_packs.edit',
            compact('service_pack', 'type', 'name')
        );
    }

    public function update(ServicePackRequest $request)
    {
        try {
            $servicePack = ServicePack::where('id', $request->input('service_pack_id'))->first();
            if (!$servicePack) {
                return response()->json(["status" => 0, "msg" => "Không tìm thấy dịch vụ này."]);
            }
            $apiServer = $request->input('api_service', 'subgiare');
            if ($apiServer == 'subgiare') {
                $typeService = strtolower($servicePack->type_server);
                $codeServer = $request->input('code_server');
                $serverService = $request->input('server_service');
                $name = $request->input('name');
                $priceStock = $request->input('price_stock', 0);
                $minOrder = $request->input('min_order', 50);
                $maxOrder = $request->input('max_order', 50000);
                $note = $request->input('note', '');
                $status = $request->input('status_server', 'on');
                if (in_array($typeService, ServicePack::ARRAY_SOCIAL)) {
                    $this->servicePackService->updateServicePack($servicePack, $typeService, $codeServer, $serverService, $apiServer, $name, $priceStock, $minOrder, $maxOrder, $note, $status);
                    return response()->json(["status" => 1, "msg" => "Thao tác thành công!",]);
                } else {
                    return response()->json(["status" => 0, "msg" => "Không tìm thấy loại dịch vụ này."]);
                }
            } else {
                return response()->json(["status" => 0, "msg" => "Không tồn tại server api cho dịch vụ này."]);
            }
        } catch (Exception $e) {
            return response()->json(["status" => 0, "msg" => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            $this->servicePackService->deleteServicePack($id);
            $response = [
                'status' => 1,
                'msg' => 'OK'
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
