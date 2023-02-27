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
        Schema::create('perawatan_barang', function (Blueprint $table) {
            $table->char('id_perawat', 8)->primary();
            $table->char('kode_barang', 8);
            $table->char('id_user', 8);
            $table->char('id_lokasi', 4);
            $table->date('tanggal_perawatan');
            $table->string('kegiatan_perawatan', 25);
            $table->text('keterangan');

            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('detail_barang')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('id_user')
            ->references('id_user')
            ->on('user')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('id_lokasi')
            ->references('id_lokasi')
            ->on('lokasi')
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
        Schema::dropIfExists('pemeliharaan_barang');
    }
};
