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
        DB::unprepared("DROP FUNCTION IF EXISTS new_id_sumber_dana");
        DB::unprepared(
          "CREATE FUNCTION new_id_sumber_dana()
            RETURNS CHAR(4)
            BEGIN
            DECLARE kode_lama CHAR(4);
            DECLARE kode_baru CHAR(4);
            DECLARE ambil_angka INT;
            DECLARE angka_baru CHAR(4);
            DECLARE jumlah INT;
            SELECT COUNT(id_sumber) INTO jumlah FROM sumber_dana;
            IF(jumlah = 0) THEN
                SET kode_baru = CONCAT('SD',0,1);
            ELSE
                SELECT MAX(id_sumber) INTO kode_lama FROM sumber_dana;
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
        Schema::dropIfExists('function_new_id_sumber_dana');
    }
};
