<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fileclientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->string('path');
            $table->string('filename');
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente',150)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('calle',100)->nullable();
            $table->string('colonia',100)->nullable();
            $table->string('ciudad',100)->nullable();
            $table->string('cp',20)->nullable();
            $table->string('celular',30)->nullable();
            $table->date('fechaFinlicencia')->nullable();
            $table->string('nombreEmergencia',30)->nullable();
            $table->string('telefonoEmergencia',30)->nullable();
            $table->string('clienteRef1',30)->nullable();
            $table->string('telefonoRef1',30)->nullable();
            $table->string('clienteRef2',30)->nullable();
            $table->string('telefonoRef2',30)->nullable();
            $table->string('clienteRef3',30)->nullable();
            $table->string('telefonoRef3',30)->nullable();
            $table->string('rfcCliente',50)->nullable();
            $table->string('emailCliente',50)->nullable();
            $table->enum('tipoCliente',['conductor','cliente'])->nullable()->default('cliente');
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
        Schema::dropIfExists('fileclientes');
        Schema::dropIfExists('clientes');
    }
}
