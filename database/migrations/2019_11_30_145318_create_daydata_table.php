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
            $table->float('daydata_windSpeed',8,4)->nullable();
            $table->float('daydata_windDirection',8,4)->nullable();
            $table->float('daydata_waveHeight',8,4)->nullable();
            $table->float('daydata_temperature',8,4)->nullable();
            $table->integer('daydata_noteOfTheDay')->nullable();
            $table->unsignedBigInteger('daydata_areaId')->index('index_areaidFromDayData')->nullable();
            $table->string('createdAt',10)->nullable();
            $table->string('updatedAt',10)->nullable();
            $table->string('daydata_date',10);


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
