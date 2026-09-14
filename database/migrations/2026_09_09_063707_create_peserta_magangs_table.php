<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sub_instansi')->constrained('sub_instansi');
            $table->foreignId('id_permohonan')->nullable()->constrained('permohonan_pkl')->nullOnDelete();
            $table->string('nama_peserta');
            $table->string('nim');
            $table->string('sekolah');
            $table->string('no_hp');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status_magang', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_magang');
    }
};