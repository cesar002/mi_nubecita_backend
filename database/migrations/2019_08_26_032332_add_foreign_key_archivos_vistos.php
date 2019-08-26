<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyArchivosVistos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('archivos_vistos', function (Blueprint $table) {
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
        Schema::table('archivos_vistos', function (Blueprint $table) {
            $table->dropForeign(['id_archivo']);
        });
    }
}
