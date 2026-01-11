<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();

            $table->integer('nomor');
            $table->string('nomor_surat_tugas');
            $table->enum('jenis_surat', ['surat_tugas', 'sppd']);

            $table->date('tanggal_surat');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang');

            $table->integer('lama_perjalanan');

            $table->string('tujuan');
            $table->text('perihal')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
