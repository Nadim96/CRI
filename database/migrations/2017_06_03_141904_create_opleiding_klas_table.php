<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpleidingKlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opleiding_klas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opleiding_id')->unsigned()->nullable();
            $table->foreign('opleiding_id')->references('id')->on('Opleiding');
            $table->integer('klas_id')->unsigned()->nullable();
            $table->foreign('klas_id')->references('id')->on('Klas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opleiding_klas');
    }
}
