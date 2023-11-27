<?php

namespace App\Services\Admin;

use App\Models\ServicePack;

class ServicePackService
{
    public function createServicePack($typeService, $codeServer, $serverService, $apiServer, $name, $priceStock, $minOrder, $maxOrder, $note)
    {
        // Tạo một bản ghi ServicePack mới
        $servicePack = new ServicePack();
        $servicePack->type_server = $typeService;
        $servicePack->code_server = $codeServer;
        $servicePack->server_service = $serverService;
        $servicePack->api_service = $apiServer;
        $servicePack->name = $name;
        $servicePack->price_stock = $priceStock;
        $servicePack->min_order = $minOrder;
        $servicePack->max_order = $maxOrder;
        $servicePack->note = $note;
        $servicePack->service_id = 1;
        $servicePack->save();
    }

    public function updateServicePack($servicePack, $typeService, $codeServer, $serverService, $apiServer, $name, $priceStock, $minOrder, $maxOrder, $note, $status)
    {
        $servicePack->update([
            'type_server' => $typeService,
            'code_server' => $codeServer,
            'server_service' => $serverService,
            'api_service' => $apiServer,
            'name' => $name,
            'price_stock' => $priceStock,
            'min_order' => $minOrder,
            'max_order' => $maxOrder,
            'note' => $note,
            'service_id' => 1,
            'status_server' => $status,
        ]);
    }

    /**
     * @throws \Exception
     */
    public function deleteServicePack($id)
    {
        $servicePack = ServicePack::find($id);
        if (!$servicePack) {
            throw new \Exception("Không tồn tại dịch vụ");
        } else {
            $servicePack->delete();
        }
    }
}
