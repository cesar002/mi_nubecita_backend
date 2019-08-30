<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTokenCompartirCarpetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('token_compartir_carpetas', function (Blueprint $table) {
            $table->foreign('id_carpeta')->references('id_carpeta')->on('carpetas_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('token_compartir_carpetas', function (Blueprint $table) {
            $table->dropForeign(['id_carpeta']);
        });
    }
}
