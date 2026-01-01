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
        Schema::create('surat_masuks', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_surat');
        $table->date('tanggal_surat');
        $table->date('tanggal_terima');
        $table->string('asal_surat');
        $table->string('perihal');
        $table->text('keterangan')->nullable();
        $table->string('file_surat')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
