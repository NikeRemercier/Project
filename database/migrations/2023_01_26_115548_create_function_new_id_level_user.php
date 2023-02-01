<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS new_id_level_user");
        DB::unprepared(
          "CREATE FUNCTION new_id_level_user()
            RETURNS CHAR(4)
            BEGIN
            DECLARE kode_lama CHAR(4);
            DECLARE kode_baru CHAR(4);
            DECLARE ambil_angka INT;
            DECLARE angka_baru CHAR(4);
            DECLARE jumlah INT;
            SELECT COUNT(id_level) INTO jumlah FROM level_user;
            IF(jumlah = 0) THEN
                SET kode_baru = CONCAT('LV',0,1);
            ELSE
                SELECT MAX(id_level) INTO kode_lama FROM level_user;
                SET ambil_angka = SUBSTR(kode_lama, 3, 2) + 1;
                SET angka_baru = LPAD(ambil_angka,1, 0);
                SET kode_lama = SUBSTR(kode_lama, 1, 3);
                SET kode_baru = CONCAT(kode_lama, angka_baru);
            END IF;
            RETURN kode_baru;
            END;"
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('function_new_id_level_user');
    }
};
