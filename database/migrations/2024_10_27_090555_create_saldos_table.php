// database/migrations/YYYY_MM_DD_create_saldos_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numero_prestamo'); // Relación con el préstamo
            $table->date('fecha_cuota');                   // Fecha de vencimiento de la cuota
            $table->decimal('monto_cuota', 10, 2);         // Monto de cada cuota
            $table->enum('estado', ['pendiente', 'pagado'])->default('pendiente'); // Estado de la cuota
            $table->timestamps();

            // Relación con la tabla 'prestamos' usando 'numero_prestamo'
            $table->foreign('numero_prestamo')->references('numero_prestamo')->on('prestamos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldos');
    }
}
