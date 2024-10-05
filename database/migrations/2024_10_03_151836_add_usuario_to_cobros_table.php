<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioToCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('cobros', function (Blueprint $table) {
        $table->string('usuario')->nullable();
    });
}

public function down()
{
    Schema::table('cobros', function (Blueprint $table) {
        $table->dropColumn('usuario');
    });
}

}
