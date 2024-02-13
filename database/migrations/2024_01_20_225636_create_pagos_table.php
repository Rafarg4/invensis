<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_tarifa')->nullable();
            $table->foreign('id_tarifa')->references('id')->on('tarifas');
            $table->unsignedBigInteger('id_inscripcion');
            $table->foreign('id_inscripcion')->references('id')->on('inscripcions')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->text('comprobante');
            $table->text('forma_pago');
            $table->text('estado');
            $table->text('observacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagos');
    }
}
