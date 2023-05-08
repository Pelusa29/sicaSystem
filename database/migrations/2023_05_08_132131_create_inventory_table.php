<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catinventory', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',50)->nullable();
            $table->timestamps();
        });
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catinventory_id')->unsigned()->nullable();
            $table->string('descripcion',150)->nullable();
            $table->double('precioCosto',40,2)->default(10.50);
            $table->integer('ctmaximo')->default(0);
            $table->integer('ctminimo')->default(0);
            $table->integer('entrada')->default(0);
            $table->integer('salida')->default(0);
            $table->integer('existencia')->default(0);
            $table->integer('programado')->default(0);
            $table->string('observaciones',150)->nullable();
            $table->timestamps();

            $table->foreign('catinventory_id')->references('id')->on('catinventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
        Schema::dropIfExists('catinventory');
    }
}
