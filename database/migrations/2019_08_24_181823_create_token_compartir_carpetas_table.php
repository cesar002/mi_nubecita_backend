<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTokenCompartirCarpetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_compartir_carpetas', function (Blueprint $table) {
            $table->integer('id_token')->autoIncrement();
            $table->integer('id_carpeta');
            $table->string('token', 100)->unique();
            $table->dateTime('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->string('password', 100)->nullable();
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
        Schema::dropIfExists('token_compartir_carpetas');
    }
}
