<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id('id');
            $table->text('primer_y_segundo_nombre');
             $table->text('primer_y_segundo_apellido');
            $table->text('fechanac');
            $table->text('ci');
            $table->text('sexo');
            $table->text('tipo_categoria');
            $table->text('grupo_sanguineo');
            $table->text('nacionalidad');
            $table->text('celular');
            $table->text('edad');
            $table->text('email');
            $table->text('domiciolio');
            $table->text('ciudad');
            $table->text('region');
            $table->text('departamento');
            $table->unsignedBigInteger('id_categorias')->nullable();
            $table->foreign('id_categorias')->references('id')->on('categorias');
            $table->text('nombre_equipo');
            $table->text('contacto_emergencia');
            $table->text('nombre_apellido_contacto_emergencia');
            $table->text('foto');
            $table->text('uciid')->nullable();
            $table->text('federacion_id')->nullable();
            $table->text('monto')->nullable();
            $table->text('estado')->nullable();
            $table->text('tipo_licencia')->nullable();
            $table->text('licencia')->nullable();
            $table->text('seguro')->nullable();
            $table->text('fecha_inicio')->nullable();
            $table->text('fecha_fin')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('inscripcions');
    }
}
