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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loker_id');
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->string('domisili');
            $table->string('email');
            $table->string('nohp');
            $table->string('cv');

            $table->foreign('loker_id')->on('lokers')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
