<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitesAlmacenajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limites_almacenaje', function (Blueprint $table) {
            $table->integer('id_limite')->autoIncrement();
            $table->string('tipo_limite', 50);
            $table->bigInteger('limite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limites_almacenaje');
    }
}
