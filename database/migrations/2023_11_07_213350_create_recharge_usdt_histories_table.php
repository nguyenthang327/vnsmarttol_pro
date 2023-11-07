<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeUsdtHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_usdt_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('Mã người dùng');
            $table->string('username')->comment('Tên tài khoản người dùng');
            $table->text('type')->comment('Loại dịch vụ bên thứ 3');
            $table->unsignedBigInteger('usdt_number')->comment('Số usdt nạp');
            $table->unsignedBigInteger('actually_received')->nullable()->comment('Thực nhận');
            $table->string('name', 100)->comment('Tên hóa đơn');
            $table->string('description', 100)->comment('Mô tả hóa đơn');
            $table->text('trans')->nullable()->comment('Mã giao dịch');
            $table->string('status')->nullable()->comment('Trạng thái nạp');
            $table->string('from_address')->nullable()->comment('Địa chỉ ví người nạp');
            $table->string('token')->nullable()->comment('Địa chỉ ví người nạp');
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
        Schema::dropIfExists('recharge_usdt_histories');
    }
}
