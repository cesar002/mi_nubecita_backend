<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCarpetasBorradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_borradas', function (Blueprint $table) {
            $table->integer('id_carpeta_borrada')->autoIncrement();
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
        Schema::dropIfExists('carpetas_borradas');
    }
}
