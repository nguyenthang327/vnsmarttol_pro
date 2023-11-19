<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'background',
        'menu_header_bg',
        'menu_color',
        'landing_page',
        'auth_widget',
        'password_lv2',
        'title',
        'description',
        'og_title',
        'og_site_name',
        'og_description',
        'og_type',
        'og_url',
        'og_keywords',
        'og_image',
        'google_site_verification',
        'ga_id',
        'gtag_id',
        'zalo',
        'fanpage',
        'phone',
        'link_video_1',
        'link_video_2',
        'min_charge_lv1',
        'total_charge_lv1',
        'note_lv1',
        'min_charge_lv2',
        'total_charge_lv2',
        'note_lv2',
        'min_charge_lv3',
        'total_charge_lv3',
        'note_lv3',
        'offer_percent',
        'offer_from',
        'offer_to',
        'bank_prefix',
        'enable_referral',
        'referral_percent',
        'video_referral',
        'referral_note',
        'payment_note',
        'payment_popup_content',
        'show_header',
        'show_last_notify',
        'admin_tele_on_payment',
        'enable_card_payment',
        'card_partner_id',
        'card_partner_key',
        'card_discount',
        'enable_usdt_payment',
        'usdt_address_wallet',
        'usdt_token_wallet',
        'usdt_discount',
        'notify_new_user',
        'token_subgiare',
        'identity_website'
    ];

    protected $casts = [
        'offer_from' => 'datetime',
        'offer_to' => 'datetime',
    ];
}
