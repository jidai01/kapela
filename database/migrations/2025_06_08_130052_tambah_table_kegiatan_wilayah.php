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
        Schema::create('kegiatan_wilayah', function (Blueprint $table) {
            $table->id('id_kegiatan_wilayah');
            $table->unsignedBigInteger('id_wilayah');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
            $table->string('nama_kegiatan_wilayah');
            $table->text('deskripsi');
            $table->date('tanggal_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'kegiatan_wilayah');
    }
};
