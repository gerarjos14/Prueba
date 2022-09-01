<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacasPurchasesByTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacas_purchases_by_trucks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('truck_id')->nullable();
            $table->foreign('truck_id')->references('id')->on('trucks');

            $table->unsignedBigInteger('vaca_id')->nullable();
            $table->foreign('vaca_id')->references('id')->on('vacas');
            
            $table->float('total_milk')->nullable();
            $table->float('total_weight')->nullable();
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
        Schema::dropIfExists('vacas_purchases_by_trucks');
    }
}
