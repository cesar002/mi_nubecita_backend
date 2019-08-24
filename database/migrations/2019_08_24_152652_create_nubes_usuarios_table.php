<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNubesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nubes_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_nube');
            $table->string('hash_name', 100);
            $table->bigInteger('id_usuario');
            $table->boolean('activo')->default(true);

            // $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nubes_usuarios');
    }
}
