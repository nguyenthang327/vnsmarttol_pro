<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Setting */
class SettingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'favicon' => $this->favicon,
            'background' => $this->background,
            'menu_header_bg' => $this->menu_header_bg,
            'menu_color' => $this->menu_color,
            'landing_page' => $this->landing_page,
            'auth_widget' => $this->auth_widget,
            'password_lv2' => $this->password_lv2,
            'title' => $this->title,
            'description' => $this->description,
            'og_title' => $this->og_title,
            'og_site_name' => $this->og_site_name,
            'og_description' => $this->og_description,
            'og_type' => $this->og_type,
            'og_url' => $this->og_url,
            'og_keywords' => $this->og_keywords,
            'og_image' => $this->og_image,
            'google_site_verification' => $this->google_site_verification,
            'ga_id' => $this->ga_id,
            'gtag_id' => $this->gtag_id,
            'zalo' => $this->zalo,
            'fanpage' => $this->fanpage,
            'phone' => $this->phone,
            'link_video_1' => $this->link_video_1,
            'link_video_2' => $this->link_video_2,
            'min_charge_lv1' => $this->min_charge_lv1,
            'total_charge_lv1' => $this->total_charge_lv1,
            'min_charge_lv2' => $this->min_charge_lv2,
            'total_charge_lv2' => $this->total_charge_lv2,
            'min_charge_lv3' => $this->min_charge_lv3,
            'total_charge_lv3' => $this->total_charge_lv3,
            'offer_percent' => $this->offer_percent,
            'offer_from' => $this->offer_from,
            'offer_to' => $this->offer_to,
            'bank_prefix' => $this->bank_prefix,
            'enable_referral' => $this->enable_referral,
            'referral_percent' => $this->referral_percent,
            'video_referral' => $this->video_referral,
            'referral_note' => $this->referral_note,
            'payment_note' => $this->payment_note,
            'payment_popup_content' => $this->payment_popup_content,
            'show_header' => $this->show_header,
            'notify_new_user' => $this->notify_new_user,
            'token_subgiare' => $this->token_subgiare,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
