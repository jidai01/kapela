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
        Schema::create('penerimaan_sakramen', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_sakramen');
            $table->foreign('id_sakramen')->references('id_sakramen')->on('sakramen');
            $table->unsignedBigInteger('nik');
            $table->foreign('nik')->references('nik')->on('umat');
            $table->date('tanggal_penerimaan_sakramen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'penerimaan_sakramen');
    }
};
