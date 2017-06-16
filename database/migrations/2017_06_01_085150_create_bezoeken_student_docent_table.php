<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBezoekenStudentDocentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bezoeken_student_docent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bezoek_id')->unsigned()->nullable();
            $table->foreign('bezoek_id')->references('id')->on('Bezoeken');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('Student');
            $table->integer('bpvdocent_id')->unsigned()->nullable();
            $table->foreign('bpvdocent_id')->references('id')->on('BPVDocent');
            $table->integer('cohort_id')->unsigned()->nullable();
            $table->foreign('cohort_id')->references('id')->on('Cohort');
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
         Schema::dropIfExists('bezoeken_student_docent');
    }
}
