<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraktijkbegeleiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktijkbegeleider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('praktijkbegeleidernaam');
            $table->string('email');
            $table->string('telefoonnummer');
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
        Schema::dropIfExists('praktijkbegeleider');
    }
}
