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
            $table->integer('id')->autoIncrement();
            $table->integer('id_usuario');
            $table->integer('id_token');
            $table->dateTime('fecha_limite');
            $table->dateTime('fecha_uso')->nullable();
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
