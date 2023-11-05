<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return SettingResource::collection(Setting::all());
    }

    public function store(SettingRequest $request)
    {
        return new SettingResource(Setting::create($request->validated()));
    }

    public function show(Setting $setting)
    {
        return new SettingResource($setting);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
        return new SettingResource($setting);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return response()->json();
    }
}
