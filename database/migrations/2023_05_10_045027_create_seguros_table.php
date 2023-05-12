<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('fileseguros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seguro_id')->unsigned()->nullable();
            $table->string('path');
            $table->string('tpoDocumento',50);
            $table->string('filename');
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();
            $table->timestamps();
        });

        Schema::create('seguros', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoVigencia',['Anual','Bimestral'])->nullable()->default('Anual');
            $table->string('cobertura',50)->nullable();
            $table->string('deducible',50)->nullable();
            $table->decimal('pagoSeguro',15,2)->nullable();
            $table->date('fechaRenovacion')->nullable();
            $table->date('fechaVencimiento')->nullable();
            $table->string('numPoliza',50)->nullable();
            $table->string('aseguradora',50)->nullable();
            $table->string('agente',50)->nullable();
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
        Schema::dropIfExists('seguros');
        Schema::dropIfExists('fileseguros');
    }
}
