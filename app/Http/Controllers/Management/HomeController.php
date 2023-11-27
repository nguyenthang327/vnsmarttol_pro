<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\Admin\SettingService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        try {
            $user = Auth::user();
            $lastNotify = Notification::latest()->first();
            return view('management.pages.dashboard.index', [
                'user' => $user,
                'lastNotify' => $lastNotify,
            ]);
        } catch (Exception $e) {
            Log::error('[HomeController][index] error:' . $e->getMessage());
            return back()->with(['error' => trans('message.error')]);
        }
    }

    public function newUpdate()
    {
        return response()->json([
            'status' => 1,
            'msg' => 'Thao tác thành công!',
            'payment' => 0,
            'refund' => 0,
            'notify' => null
        ]);
    }

    public function darkMode(Request $request)
    {
        try {
            $this->settingService->updateSettingByKey('dark_mode', $request->input('dark_mode'));

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
