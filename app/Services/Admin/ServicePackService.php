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
}
