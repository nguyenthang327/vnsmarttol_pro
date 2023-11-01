<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('Mã người dùng');
            $table->text('type')->comment('Loại giao dịch: Like nhanh, Card, MB Bank');
            $table->unsignedBigInteger('coin_first')->comment('Số tiền trước giao dịch');
            $table->unsignedBigInteger('coin_second')->comment('Số tiền sau giao dịch');
            $table->unsignedBigInteger('coin')->comment('Số tiền giao dịch');
            $table->text('code_order')->comment('Mã code giao giao dịch');
            $table->string('identity_website')->comment('Mã định danh website');
            $table->text('note')->nullable()->comment('Ghi chú, nội dung giao dịch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
