<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTokenCompartirArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('token_compartir_archivos', function (Blueprint $table) {
            $table->foreign('id_archivo')->references('id_archivo')->on('archivos_subidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('token_compartir_archivos', function (Blueprint $table) {
            $table->dropForeign(['id_archivo']);
        });
    }
}
