<?php

// database/migrations/xxxx_add_perjalanan_luar_kota_to_surat_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->boolean('perjalanan_luar_kota')
                  ->default(false)
                  ->after('perihal');
        });
    }

    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropColumn('perjalanan_luar_kota');
        });
    }
};
