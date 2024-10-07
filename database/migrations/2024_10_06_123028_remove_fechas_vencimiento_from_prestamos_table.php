<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFechasVencimientoFromPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn('fechas_vencimiento');
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
            $table->json('fechas_vencimiento')->nullable();
        });
    }
}

