<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
     protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'keterangan',
        'file_surat',
        'user_id'
    ];

    protected $table = 'surat_keluars';
}
