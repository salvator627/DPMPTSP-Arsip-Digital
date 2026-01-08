<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_pegawai');
    }
};
