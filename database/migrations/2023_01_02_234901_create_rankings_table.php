<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id('id');
            $table->text('posicion');
            $table->text('nombre_apellido');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->text('club');
            $table->text('sexo');
            $table->text('primer_fecha');
            $table->text('segundo_fecha');
            $table->text('tercero_fecha');
            $table->text('cuarto_fecha');
            $table->text('total');
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
        Schema::drop('rankings');
    }
}
