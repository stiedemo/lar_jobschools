<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDongGopQuiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dong_gop_quy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_quy')->unsigned();
            $table->integer('id_student')->unsigned();
            $table->date('date');
            $table->integer('sotien');
            $table->string('ghichu');
            $table->timestamps();
            $table->foreign('id_quy')->references('id')->on('quy');
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
        Schema::dropIfExists('dong_gop_quy');
    }
}
