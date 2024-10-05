<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdElectrodomesticoToPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->unsignedBigInteger('id_electrodomestico')->nullable()->after('tipo_prestamo');
        $table->foreign('id_electrodomestico')->references('id')->on('electrodomesticos');
    });
}

public function down()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->dropForeign(['id_electrodomestico']);
        $table->dropColumn('id_electrodomestico');
    });
}


}
