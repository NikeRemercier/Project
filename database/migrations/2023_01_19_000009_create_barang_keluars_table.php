<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->char('id_keluar', 8)->primary();
            $table->char('kode_barang', 8);
            $table->char('id_lokasi', 4);
            $table->char('id_barang', 8);
            $table->char('id_sumber', 4);
            $table->string('kondisi', 25);
            $table->string('foto_barang');
            $table->date('tanggal_keluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
};
