<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        DB::unprepared("DROP TRIGGER IF EXISTS delete_detail_barang");
        DB::unprepared("
            CREATE TRIGGER delete_detail_barang
            AFTER DELETE 
            ON detail_barang
            FOR EACH ROW
            BEGIN
            DECLARE adder VARCHAR(30);
            DECLARE kode CHAR(8);

            SELECT new_id_barang_keluar() INTO kode;
            INSERT INTO barang_keluar (id_keluar,kode_barang,id_barang,id_lokasi,id_sumber,foto_barang,kondisi,tanggal_keluar) VALUES (
                kode,old.kode_barang,old.id_barang,old.id_lokasi,old.id_sumber,old.foto_barang,old.kondisi,NOW()
            );
             
             END;  
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_delete_detail_barang');
    }
};
