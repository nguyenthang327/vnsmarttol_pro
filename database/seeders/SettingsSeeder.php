<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'logo' => null,
            'favicon' => null,
            'background' => null,
            'menu_header_bg' => "#ffffff",
            'menu_color' => "default",
            'landing_page' => "page1",
            'auth_widget' => 1,
            'password_lv2' => "on",
            'title' => strtoupper(config('license.domain')) . " | Hệ thống Seeding hàng đầu Việt Nam",
            'description' => "Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok",
            'og_title' => strtoupper(config('license.domain')) . "HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING",
            'og_site_name' => strtoupper(config('license.domain')) . "HỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING",
            'og_description' => "Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok",
            'og_type' => "services",
            'og_url' => config('license.domain'),
            'og_keywords' => "Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...",
            'og_image' => null,
            'google_site_verification' => null,
            'ga_id' => null,
            'gtag_id' => null,
            'zalo' => null,
            'fanpage' => null,
            'phone' => null,
            'link_video_1' => "https://youtu.be/CutJVfDfRiE",
            'link_video_2' => "https://youtu.be/Z5ToDZw8XzA",
            'min_charge_lv1' => 200000,
            'total_charge_lv1' => 2000000,
            'note_lv1' => null,
            'min_charge_lv2' => 1000000,
            'total_charge_lv2' => 5000000,
            'note_lv2' => null,
            'min_charge_lv3' => 5000000,
            'total_charge_lv3' => 20000000,
            'note_lv3' => null,
            'offer_percent' => 0,
            'offer_from' => null,
            'offer_to' => null,
            'bank_prefix' => "naptien",
            'enable_referral' => "off",
            'referral_percent' => 5,
            'video_referral' => null,
            'referral_note' => null,
            'payment_note' => null,
            'payment_popup_content' => null,
            'show_header' => null,
            'show_last_notify' => null,
            'admin_tele_on_payment' => null,
            'enable_card_payment' => 0,
            'card_partner_id' => null,
            'card_partner_key' => null,
            'card_discount' => null,
            'enable_usdt_payment' => 0,
            'usdt_address_wallet' => null,
            'usdt_token_wallet' => null,
            'usdt_discount' => null,
            'token_subgiare' => null,
            'identity_website' => 'viplike.org',
        ]);
    }
}
