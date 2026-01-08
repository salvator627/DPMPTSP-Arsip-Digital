<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    // database/migrations/xxxx_add_perihal_to_surat_table.php
public function up(): void
{
    Schema::table('surat', function (Blueprint $table) {
        $table->text('perihal')->nullable()->after('tanggal_surat');
    });
}

public function down(): void
{
    Schema::table('surat', function (Blueprint $table) {
        $table->dropColumn('perihal');
    });
}
};
 
