<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietThoiKhoaBieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_thoi_khoa_bieu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thu');
            $table->integer('buoi');
            $table->string('monhoc');
            $table->integer('start');
            $table->integer('sotiet');
            $table->integer('id_thoikhoabieu')->unsigned();
            $table->timestamps();
            $table->foreign('id_thoikhoabieu')->references('id')->on('thoi_khoa_bieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_thoi_khoa_bieu');
    }
}
