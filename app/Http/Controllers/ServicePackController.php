<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePackRequest;
use App\Http\Resources\ServicePackResource;
use App\Models\ServicePack;

class ServicePackController extends Controller
{
    public function index()
    {
        return ServicePackResource::collection(ServicePack::all());
    }

    public function store(ServicePackRequest $request)
    {
        return new ServicePackResource(ServicePack::create($request->validated()));
    }

    public function show(ServicePack $servicePack)
    {
        return new ServicePackResource($servicePack);
    }

    public function update(ServicePackRequest $request, ServicePack $servicePack)
    {
        $servicePack->update($request->validated());
        return new ServicePackResource($servicePack);
    }

    public function destroy(ServicePack $servicePack)
    {
        $servicePack->delete();
        return response()->json();
    }
}
