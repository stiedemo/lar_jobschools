<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanCongKeHoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_cong_ke_hoach', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kehoach')->unsigned();
            $table->integer('id_student')->unsigned();
            $table->string('noidung');
            $table->timestamps();
            $table->foreign('id_kehoach')->references('id')->on('ke_hoach_hoat_dong');
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
        Schema::dropIfExists('phan_cong_ke_hoach');
    }
}
