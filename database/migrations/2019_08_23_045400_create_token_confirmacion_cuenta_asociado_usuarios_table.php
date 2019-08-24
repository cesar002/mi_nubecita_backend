<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenConfirmacionCuentaAsociadoUsuariosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_confirmacion_cuenta_asociado_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_token');
            $table->dateTime('fecha_limite');
            $table->dateTime('fecha_uso')->nullable();

            // $table->foreign('id_usuario')->references('id')->on('users');
            // $table->foreign('id_token')->references('id_token_confirmacion')->on('tokens_confirmacion_cuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('token_confirmacion_cuenta_asociado_usuarios');
    }
}
