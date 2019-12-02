<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daydata', function (Blueprint $table) {
            $table->bigIncrements('daydata_id');
            $table->integer('daydata_windSpeed');
            $table->integer('daydata_windDirection');
            $table->float('daydata_waveHeight');
            $table->float('daydata_temperature')->nullable();
            $table->integer('daydata_noteOfTheDay')->nullable();
            $table->unsignedBigInteger('daydata_areaId')->index('index_areaidFromDayData')->nullable();
            $table->timestamps();


        });

        Schema::table('daydata', function (Blueprint $table) {
            $table->foreign('daydata_areaId')->references('area_id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daydata');
    }
}
