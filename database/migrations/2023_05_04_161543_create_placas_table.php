<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unidad_id')->unsigned()->nullable();
            $table->string('tipoPlaca',50)->nullable();
            $table->string('nombrePagoPlaca',50)->nullable();
            $table->string('nombreConcesionPlaca',50)->nullable();
            $table->date('fechaPagoRentaPlaca')->nullable();
            $table->double('importeRentaPlaca',40,2)->default(10.50);
            $table->string('observaciones',70)->nullable();
            $table->timestamps();

            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placas');
    }
}
