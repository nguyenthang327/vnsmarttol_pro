<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Models\Setting;
use App\Services\Admin\SettingService;
use App\Services\NotificationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    protected $notificationService;
    protected $settingService;

    public function __construct(NotificationService $notificationService, SettingService $settingService)
    {
        $this->notificationService = $notificationService;
        $this->settingService = $settingService;
    }

    public function notifications(NotificationRequest $request)
    {
        if ($request->isMethod('get')) {
            $setting = Setting::select(['notify_new_user', 'show_last_notify'])->first();
            return view('admin.pages.notifications.index', [
                'setting' => $setting
            ]);
        } else {
            return $this->store($request);
        }
    }

    public function store(NotificationRequest $request)
    {
        try {
            $id = $request->input('id');
            $image = $request->input('image');
            $isPin = $request->input('is_pin', 0);
            $isVisible = $request->input('is_visible', 1);
            $content = $request->input('content');
            $this->notificationService->createOrUpdateNotification($id, $image, $isPin, $isVisible, $content);
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

    /**
     * @throws \Exception
     */
    public function show(Request $request)
    {
        $id = $request->input('id');
        try {
            $data = Notification::where('id', $id)->first();
            if (!$data) {
                throw new \Exception('Không tìm thấy thông báo');
            }
            return response()->json([
                'status' => 1,
                'msg' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            $this->notificationService->deleteNotify($id);
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

    public function ajaxGetNotifications(Request $request)
    {
        // Lấy dữ liệu từ request
        $start = $request->input('start');
        $length = $request->input('length');
        $order_by = $request->input('order_by');
        $order_dir = $request->input('order_dir');
        // Thực hiện truy vấn dựa trên thông tin từ request
        $query = Notification::query();
        $query->orderBy($order_by, $order_dir);
        $data = $query->skip($start)->take($length)->get();
        // Định dạng dữ liệu trả về
        $result = [
            'aaData' => $data,
            'iTotalDisplayRecords' => $data->count(),
            'iTotalRecords' => Notification::count(),
        ];
        // Trả về dữ liệu dưới định dạng JSON
        return response()->json($result);
    }

    public function showLastNotify(Request $request)
    {
        $show_last_notify = $request->input('show_last_notify');
        $status = is_numeric($show_last_notify) ? $show_last_notify : 0;
        try {
            $this->settingService->updateSettingByKey('show_last_notify', $status);
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

    public function toggle(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'id' => ['required', 'exists:notifications,id']
            ]);
            if ($validate->fails()) {
                return response()->json([
                    "status" => 0,
                    "msg" => $validate->errors()->first()
                ]);
            }
            $requests = $request->all();
            $id = $requests['id'];
            $key = array_key_last($requests);
            $value = $requests[$key];
            $this->notificationService->updateNotifyByKey($id, $key, $value);
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

    public function notifyNewUser(Request $request)
    {
        $notify_new_user = $request->input('notify_new_user');
        try {
            $this->settingService->updateSettingByKey('notify_new_user', $notify_new_user);
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

    /**
     * @throws Exception
     */
    public function deleteNotify($id)
    {
        $notify = Notification::find($id);

        if (!$notify) {
            throw new \Exception("Không tìm thấy thông báo");
        }

        $notify->delete();
    }
}
