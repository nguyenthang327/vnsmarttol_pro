<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->nullable()->default(0)->comment('Thứ tự hiển thị');
            $table->string('icon')->nullable()->comment('Class icon của fontawesome');
            $table->string('name')->nullable()->comment('Tên danh mục');
            $table->string('slug')->unique()->nullable()->comment('Đường dẫn danh mục');
            $table->longText('content')->nullable()->comment('Nội dung danh mục');
            $table->boolean('visible')->nullable()->default(0)->comment('Trạng thái hiển thị');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
