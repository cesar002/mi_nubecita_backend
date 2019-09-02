<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCarpetasUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_usuarios', function (Blueprint $table) {
            $table->integer('id_carpeta')->autoIncrement();
            $table->integer('id_nube');
            $table->string('nombre_carpeta', 250);
            $table->string('path_carpeta', 250);
            $table->dateTime('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('eliminado')->default(false);
            $table->string('password', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpetas_usuarios');
    }
}
