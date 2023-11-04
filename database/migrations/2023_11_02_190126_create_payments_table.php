<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('username');
            $table->string('price');
            $table->timestamp('time')->nullable();
            $table->string('note')->nullable();
            $table->boolean('user_read')->nullable();
            $table->boolean('is_auto')->nullable();
            $table->string('payment_source')->nullable();
            $table->string('extra')->nullable();
            $table->integer('auto_banks_id')->nullable();
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
