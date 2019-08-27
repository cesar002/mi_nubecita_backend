<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimiteUsuariosAlmacenajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limite_usuarios_almacenaje', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_usuario');
            $table->integer('id_limite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limite_usuarios_almacenaje');
    }
}
