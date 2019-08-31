<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeHoachHoatDongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ke_hoach_hoat_dong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('noidung', 1000);
            $table->date('thoigianbatdau');
            $table->integer('id_sohop')->unsigned();
            $table->timestamps();
            $table->foreign('id_sohop')->references('id')->on('so_hop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ke_hoach_hoat_dong');
    }
}
