<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function create()
    {
        $pegawai = Pegawai::orderBy('nama')->get();

        return view('surat.create', compact('pegawai'));
    }

    public function index()
{
    $surat = Surat::with('pegawai')
        ->orderBy('tanggal_surat', 'desc')
        ->get();

    return view('surat.index', compact('surat'));
}


    public function store(Request $request)
{
    $rules = [
        'nomor' => 'required',
        'jenis_surat' => 'required|in:surat_tugas,sppd',
        'pegawai_id' => 'required|array|min:1',
        'pegawai_id.*' => 'exists:pegawais,id',
        'tanggal_surat' => 'required|date',
        'lama_perjalanan' => 'required|integer',
        'tujuan' => 'required',
        'nomor_surat_tugas' => 'required',
    ];

    // 🔥 PERIHAL WAJIB HANYA UNTUK SURAT TUGAS
    if ($request->jenis_surat === 'surat_tugas') {
        $rules['perihal'] = 'required|string';
    } else {
        $rules['perihal'] = 'nullable|string';
    }

    $request->validate($rules);

    // ❗ aturan SPPD hanya 1 pegawai
    if ($request->jenis_surat === 'sppd' && count($request->pegawai_id) > 1) {
        return back()->withErrors([
            'pegawai_id' => 'SPPD hanya boleh satu pegawai'
        ])->withInput();
    }

    $surat = Surat::create([
        'nomor' => $request->nomor,
        'jenis_surat' => $request->jenis_surat,
        'tanggal_surat' => $request->tanggal_surat,
        'lama_perjalanan' => $request->lama_perjalanan,
        'tujuan' => $request->tujuan,
        'perihal' => $request->perihal, // ← BOLEH NULL
        'nomor_surat_tugas' => $request->nomor_surat_tugas,
    ]);

    $surat->pegawai()->sync($request->pegawai_id);

    return redirect()->route('surat.index')
        ->with('success', 'Surat berhasil disimpan');
}


}
