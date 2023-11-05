<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api');
            $table->string('ip');
            $table->text('device');
            $table->string('cheat');
            $table->string('identity_website')->nullable();
            // table modified by vulct
            $table->tinyInteger('status')->nullable()->default(1)->comment('Trạng thái');
            $table->integer('spin_count')->nullable()->default(0)->comment('Số lượt quay');
            $table->string('full_name', '32')->nullable()->comment('Tên');
            $table->string('all_money', '255')->nullable()->default(0)->comment('Tổng nạp');
            $table->string('avatar', '255')->nullable()->comment('Avatar');
            $table->string('facebook', '255')->nullable()->comment('Facebook');
            $table->string('phone', '12')->nullable()->comment('Phone');
            $table->string('reason', '255')->nullable()->comment('Lý do chặn');
            $table->tinyInteger('ugroup')->nullable()->default(0)->comment('0 => Thành Viên, 1 => Cộng tác viên, 2 => Đại lý, 3 => Nhà phân phối');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
