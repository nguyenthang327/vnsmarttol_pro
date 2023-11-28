<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SettingFormRequest;
use App\Models\Setting;
use App\Services\Admin\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        $settings = Setting::first();
        return view('admin.pages.settings.index', [
            'settings' => $settings
        ]);
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

    public function darkMode(Request $request)
    {
        try {
            $this->settingService->updateSettingByKey('dark_mode', $request->input('dark_mode', 0));

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
