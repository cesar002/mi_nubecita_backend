<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCarpetasBorradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carpetas_borradas', function (Blueprint $table) {
            $table->foreign('id_papelera')->references('id_papelera')->on('papeleras');
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
        Schema::table('carpetas_borradas', function (Blueprint $table) {
            $table->dropForeign(['id_papelera']);
            $table->dropForeign(['id_archivo']);
        });
    }
}
