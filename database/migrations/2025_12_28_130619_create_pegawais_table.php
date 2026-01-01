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
    Schema::create('pegawais', function (Blueprint $table) {
        $table->id();

        // DATA UTAMA
        $table->string('nama');
        $table->string('nip')->unique();
        $table->string('jabatan');
        $table->string('golongan');
        $table->string('pangkat');

        // FILE WAJIB
        $table->string('sk')->nullable();
        $table->string('spmt')->nullable();
        $table->string('ijazah')->nullable();
        $table->string('sk_cpns')->nullable();
        $table->string('drh')->nullable();
        $table->string('foto')->nullable();
        $table->string('karpeg')->nullable();
        $table->string('kk')->nullable();
        $table->string('ktp')->nullable();
        $table->string('akta_kelahiran')->nullable();
        $table->string('npwp')->nullable();
        $table->string('sk_jabatan')->nullable();
        $table->string('skkp')->nullable();
        $table->string('skp')->nullable();
        $table->string('taspen')->nullable();
        $table->string('transkrip')->nullable();

        // FILE OPSIONAL
        $table->string('akta_anak')->nullable();
        $table->string('akta_nikah')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
