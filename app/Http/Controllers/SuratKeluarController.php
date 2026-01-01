<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    public function create()
    {
        return view('suratKeluar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'keterangan' => 'nullable',
            'file_surat' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')
                ->store('surat-keluar', 'public');
        }

        $data['user_id'] = Auth::id();

        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.daftar')
            ->with('success', 'Surat keluar berhasil disimpan');
    }

    public function daftar()
    {
        $suratKeluar = SuratKeluar::orderBy('id', 'asc')->get();
        return view('suratKeluar.daftar', compact('suratKeluar'));
    }
}
