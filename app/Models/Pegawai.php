<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama','nip','jabatan','golongan','pangkat',
        'sk','spmt','ijazah','sk_cpns','drh','foto',
        'karpeg','kk','ktp','akta_kelahiran','npwp',
        'sk_jabatan','skkp','skp','taspen','transkrip',
        'akta_anak','akta_nikah'
    ];
}

