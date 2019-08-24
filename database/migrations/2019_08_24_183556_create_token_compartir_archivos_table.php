<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenCompartirArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_compartir_archivos', function (Blueprint $table) {
            $table->bigIncrements('id_token');
            $table->bigInteger('id_archivo');
            $table->string('token', 100)->unique();
            $table->dateTime('fecha_creacion')->default('CURRENT_TIMESTAMP');
            $table->dateTime('fecha_vencimiento');
            $table->string('password');
            $table->boolean('activo')->default(true);

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
        Schema::dropIfExists('token_compartir_archivos');
    }
}
