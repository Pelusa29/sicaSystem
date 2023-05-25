<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratosfiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contrato_id')->unsigned()->nullable();
            $table->string('path');
            $table->string('tpoDocumento',50);
            $table->string('filename');
            $table->bigInteger('created_by')->unsigned()->index();
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
        Schema::dropIfExists('contratosfiles');
    }
}
