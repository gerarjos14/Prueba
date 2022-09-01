<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacas', function (Blueprint $table) {
            $table->id();
            $table->float('weight')->nullable();
            $table->integer('milk_per_day')->nullable();
            $table->unsignedBigInteger('truck_id')->nullable();
            $table->foreign('truck_id')->references('id')->on('trucks');
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
        Schema::dropIfExists('vacas');
    }
}
