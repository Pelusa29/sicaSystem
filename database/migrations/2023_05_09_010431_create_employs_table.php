<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150)->nullable();
            $table->date('fechaInicioContrato')->nullable();
            $table->date('fechaFinContrato')->nullable();
            $table->string('nss',50)->nullable();
            $table->string('rfc',50)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('calle',100)->nullable();
            $table->string('colonia',100)->nullable();
            $table->string('ciudad',100)->nullable();
            $table->string('cp',20)->nullable();
            $table->string('celular',30)->nullable();
            $table->double('pagoTransferencia',40,2)->nullable();
            $table->double('pagoEfectivo',40,2)->nullable();
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
        Schema::dropIfExists('employs');
    }
}
