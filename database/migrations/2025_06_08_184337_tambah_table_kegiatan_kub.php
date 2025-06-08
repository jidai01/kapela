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
        Schema::create('kegiatan_kub', function (Blueprint $table) {
            $table->id('id_kegiatan_kub');
            $table->unsignedBigInteger('id_kub');
            $table->foreign('id_kub')->references('id_kub')->on('kub');
            $table->string('nama_kegiatan_kub');
            $table->text('deskripsi');
            $table->date('tanggal_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'kegiatan_kub');
    }
};
