<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenCompartirCarpetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_compartir_carpetas', function (Blueprint $table) {
            $table->bigIncrements('id_token');
            $table->bigInteger('id_carpeta');
            $table->string('token', 100)->unique();
            $table->dateTime('fecha_creacion')->default('CURRENT_TIMESTAMP');
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->string('password', 100)->nullable();
            $table->boolean('activo')->default(true);

            // $table->foreign('id_carpeta')->references('carpetas_usuarios')->on('id_carpeta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_compartir_carpetas');
    }
}
