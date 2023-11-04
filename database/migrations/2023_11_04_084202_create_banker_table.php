<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banker', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->comment('Tên ngân hàng');
            $table->string('card_holder')->comment('Chủ thẻ');
            $table->string('account_number')->comment('Số tài khoản');
            $table->string('note')->nullable()->comment('Nội dung');
            $table->string('min_bank')->default(1)->comment('Số tiền chuyển tối thiểu');
            $table->unsignedInteger('discount')->default(100)->comment('Tỷ giá');
            $table->text('url_image')->nullable()->comment('URL ảnh');
            $table->string('user_bank')->comment('Tài khoản ngân hàng để đăng nhập');
            $table->string('password_bank')->comment('Mật khẩu ngân hàng để đăng nhập');
            $table->text('token')->nullable()->comment('Token thẻ ngân hàng');
            $table->string('bank_code')->comment('Mã bank');
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
        Schema::dropIfExists('banker');
    }
}
