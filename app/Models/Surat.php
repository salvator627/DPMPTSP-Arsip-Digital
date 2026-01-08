<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';


    protected $fillable = [
        'nomor',
        'perihal',
        'jenis_surat',
        'tanggal_surat',
        'lama_perjalanan',
        'tujuan',
        'nomor_surat_tugas',
    ];

    public function pegawai()
    {
       return $this->belongsToMany(
        Pegawai::class,
        'surat_pegawai',
        'surat_id',
        'pegawai_id'
    );
    }
}
