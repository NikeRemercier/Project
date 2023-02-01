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
        DB::unprepared("DROP FUNCTION IF EXISTS new_id_barang");
        DB::unprepared(
          "CREATE FUNCTION new_id_barang()
            RETURNS CHAR(8)
            BEGIN
            DECLARE kode_lama CHAR(8);
            DECLARE kode_baru CHAR(8);
            DECLARE ambil_angka INT;
            DECLARE angka_baru CHAR(8);
            DECLARE jumlah INT;
            SELECT COUNT(id_barang) INTO jumlah FROM barang;
            IF(jumlah = 0) THEN
                SET kode_baru = CONCAT('BRG',0,0,0,0,1);
            ELSE
                SELECT MAX(id_barang) INTO kode_lama FROM barang;
                SET ambil_angka = SUBSTR(kode_lama, 7, 2) + 1;
                SET angka_baru = LPAD(ambil_angka,5, 0);
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
        Schema::dropIfExists('function_new_id_barang');
    }
};
