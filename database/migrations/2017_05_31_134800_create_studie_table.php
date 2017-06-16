<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cohort_id')->unsigned()->nullable();
            $table->foreign('cohort_id')->references('id')->on('Cohort');
            $table->integer('klas_id')->unsigned()->nullable();
            $table->foreign('klas_id')->references('id')->on('Klas');
            $table->integer('opleiding_id')->unsigned()->nullable();
            $table->foreign('opleiding_id')->references('id')->on('Opleiding');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('Student');
            $table->integer('beroepsprofiel_id')->unsigned()->nullable();
            $table->foreign('beroepsprofiel_id')->references('id')->on('Beroepsprofiel');
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
        Schema::dropIfExists('studie');
    }
}
