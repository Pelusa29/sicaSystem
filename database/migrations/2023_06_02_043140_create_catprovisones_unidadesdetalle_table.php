<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatprovisonesUnidadesdetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catproviciones_unidadesdetalle', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catprovicion_id')->unsigned()->nullable();
            $table->bigInteger('unidad_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('catprovicion_id')->references('id')->on('catproviciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catprovisones_unidadesdetalle');
    }
}
