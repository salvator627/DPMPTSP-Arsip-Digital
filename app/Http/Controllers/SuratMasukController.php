<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk; 
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
     public function create()
    {
        return view('suratM');
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor_surat' => 'required',
        'tanggal_surat' => 'required|date',
        'tanggal_terima' => 'required|date',
        'asal_surat' => 'required',
        'perihal' => 'required',
        'file_surat' => 'nullable|mimes:pdf|max:2048'
    ]);

    $filePath = null;
    if ($request->hasFile('file_surat')) {
        $filePath = $request->file('file_surat')->store('surat_masuk', 'public');
    }

    SuratMasuk::create([
        'nomor_surat' => $request->nomor_surat,
        'tanggal_surat' => $request->tanggal_surat,
        'tanggal_terima' => $request->tanggal_terima,
        'asal_surat' => $request->asal_surat,
        'perihal' => $request->perihal,
        'keterangan' => $request->keterangan,
        'file_surat' => $filePath,
        'user_id' => Auth::id()
    ]);

    return redirect()->back()->with('success', 'Surat masuk berhasil disimpan');
}

public function daftar()
{
    $suratMasuk = SuratMasuk::orderBy('id', 'asc')->get();

    return view('suratMasuk.daftar', compact('suratMasuk'));
}


}
