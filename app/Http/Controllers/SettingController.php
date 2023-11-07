<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SettingFormRequest;
use App\Services\Admin\SettingService;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        return view('admin.pages.settings.index');
    }

    /**
     * @param SettingFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SettingFormRequest $request)
    {
        try {
            $this->settingService->updateSettings($request);

            return response()->json([
                "status" => 1,
                "msg" => "Cập nhật thành công."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
