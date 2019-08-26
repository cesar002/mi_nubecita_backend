<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyLimiteUsuariosAlmacenaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('limite_usuarios_almacenaje', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_limite')->references('id_limite')->on('limites_almacenaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('limite_usuarios_almacenaje', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->dropForeign(['id_usuario']);
        });
    }
}
