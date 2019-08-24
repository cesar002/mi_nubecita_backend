<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpetasBorradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_borradas', function (Blueprint $table) {
            $table->bigIncrements('id_carpeta_borrada');
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
        Schema::dropIfExists('carpetas_borradas');
    }
}
