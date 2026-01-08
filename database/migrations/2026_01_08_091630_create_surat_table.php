<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('surat', function (Blueprint $table) {
        $table->id();

        $table->integer('nomor');
        $table->enum('jenis_surat', ['surat_tugas', 'sppd']);

        // nama pegawai ditulis manual (array)
        $table->json('nama_pegawai');

        $table->date('tanggal_surat');
        $table->integer('lama_perjalanan')->nullable();
        $table->string('tujuan');

        // khusus SPPD (referensi surat tugas)
        $table->string('nomor_surat_tugas')->nullable();

        $table->timestamps();
    });
}



    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
