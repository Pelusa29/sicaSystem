<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampofaltanteTableunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidades', function (Blueprint $table) {
            $table->decimal('valorAdquisicionUnidad',15,2)->default(null)->after('valorActualunidad');
            $table->string('noserie',100)->nullable()->after('valorAdquisicionUnidad');
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
            $table->dropColumn('valorAdquisicionUnidad');
            $table->dropColumn('noserie');
        });
    }
}
