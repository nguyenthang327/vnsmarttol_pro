<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_packs', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->nullable()->default(0)->comment('Thứ tự hiển thị');
            $table->string('name')->comment('Tên gói dịch vụ');
            $table->string('display_name')->comment('Tên hiển thị gói dịch vụ');
            $table->float('price_stock')->comment('Giá gốc');
            $table->float('price_lv0')->comment('Giá thành viên');
            $table->float('price_lv1')->comment('Giá cộng tác viên');
            $table->float('price_lv2')->comment('Giá đại lý');
            $table->float('price_lv3')->comment('Giá nhà phân phối');
            $table->integer('min_order')->nullable()->default(0);
            $table->integer('max_order')->nullable()->default(0);
            $table->longText('content')->nullable();
            $table->string('instructional_video');
            $table->boolean('visible')->nullable()->default(0)->comment('Trạng thái hiển thị');
            $table->longText('note_admin')->nullable();
            $table->longText('note')->nullable();
            $table->longText('info')->nullable();
            $table->integer('show_comment')->nullable();
            $table->integer('show_camxuc')->nullable();
            $table->string('reaction')->nullable();
            $table->string('code_server')->nullable()->comment('Ví dụ: like_post_sale');
            $table->string('type_server')->nullable()->comment('MD5 facebook, tiktok,...');
            $table->string('api_server')->nullable()->comment('Server api: subgiare, baostart');
            $table->string('status_server')->nullable()->comment('Trạng thái server');
            $table->unsignedBigInteger('service_id');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_packs');
    }
};
