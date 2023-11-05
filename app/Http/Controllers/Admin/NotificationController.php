<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Notification::class);
        return NotificationResource::collection(Notification::all());
    }

    public function store(NotificationRequest $request)
    {
        $this->authorize('create', Notification::class);
        return new NotificationResource(Notification::create($request->validated()));
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
