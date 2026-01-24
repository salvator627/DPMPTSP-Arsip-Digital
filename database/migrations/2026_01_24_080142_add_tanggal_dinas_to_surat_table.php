<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('surat', function (Blueprint $table) {
        $table->date('tanggal_berangkat')->nullable()->after('tanggal_surat');
        $table->date('tanggal_pulang')->nullable()->after('tanggal_berangkat');
    });
}


public function down(): void
{
    Schema::table('surat', function (Blueprint $table) {
        $table->dropColumn(['tanggal_berangkat', 'tanggal_pulang']);
    });
}

};
