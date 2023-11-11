<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Setting;
use DB;
use Log;

class NotificationService
{
    /**
     * @throws \Exception
     */
    public function createOrUpdateNotification($id, $image, $isPin, $isVisible, $content)
    {
        DB::beginTransaction();
        $messageError = "Đã xảy ra lỗi trong quá trình thao tác";
        try {
            if ($id && is_numeric($id)) {
                $notificationOld = Notification::find($id);
                if (!$notificationOld) {
                    $messageError = "Không tồn tại thông báo";
                    throw new \Exception();
                }
                $notificationOld->update([
                    'image' => $image,
                    'is_pin' => $isPin,
                    'is_visible' => $isVisible,
                    'content' => $content,
                ]);
            } else {
                Notification::create([
                    'image' => $image,
                    'is_pin' => $isPin,
                    'is_visible' => $isVisible,
                    'content' => $content,
                    'identity_website' => config('license.domain')
                ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('[NotificationService][createOrUpdateNotification] error:' . $e->getMessage());
            throw new \Exception($messageError);
        }
    }

    public function updateNotifyByKey($id, $key, $value)
    {
        try {
            $notify = Notification::where('id', $id)->first();
            if (!$notify) {
                throw new \Exception("Không tìm thấy thông báo.");
            }
            $notify->update([$key => $value]);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
