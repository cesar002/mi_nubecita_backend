<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertLimitesAlmacenaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        INSERT INTO limites_almacenaje(tipo_limite, limite) VALUES ('Basico', 1000000),('Pro', 2000000), ('Premium', 3000000)
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("TRUNCATE TABLE limites_almacenaje");
    }
}
