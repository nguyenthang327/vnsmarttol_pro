<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;

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
}
