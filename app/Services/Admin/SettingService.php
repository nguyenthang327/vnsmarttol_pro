<?php

namespace App\Services\Admin;

class SettingService
{
    public function updateSettings($request)
    {
        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception("Không tìm thấy thông tin cấu hình.");
        }
    }
}
