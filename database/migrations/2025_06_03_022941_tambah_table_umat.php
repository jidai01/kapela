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
        Schema::create('umat', function (Blueprint $table) {
            $table->id('nik');
            $table->unsignedBigInteger('id_kub');
            $table->foreign('id_kub')->references('id_kub')->on('kub');
            $table->unsignedBigInteger('id_wilayah');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('pekerjaan');
            $table->string('status_baptis');
            $table->string('status_komuni');
            $table->string('status_krisma');
            $table->string('status_nikah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umat');
    }
};
