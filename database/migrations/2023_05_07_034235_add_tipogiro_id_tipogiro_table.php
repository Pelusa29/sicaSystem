<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipogiroIdTipogiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trucks', function (Blueprint $table) {
            $table->biginteger('tipogiro_id')->unsigned()->nullable();
            $table->foreign('tipogiro_id')->references('id')->on('tipogiro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trucks', function (Blueprint $table) {
            $table->dropForeign('trucks_tipogiro_id_foreign');
            $table->dropColumn('tipogiro_id');
        });
    }
}
