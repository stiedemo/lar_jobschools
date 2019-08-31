<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('hovaten');
            $table->date('ngaysinh');
            $table->integer('gioitinh');
            $table->integer('id_chucvu')->unsigned();
            $table->string('class');
            $table->string('school');
            $table->integer('id_address')->unsigned();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_chucvu')->references('id')->on('chuc_vu');
            $table->foreign('id_address')->references('id')->on('address_xaphuongthitran');
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
