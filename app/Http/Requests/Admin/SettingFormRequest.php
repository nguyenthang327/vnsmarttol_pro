<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseFormRequest;

class SettingFormRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'logo' => ['nullable', 'string', 'max:255'],
            'favicon' => ['nullable', 'string', 'max:255'],
            'background' => ['nullable', 'string', 'max:255'],
            'menu_header_bg' => ['nullable', 'string', 'max:255'],
            'menu_color' => ['nullable', 'string', 'max:255'],
            'landing_page' => ['nullable', 'string', 'max:255'],
            'auth_widget' => ['nullable', 'string', 'max:255'],
            'password_lv2' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_site_name' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string', 'max:255'],
            'og_type' => ['nullable', 'string', 'max:255'],
            'og_url' => ['nullable', 'string', 'max:255'],
            'og_keywords' => ['nullable', 'string', 'max:255'],
            'og_image' => ['nullable', 'string', 'max:255'],
            'google_site_verification' => ['nullable', 'string', 'max:255'],
            'ga_id' => ['nullable', 'string', 'max:255'],
            'gtag_id' => ['nullable', 'string', 'max:255'],
            'zalo' => ['nullable', 'string', 'max:255'],
            'fanpage' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'link_video_1' => ['nullable', 'string', 'max:255'],
            'link_video_2' => ['nullable', 'string', 'max:255'],
            'min_charge_lv1' => ['nullable', 'string', 'max:255'],
            'total_charge_lv1' => ['nullable', 'integer', 'string', 'max:255'],
            'min_charge_lv2' => ['nullable', 'integer', 'string', 'max:255'],
            'total_charge_lv2' => ['nullable', 'integer', 'string', 'max:255'],
            'min_charge_lv3' => ['nullable', 'integer', 'string', 'max:255'],
            'total_charge_lv3' => ['nullable', 'integer', 'string', 'max:255'],
            'offer_percent' => ['nullable', 'integer', 'string', 'max:255'],
            'offer_from' => ['nullable', 'date', 'string', 'max:255'],
            'offer_to' => ['nullable', 'date', 'string', 'max:255'],
            'bank_prefix' => ['nullable', 'string', 'max:255'],
            'enable_referral' => ['nullable', 'string', 'max:255'],
            'referral_percent' => ['nullable', 'integer', 'string', 'max:255'],
            'video_referral' => ['nullable', 'string', 'max:255'],
            'referral_note' => ['nullable', 'string', 'max:255'],
            'payment_note' => ['nullable', 'string', 'max:255'],
            'payment_popup_content' => ['nullable', 'string', 'max:255'],
            'show_header' => ['nullable', 'boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
