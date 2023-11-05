<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'logo' => ['nullable'],
            'favicon' => ['nullable'],
            'background' => ['nullable'],
            'menu_header_bg' => ['nullable'],
            'menu_color' => ['nullable'],
            'landing_page' => ['nullable'],
            'auth_widget' => ['nullable'],
            'password_lv2' => ['nullable'],
            'title' => ['nullable'],
            'description' => ['nullable'],
            'og_title' => ['nullable'],
            'og_site_name' => ['nullable'],
            'og_description' => ['nullable'],
            'og_type' => ['nullable'],
            'og_url' => ['nullable'],
            'og_keywords' => ['nullable'],
            'og_image' => ['nullable'],
            'google_site_verification' => ['nullable'],
            'ga_id' => ['nullable'],
            'gtag_id' => ['nullable'],
            'zalo' => ['nullable'],
            'fanpage' => ['nullable'],
            'phone' => ['nullable'],
            'link_video_1' => ['nullable'],
            'link_video_2' => ['nullable'],
            'min_charge_lv1' => ['nullable'],
            'total_charge_lv1' => ['nullable', 'integer'],
            'min_charge_lv2' => ['nullable', 'integer'],
            'total_charge_lv2' => ['nullable', 'integer'],
            'min_charge_lv3' => ['nullable', 'integer'],
            'total_charge_lv3' => ['nullable', 'integer'],
            'offer_percent' => ['nullable', 'integer'],
            'offer_from' => ['nullable', 'date'],
            'offer_to' => ['nullable', 'date'],
            'bank_prefix' => ['nullable'],
            'enable_referral' => ['nullable'],
            'referral_percent' => ['nullable', 'integer'],
            'video_referral' => ['nullable'],
            'referral_note' => ['nullable'],
            'payment_note' => ['nullable'],
            'payment_popup_content' => ['nullable'],
            'show_header' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
