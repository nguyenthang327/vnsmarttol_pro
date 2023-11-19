<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->nullable()->default(0)->comment('Thứ tự hiển thị');
            $table->string('name')->nullable()->comment('Tên dịch vụ');
            $table->string('display_name')->nullable()->comment('Tên hiển thị dịch vụ');
            $table->string('slug')->unique()->nullable()->comment('Đường dẫn dịch vụ');
            $table->string('icon')->nullable()->comment('Class icon của fontawesome');
            $table->longText('content')->nullable()->comment('Nội dung dịch vụ');
            $table->string('instructional_video')->nullable()->comment('Video hướng dẫn');
            $table->boolean('visible')->nullable()->default(0)->comment('Trạng thái hiển thị');
            $table->unsignedBigInteger('category_id')->nullable()->default(1)->comment('Danh mục cha');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
