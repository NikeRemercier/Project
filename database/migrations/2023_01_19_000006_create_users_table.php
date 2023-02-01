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
        Schema::create('user', function (Blueprint $table) {
            $table->char('id_user', 8)->primary();
            $table->char('id_level', 4);
            $table->string('nama_user', 25)->unique();
            $table->char('username', 25)->unique();
            $table->string('password');

            $table->foreign('id_level')
            ->references('id_level')
            ->on('level_user')
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
        Schema::dropIfExists('user');
    }
};
