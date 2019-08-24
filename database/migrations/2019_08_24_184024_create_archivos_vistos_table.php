<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosVistosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_vistos', function (Blueprint $table) {
            $table->bigIncrements('id_visto');
            $table->bigInteger('id_archivo');
            $table->dateTime('ultima_vista')->default('CURRENT_TIMESTAMP');

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
        Schema::dropIfExists('archivos_vistos');
    }
}
