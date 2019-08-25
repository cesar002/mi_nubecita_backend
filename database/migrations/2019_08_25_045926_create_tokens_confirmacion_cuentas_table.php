<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensConfirmacionCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens_confirmacion_cuentas', function (Blueprint $table) {
            $table->bigIncrements('id_token_confirmacion');
            $table->string('token', 100);
            $table->dateTime('fecha_creacion')->default('CURRENT_TIMESTAMP');
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens_confirmacion_cuentas');
    }
}
