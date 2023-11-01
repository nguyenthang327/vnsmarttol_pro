<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardRechargeHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_recharge_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('Mã người dùng');
            $table->text('type')->comment('Loại thẻ: Viettel, Mobifone, Vinaphone, Vietnamobile)');
            $table->unsignedBigInteger('denomination_money')->comment('Mệnh giá thẻ nạp');
            $table->unsignedBigInteger('actually_received')->comment('Thực nhận');
            $table->string('seri', 100)->comment('Số seri');
            $table->string('id_card', 100)->comment('Mã thẻ');
            $table->text('trans')->comment('Mã giao dịch');
            $table->unsignedTinyInteger('status')->comment('Trạng thái giao dịch');
            $table->string('identity_website')->comment('Mã định danh website');
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
        Schema::dropIfExists('card_recharge_history');
    }
}
