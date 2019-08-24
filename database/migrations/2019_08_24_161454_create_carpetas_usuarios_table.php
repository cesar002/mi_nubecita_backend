<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpetasUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_carpeta');
            $table->bigIncrements('id_nube');
            $table->string('nombre_carpeta', 250);
            $table->string('path_carpeta', 250);
            $table->dateTime('fecha_creacion')->default('CURRENT_TIMESTAMP');
            $table->boolean('eliminado')->default(false);
            $table->string('password', 100);

            // $table->foreign('id_nube')->references('id_nube')->on('nubes_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpetas_usuarios');
    }
}
