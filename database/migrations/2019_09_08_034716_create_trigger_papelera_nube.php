<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerPapeleraNube extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER insertar_papelera_trigger AFTER INSERT ON nubes_usuarios
            FOR EACH ROW
            INSERT INTO papeleras (id_nube) VALUES (NEW.id_nube)"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `insertar_papelera_trigger`');
    }
}
