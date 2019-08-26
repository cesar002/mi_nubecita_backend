<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCarpetasUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carpetas_usuarios', function (Blueprint $table) {
            $table->foreign('id_nube')->references('id_nube')->on('nubes_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carpetas_usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_nube']);
        });
    }
}
