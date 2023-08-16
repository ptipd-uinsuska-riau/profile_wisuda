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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('ayah');
            $table->string('prediket');
            $table->string('foto');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('smt');
            $table->string('tgl_lulus');
            $table->string('ipk');
            $table->string('tgl_skl');
            $table->string('tgl_validasi');
            $table->string('periode');
            $table->string('tahun_akademik');
            $table->string('keterangan');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
