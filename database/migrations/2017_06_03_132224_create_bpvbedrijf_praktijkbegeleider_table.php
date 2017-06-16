<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpvbedrijfPraktijkbegeleiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpvbedrijf_praktijkbegeleider', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bpvbedrijf_id')->unsigned()->nullable();
            $table->foreign('bpvbedrijf_id')->references('id')->on('BPVBedrijf');
            $table->integer('praktijkbegeleider_id')->unsigned()->nullable();
            $table->foreign('praktijkbegeleider_id')->references('id')->on('Praktijkbegeleider');
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
        Schema::dropIfExists('bpvbedrijf_praktijkbegeleider');
    }
}
