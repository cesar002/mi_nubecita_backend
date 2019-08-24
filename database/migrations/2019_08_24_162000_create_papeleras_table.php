<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papeleras', function (Blueprint $table) {
            $table->bigIncrements('id_papelera');
            $table->bigInteger('id_nube');

            // $table->foreign('id_nube')->references('id_nube')->on('nubes_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papeleras');
    }
}
