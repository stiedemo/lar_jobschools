<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThoiGianBieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thoi_gian_bieu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_thoikhoabieu')->unsigned();
            $table->integer('id_kehoach')->unsigned();
            $table->string('noidung');
            $table->timestamps();
            $table->foreign('id_thoikhoabieu')->references('id')->on('chi_tiet_thoi_khoa_bieu');
            $table->foreign('id_kehoach')->references('id')->on('phan_cong_ke_hoach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thoi_gian_bieu');
    }
}
