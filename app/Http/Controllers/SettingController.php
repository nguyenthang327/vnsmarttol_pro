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

    public function toggle(Request $request)
    {
        try {
            $field = $request->input('key');
            $value = $request->input('value');

            $this->settingService->toggleSetting($field, $value);

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

    public function getNotesByLevel(Request $request)
    {
        try {
            $level = $request->input('level'); // Mức độ (level) mà bạn cung cấp

            // Gọi phương thức trong SettingService để lấy ghi chú theo mức độ
            $notes = $this->settingService->getNotesByLevel($level);

            return response()->json([
                "status" => 1,
                "msg" => "Thao tác thành công!",
                "note" => $notes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function updateNoteByLevel(Request $request)
    {
        try {
            $level = $request->input('level'); // Mức độ (level) mà bạn cung cấp
            $content = $request->input('content'); // Nội dung cần cập nhật

            // Gọi phương thức trong SettingService để cập nhật ghi chú theo mức độ
            $this->settingService->updateNoteByLevel($level, $content);

            return response()->json([
                "status" => 1,
                "msg" => "Thao tác thành công!",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
