<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code_type');
            $table->string('code');
            $table->integer('discount_percent');
            $table->integer('limit_per_user')->nullable();
            $table->tinyInteger('enable')->nullable()->default(1);
            $table->integer('min_order')->nullable();
            $table->integer('max_discount');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
