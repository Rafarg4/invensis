<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZonaAndFechasVencimientoToPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->string('zona')->nullable();
            $table->json('fechas_vencimiento')->nullable(); // Para almacenar múltiples fechas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn(['zona', 'fechas_vencimiento']);
        });
    }
}
