<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kub', function (Blueprint $table) {
            $table->id('id_kub');
            $table->unsignedBigInteger('id_wilayah');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
            $table->string('nama_kub');
            $table->string('ketua_kub');
            $table->integer('jumlah_anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kub');
    }
};
