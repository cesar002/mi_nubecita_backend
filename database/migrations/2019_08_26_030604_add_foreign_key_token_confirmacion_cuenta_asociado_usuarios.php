<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTokenConfirmacionCuentaAsociadoUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('token_confirmacion_cuenta_asociado_usuarios', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_token')->references('id_token_confirmacion')->on('tokens_confirmacion_cuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('token_confirmacion_cuenta_asociado_usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->dropForeign(['id_token']);
        });
    }
}
