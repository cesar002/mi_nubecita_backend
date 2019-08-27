<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArchivosBorradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_borrados', function (Blueprint $table) {
            $table->integer('id_archivo_borrado')->autoIncrement();
            $table->integer('id_papelera');
            $table->integer('id_archivo');
            $table->dateTime('fecha_borrado_temp')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('borrado_temp')->default(true);
            $table->dateTime('fecha_borrado_def')->nullable();
            $table->boolean('borrado_def')->default(false);
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
        Schema::dropIfExists('archivos_borrados');
    }
}
