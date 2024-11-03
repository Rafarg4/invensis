<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFrecuenciaPagoToPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->string('frecuencia_pago')->nullable(); // Agregar la columna como string
    });
}

public function down()
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->dropColumn('frecuencia_pago'); // Eliminar la columna si se revierte la migración
    });
}

}
