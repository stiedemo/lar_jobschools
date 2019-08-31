<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemDanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diem_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_thoigianbieu')->unsigned();
            $table->integer('id_student')->unsigned();
            $table->integer('comat');
            $table->integer('vangmat');
            $table->integer('noidung');
            $table->timestamps();
            $table->foreign('id_thoigianbieu')->references('id')->on('thoi_gian_bieu');
            $table->foreign('id_student')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diem_danhs');
    }
}
