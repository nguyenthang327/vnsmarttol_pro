<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $this->authorize('viewAny', Notification::class);
        return NotificationResource::collection(Notification::all());
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

    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);
        return new NotificationResource($notification);
    }

    public function update(NotificationRequest $request, Notification $notification)
    {
        $this->authorize('update', $notification);
        $notification->update($request->validated());
        return new NotificationResource($notification);
    }

    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);
        $notification->delete();
        return response()->json();
    }

    public function notifications()
    {
        return view('admin.pages.notifications.index');
    }

    public function ajaxGetNotification(Request $request)
    {
        // Lấy dữ liệu từ request
        $draw = $request->input('draw');
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

    public function show_last_notify()
    {

    }
}
