<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatprovicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catproviciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('provision_id')->unsigned()->nullable();
            $table->string('nombreOperacion', 100)->nullable();
            $table->string('anioOperacion', 50)->nullable();
            $table->boolean('boolUnidadTotales')->default(false);
            $table->decimal('estimacionOperacion', 15, 2)->nullable();
            $table->string('descripcionOperacion', 150)->nullable();
            $table->bigInteger('semanasCalculadas')->unsigned()->nullable();
            $table->enum('state', ['A', 'I'])->nullable()->default('A');
            $table->timestamps();


            $table->foreign('provision_id')->references('id')->on('provisiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catproviciones');
    }
}
