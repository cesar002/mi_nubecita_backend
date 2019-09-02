<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArchivosSubidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_subidos', function (Blueprint $table) {
            $table->integer('id_archivo')->autoIncrement();
            $table->integer('id_carpeta');
            $table->string("nombre_privado", 200);
            $table->string('nombre_archivo', 200);
            $table->string('tipo_archivo', 15);
            $table->double('size_file');
            $table->dateTime('fecha_subida')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('eliminado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_subidos');
    }
}
