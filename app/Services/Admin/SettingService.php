<?php

namespace App\Services\Admin;

use App\Models\Setting;

class SettingService
{
    /**
     * @throws \Exception
     */
    public function updateSettings($request)
    {
        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception("Không tìm thấy thông tin cấu hình.");
        }

        // Lấy dữ liệu từ request và cập nhật vào model Setting
        $setting->update([
            'logo' => $request->input('logo'),
            'favicon' => $request->input('favicon'),
            'background' => $request->input('background'),
            'menu_header_bg' => $request->input('css.menu_header_bg'),
            'menu_color' => $request->input('menu_color'),
            'landing_page' => $request->input('landing_page'),
            'auth_widget' => $request->input('auth_widget'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'og_title' => $request->input('og_title'),
            'og_site_name' => $request->input('og_site_name'),
            'og_description' => $request->input('og_description'),
            'og_type' => $request->input('og_type'),
            'og_url' => $request->input('og_url'),
            'og_keywords' => $request->input('og_keywords'),
            'og_image' => $request->input('og_image'),
            'google_site_verification' => $request->input('google_site_verification'),
            'ga_id' => $request->input('ga_id'),
            'gtag_id' => $request->input('data.gtag_id'),
            'zalo' => $request->input('zalo'),
            'fanpage' => $request->input('fanpage'),
            'phone' => $request->input('phone'),
            'link_video_1' => $request->input('link_video_1'),
            'link_video_2' => $request->input('link_video_2'),
            'min_charge_lv1' => $request->input('min_charge_lv1'),
            'total_charge_lv1' => $request->input('total_charge_lv1'),
            'min_charge_lv2' => $request->input('min_charge_lv2'),
            'total_charge_lv2' => $request->input('total_charge_lv2'),
            'min_charge_lv3' => $request->input('min_charge_lv3'),
            'total_charge_lv3' => $request->input('total_charge_lv3'),
            'offer_percent' => $request->input('offer_percent'),
            'offer_from' => $request->input('offer_from'),
            'offer_to' => $request->input('offer_to'),
            'bank_prefix' => $request->input('bank_prefix'),
            'payment_note' => $request->input('payment_note'),
            'payment_popup_content' => $request->input('payment_popup_content'),
            'card_partner_id' => $request->input('card_partner_id'),
            'card_partner_key' => $request->input('card_partner_key'),
            'card_discount' => $request->input('card_discount'),
            'usdt_address_wallet' => $request->input('usdt_address_wallet'),
            'usdt_token_wallet' => $request->input('usdt_token_wallet'),
            'usdt_discount' => $request->input('usdt_discount'),
        ]);
    }

    public function getAllSettings()
    {
        return Setting::first();
    }

    public function toggleSetting($field, $value)
    {
        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception("Không tìm thấy thông tin cấu hình.");
        }
        if (isset($setting->$field)) {
            // Cập nhật giá trị của trường tương ứng với key
            $setting[$field] = $value;
            $setting->save();
        } else {
            throw new \Exception("Trường '$field' không tồn tại trong thông tin cấu hình.");
        }
    }

    public function getNotesByLevel($level)
    {
        $noteLevel = 'note_lv' . $level;
        // Tìm các bản ghi Setting với mức độ (level) tương ứng
        $settings = Setting::first();
        return $settings->isEmpty() ? null : $settings->pluck($noteLevel);
    }

    public function updateNoteByLevel($level, $content)
    {
        $noteLevel = 'note_lv' . $level;
        $setting = Setting::first();
        // Kiểm tra xem mô hình Setting có tồn tại và trường `note_lvX` có tồn tại không
        if ($setting && isset($setting->$noteLevel)) {
            // Cập nhật trường `note_lvX` với nội dung mới
            $setting->$noteLevel = $content;
            $setting->save();
        } else {
            throw new \Exception("Không tìm thấy trường 'note_lv$level' hoặc không tìm thấy thông tin cấu hình.");
        }
    }

    public function updateSetting($key, $value)
    {
        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception("Không tìm thấy thông tin cấu hình.");
        }

        $setting->update([$key => $value]);
    }
}
