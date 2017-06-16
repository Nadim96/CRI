<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraktijkbegeleiderStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktijkbegeleider_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('praktijkbegeleider_id')->unsigned()->nullable();
            $table->foreign('praktijkbegeleider_id')->references('id')->on('Praktijkbegeleider');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('Student');
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
        Schema::dropIfExists('praktijkbegeleider_student');
    }
}
