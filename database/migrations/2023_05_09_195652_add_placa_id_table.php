<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlacaIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidades', function (Blueprint $table) {
            $table->bigInteger('placa_id')->unsigned()->nullable();
            $table->foreign('placa_id')->references('id')->on('placas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidades', function (Blueprint $table) {
            $table->dropForeign('unidades_placa_id_foreign');
            $table->dropColumn('placa_id');
        });
    }
}
