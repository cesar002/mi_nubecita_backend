<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPapeleras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('papeleras', function (Blueprint $table) {
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
        Schema::table('papeleras', function (Blueprint $table) {
            $table->dropForeign(['id_nube']);
        });
    }
}
