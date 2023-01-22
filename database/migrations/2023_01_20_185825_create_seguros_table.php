<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegurosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->id('id');
            $table->text('estado_civil');
            $table->text('edad');
            $table->text('usted_es');
            $table->text('padece_enfermedad');
            $table->text('especificar_enfermedad')->nullable();
            $table->text('presenta_defecto_fisico');
            $table->text('especifique_defecto_fisico')->nullable();
            $table->text('estatura');
            $table->text('peso');
            $table->text('plan');
            $table->text('tipo_plan');
            $table->text('nombre_apellido_fallecimiento_titular');
            $table->text('parentesco_titular_beneficiario');
            $table->text('ci_beneficiario');
            $table->text('porcentaje_cesion');
            $table->text('fechanac_beneficiario');
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
        Schema::drop('seguros');
    }
}
