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
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->string('perusahaan');
            $table->string('departemen');
            $table->text('deskripsi');
            $table->string('kualifikasi');
            $table->string('lokasi');
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokers');
    }
};
