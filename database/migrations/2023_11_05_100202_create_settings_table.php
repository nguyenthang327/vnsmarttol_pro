<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('background')->nullable();
            $table->string('menu_header_bg')->nullable();
            $table->string('menu_color')->nullable();
            $table->string('landing_page')->nullable();
            $table->string('auth_widget')->nullable();
            $table->string('password_lv2')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_site_name')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_url')->nullable();
            $table->text('og_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('google_site_verification')->nullable();
            $table->string('ga_id')->nullable();
            $table->string('gtag_id')->nullable();
            $table->string('zalo')->nullable();
            $table->string('fanpage')->nullable();
            $table->string('phone')->nullable();
            $table->string('link_video_1')->nullable();
            $table->string('link_video_2')->nullable();
            $table->string('min_charge_lv1')->nullable();
            $table->integer('total_charge_lv1')->nullable();
            $table->text('note_lv1')->nullable();
            $table->integer('min_charge_lv2')->nullable();
            $table->integer('total_charge_lv2')->nullable();
            $table->text('note_lv2')->nullable();
            $table->integer('min_charge_lv3')->nullable();
            $table->integer('total_charge_lv3')->nullable();
            $table->text('note_lv3')->nullable();
            $table->integer('offer_percent')->nullable();
            $table->dateTime('offer_from')->nullable();
            $table->dateTime('offer_to')->nullable();
            $table->string('bank_prefix')->nullable();
            $table->string('enable_referral')->nullable();
            $table->integer('referral_percent')->nullable();
            $table->string('video_referral')->nullable();
            $table->text('referral_note')->nullable();
            $table->text('payment_note')->nullable();
            $table->text('payment_popup_content')->nullable();
            $table->boolean('show_header')->nullable()->comment('Hiển thị thông báo nổi');
            $table->boolean('show_last_notify')->nullable()->comment('Hiển thị popup thông báo mới nhất');
            $table->boolean('admin_tele_on_payment')->nullable()->comment('Nhận thông báo về Telegram khi người dùng nạp tiền');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
