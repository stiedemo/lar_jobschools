<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuDungQuiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_dung_quy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_quy')->unsigned();
            $table->integer('id_kehoach')->unsigned();
            $table->integer('phutrach')->unsigned();
            $table->integer('sotien');
            $table->string('noidung');
            $table->timestamps();
            $table->foreign('id_quy')->references('id')->on('quy');
            $table->foreign('id_kehoach')->references('id')->on('ke_hoach_hoat_dong');
            $table->foreign('phutrach')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('su_dung_quy');
    }
}
