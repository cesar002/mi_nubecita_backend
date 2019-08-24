<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_favoritos', function (Blueprint $table) {
            $table->bigIncrements('id_favorito');
            $table->bigInteger('id_archivo');
            $table->bigInteger('id_usuario');
            $table->dateTime('fecha')->default('CURRENT_TIMESTAMP');
            $table->boolean('activo')->default(true);

            // $table->foreign('id_archivo')->references('id_archivo')->on('archivos_subidos');
            // $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_favoritos');
    }
}
