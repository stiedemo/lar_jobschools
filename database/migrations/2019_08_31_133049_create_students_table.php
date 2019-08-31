<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hovaten');
            $table->integer('gioitinh');
            $table->date('ngaysinh');
            $table->string('sodienthoai');
            $table->string('sodienthoaiphuhuynh');
            $table->integer('id_address')->unsigned();
            $table->string('chucvu');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
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
        Schema::dropIfExists('students');
    }
}
