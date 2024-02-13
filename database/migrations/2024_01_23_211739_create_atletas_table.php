<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->id('id');
            $table->text('nombres');
            $table->text('apellidos');
            $table->text('ci');
            $table->text('sexo');
            $table->text('celular');
            $table->text('ciudad');
            $table->text('departamento');
            $table->text('categoria');
            $table->text('tipo_categoria');
            $table->text('nombre_equipo');
            $table->text('federacion_id');
            $table->text('uci_id');
            $table->text('modo');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_evento')->nullable();
            $table->foreign('id_evento')->references('id')->on('eventos');
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
        Schema::drop('atletas');
    }
}
