<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingMTBsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_m_t_bs', function (Blueprint $table) {
            $table->id('id');
            $table->text('ci')->nullable();
            $table->text('posicion')->nullable();
            $table->text('nombre_apellido')->nullable();
            $table->text('categoria')->nullable();
            $table->text('team')->nullable();
            $table->text('fecha_uno')->nullable();
            $table->text('fecha_dos')->nullable();
            $table->text('fecha_tres')->nullable();
            $table->text('fecha_cuatro')->nullable();
            $table->text('fecha_cinco')->nullable();
            $table->text('fecha_seis')->nullable();
            $table->text('fecha_siete')->nullable();
            $table->text('fecha_ocho')->nullable();
            $table->text('fecha_nueve')->nullable();
            $table->text('fecha_dies')->nullable();
            $table->text('fecha_once')->nullable();
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
        Schema::drop('ranking_m_t_bs');
    }
}
