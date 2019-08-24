<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosSubidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_subidos', function (Blueprint $table) {
            $table->bigIncrements('id_archivo');
            $table->bigInteger('id_carpeta');
            $table->string('nombre_archivo', 150);
            $table->string('tipo_archivo', 6);
            $table->double('size_file');
            $table->dateTime('fecha_subida')->default('CURRENT_TIMESTAMP');
            $table->boolean('eliminado')->default(false);

            // $table->foreign('id_carpeta')->references('id_carpeta')->on('carpetas_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_subidos');
    }
}
