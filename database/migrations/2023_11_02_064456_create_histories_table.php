<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Mã người dùng');
            $table->string('username');
            $table->string('link')->nullable()->comment('Link chạy dịch vụ của người dùng');
            $table->uuid('uid')->nullable();
            $table->string('msg')->nullable()->comment('Tên log');
            $table->integer('count')->nullable()->comment('Số lượng');
            $table->bigInteger('price')->comment('Giá dịch vụ hoặc số tiền cộng, trừ, hoàn');
            $table->bigInteger('price_current')->comment('Tiền hiện tại của user');
            $table->bigInteger('price_left')->comment('Số tiền sau khi sử dụng dịch vụ hoặc cộng, trừ, hoàn');
            $table->string('math')->nullable()->comment('Dấu toán tử để hiển thị ra view');
            $table->string('type')->nullable()->comment('Loại dịch vụ');
            $table->string('server')->nullable()->comment('Server dịch vụ');
            $table->timestamp('time')->nullable();
            $table->string('site')->nullable();
            $table->integer('original')->nullable();
            $table->integer('present')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('note')->nullable()->comment('Ghi chú của khách hàng');
            $table->string('admin_note')->nullable()->comment('Ghi chú của admin');
            $table->tinyInteger('status')->nullable();
            $table->longText('data')->nullable()->comment('Dùng cho các dịch vụ comment');
            $table->integer('refund_count')->nullable()->comment('Số lượng hoàn');
            $table->bigInteger('refund_subtraction')->nullable()->comment('Số tiền giao dịch hoàn');
            $table->string('other')->nullable();
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
