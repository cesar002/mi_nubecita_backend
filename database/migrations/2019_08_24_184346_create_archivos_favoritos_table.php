<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArchivosFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_favoritos', function (Blueprint $table) {
            $table->integer('id_favorito')->autoIncrement();
            $table->integer('id_archivo');
            $table->integer('id_usuario');
            $table->dateTime('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_favoritos');
    }
}
