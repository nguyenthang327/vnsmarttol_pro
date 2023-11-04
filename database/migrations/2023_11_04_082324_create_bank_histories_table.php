<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('Mã người dùng');
            $table->string('username')->comment('Tên tài khoản người dùng');
            $table->text('type')->comment('Loại ngân hàng');
            $table->text('trans')->comment('Mã giao dịch');
            $table->unsignedBigInteger('money')->comment('Số tiền nạp vào');
            $table->text('note')->nullable()->comment('Nội dung giao dịch');
            $table->unsignedTinyInteger('status')->comment('Trạng thái nạp');
            $table->string('identity_website')->nullable()->comment('Mã định danh website');
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
        Schema::dropIfExists('bank_histories');
    }
}
