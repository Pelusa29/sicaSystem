<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->id();
            $table->string('nombreConductor',150)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('calle',100)->nullable();
            $table->string('colonia',100)->nullable();
            $table->string('ciudad',100)->nullable();
            $table->string('cp',20)->nullable();
            $table->string('celular',30)->nullable();
            $table->date('fechaFinlicencia')->nullable();
            $table->string('conductorEmergencia',30)->nullable();
            $table->string('telefonoEmergencia',30)->nullable();
            $table->enum('state',['A','I'])->nullable()->default('A');
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
        Schema::dropIfExists('conductores');
    }
}
