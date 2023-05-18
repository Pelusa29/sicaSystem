<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratostaxiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratostaxi', function (Blueprint $table) {
            $table->id();
            $table->string('unidad',150)->nullable();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->string('direccionArrendador',100)->nullable();
            $table->date('fechaInicioContrato')->nullable();
            $table->decimal('importeRenta',15,2)->nullable();
            $table->decimal('importeDeposito',15,2)->nullable();
            $table->string('nombreFiador',150)->nullable();
            $table->string('calleFiador',150)->nullable();
            $table->string('coloniaFiador',150)->nullable();
            $table->string('ciudadFiador',30)->nullable();
            $table->string('cpFiador',30)->nullable();
            $table->date('fechaFinCotrato')->nullable();
            $table->string('nombreTestigo',150)->nullable();
            $table->enum('state',['A','I'])->nullable()->default('A');
            $table->timestamps();


            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratostaxi');
    }
}
