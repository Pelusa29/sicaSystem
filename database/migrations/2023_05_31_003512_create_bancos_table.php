<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreBanco',50)->nullable();
            $table->string('numCuenta',150)->nullable();
            $table->string('plasticoBanco',50)->nullable();
            $table->string('titularCuenta',50)->nullable();
            $table->enum('tipoCuenta',['Credito','Debito'])->nullable()->default('Debito');
            $table->date('fechaCorte')->nullable();
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
        Schema::dropIfExists('bancos');
    }
}
