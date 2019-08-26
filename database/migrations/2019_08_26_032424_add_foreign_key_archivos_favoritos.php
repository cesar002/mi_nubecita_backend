<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyArchivosFavoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('archivos_favoritos', function (Blueprint $table) {
            $table->foreign('id_archivo')->references('id_archivo')->on('archivos_subidos');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('archivos_favoritos', function (Blueprint $table) {
            $table->dropForeign(['id_archivo']);
            $table->dropForeign(['id_usuario']);
        });
    }
}
