<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('id');
            $table->text('archivo_pago');
            $table->text('archivo_inscripcion');
            $table->text('archivo_seguro_medico');
            $table->text('archivo_certificado_medico');
            $table->text('archivo_copia_cedula');
            $table->text('estado')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_inscripcion');
            $table->foreign('id_inscripcion')->references('id')->on('inscripcions');
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
        Schema::drop('documentos');
    }
}
