<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileunidades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unidad_id')->unsigned()->nullable();
            $table->string('path');
            $table->string('tpoDocumento',50);
            $table->string('filename');
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();
            $table->timestamps();
        });

        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('truck_id')->unsigned()->nullable();
            $table->string('unidad',50)->nullable();
            $table->string('marcaUnidad',50)->nullable();
            $table->string('modeloUnidad',50)->nullable();
            $table->date('fechaVencimientoSeguro')->nullable();
            $table->decimal('costoSeguro',15,2)->default(10.50);
            $table->decimal('valorActualunidad',15,2)->default(10.50);
            $table->enum('tipoCombustible',['Diesel','Gasolina'])->nullable()->default('Gasolina');
            $table->timestamps();

            $table->foreign('truck_id')->references('id')->on('trucks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('unidades');
        Schema::dropIfExists('fileunidades');
    }
}
