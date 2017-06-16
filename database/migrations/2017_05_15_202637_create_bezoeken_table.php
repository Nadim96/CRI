<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBezoekenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bezoeken', function (Blueprint $table) {
            $table->increments('id');
            $table->date('bezoek1')->nullable();
            $table->date('bezoek2')->nullable();
            $table->date('bezoek3')->nullable();
            $table->date('bezoek4')->nullable();
            $table->date('bezoek5')->nullable();
            $table->date('bezoek6')->nullable();
            $table->date('bezoek7')->nullable();
            $table->date('bezoek8')->nullable();
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
        Schema::dropIfExists('bezoeken');
    }
}
