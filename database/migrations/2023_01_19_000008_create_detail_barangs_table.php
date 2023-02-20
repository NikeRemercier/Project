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
        Schema::create('detail_barang', function (Blueprint $table) {
            $table->char('kode_barang', 8)->primary();
            $table->char('id_lokasi', 4);
            $table->char('id_barang', 8);
            $table->char('id_sumber', 4);
            $table->string('kondisi', 25);
            $table->string('foto_barang');
            $table->date('tahun_pembelian');

            $table->foreign('id_lokasi')
            ->references('id_lokasi')
            ->on('lokasi')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('id_barang')
            ->references('id_barang')
            ->on('barang')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('id_sumber')
            ->references('id_sumber')
            ->on('sumber_dana')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_barang');
    }
};
