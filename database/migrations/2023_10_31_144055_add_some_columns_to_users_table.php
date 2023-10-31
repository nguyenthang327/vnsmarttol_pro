<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('full_name',255)->nullable()->comment('Họ và tên');
            $table->text('avatar')->nullable()->comment('Ảnh');
            $table->string('phone', 20)->nullable()->comment('Số điện thoại');
            $table->text('facebook')->nullable()->comment('Link facebook');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('avatar');
            $table->dropColumn('phone');
            $table->dropColumn('facebook');
        });
    }
}
