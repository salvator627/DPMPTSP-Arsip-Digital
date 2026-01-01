<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
     use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tanggal_terima',
        'asal_surat',
        'perihal',
        'keterangan',
        'file_surat',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     protected $table = 'surat_masuks';
}
