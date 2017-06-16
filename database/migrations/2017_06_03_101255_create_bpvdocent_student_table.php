<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpvdocentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpvdocent_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bpvdocent_id')->unsigned()->nullable();
            $table->foreign('bpvdocent_id')->references('id')->on('BPVDocent');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('Student');
            $table->integer('bezoek_id')->unsigned()->nullable();
            $table->foreign('bezoek_id')->references('id')->on('Bezoeken');
            $table->integer('jaar');
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
        Schema::dropIfExists('bpvdocent_student');
    }
}
