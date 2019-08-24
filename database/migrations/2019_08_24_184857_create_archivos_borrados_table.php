<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosBorradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_borrados', function (Blueprint $table) {
            $table->bigIncrements('id_archivo_borrado');
            $table->bigInteger('id_papelera');
            $table->bigInteger('id_archivo');
            $table->dateTime('fecha_borrado_temp')->default('CURRENT_TIMESTAMP');
            $table->boolean('borrado_temp')->default(true);
            $table->dateTime('fecha_borrado_def')->nullable();
            $table->boolean('borrado_def')->default(false);
            $table->boolean('activo')->default(true);

            // $table->foreign('id_papelera')->references('id_papelera')->on('papeleras');
            // $table->foreign('id_archivo')->references('id_archivo')->on('archivos_subidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_borrados');
    }
}
