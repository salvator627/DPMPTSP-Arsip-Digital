<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * HALAMAN FORM TAMBAH PEGAWAI
     */
    public function index()
    {
        return view('pegawai.index');
    }

    /**
     * SIMPAN DATA PEGAWAI
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:30',
            'jabatan' => 'required|string|max:255',
            'golongan' => 'required|string|max:50',
            'pangkat' => 'required|string|max:100',

            // FILE
            'sk' => 'nullable|file|mimes:pdf',
            'spmt' => 'nullable|file|mimes:pdf',
            'ijazah' => 'nullable|file|mimes:pdf',
            'sk_cpns' => 'nullable|file|mimes:pdf',
            'drh' => 'nullable|file|mimes:pdf',
            'akta_anak' => 'nullable|file|mimes:pdf',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png',
            'karpeg' => 'nullable|file|mimes:pdf',
            'kk' => 'nullable|file|mimes:pdf',
            'ktp' => 'nullable|file|mimes:pdf',
            'akta_kelahiran' => 'nullable|file|mimes:pdf',
            'akta_nikah' => 'nullable|file|mimes:pdf',
            'npwp' => 'nullable|file|mimes:pdf',
            'sk_jabatan' => 'nullable|file|mimes:pdf',
            'skkp' => 'nullable|file|mimes:pdf',
            'skp' => 'nullable|file|mimes:pdf',
            'taspen' => 'nullable|file|mimes:pdf',
            'transkrip' => 'nullable|file|mimes:pdf',
        ]);

        /**
         * UPLOAD FILE SATU PER SATU (AMAN)
         */
        $fileFields = [
            'sk','spmt','ijazah','sk_cpns','drh','akta_anak',
            'karpeg','kk','ktp','akta_kelahiran','akta_nikah',
            'npwp','sk_jabatan','skkp','skp','taspen','transkrip'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('pegawai', 'public');
            }
        }

        // FOTO
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pegawai/foto', 'public');
        }

        Pegawai::create($validated);

        return redirect()
            ->route('pegawai.daftar')
            ->with('success', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * HALAMAN DAFTAR PEGAWAI
     */
    public function daftar(Request $request)
{
    $search = $request->search;

    $pegawai = Pegawai::when($search, function ($query, $search) {
        $query->where('nama', 'like', "%$search%")
              ->orWhere('nip', 'like', "%$search%")
              ->orWhere('jabatan', 'like', "%$search%");
    })
    ->latest()
    ->get();

    return view('pegawai.daftar', compact('pegawai', 'search'));
}



    /**
     * HAPUS DATA PEGAWAI + FILE
     */
    public function destroy(Pegawai $pegawai)
    {
        $fileFields = [
            'sk','spmt','ijazah','sk_cpns','drh','akta_anak',
            'karpeg','kk','ktp','akta_kelahiran','akta_nikah',
            'npwp','sk_jabatan','skkp','skp','taspen','transkrip','foto'
        ];

        foreach ($fileFields as $field) {
            if ($pegawai->$field) {
                Storage::disk('public')->delete($pegawai->$field);
            }
        }

        $pegawai->delete();

        return back()->with('success', 'Data pegawai berhasil dihapus');
    }

    public function show(Pegawai $pegawai)
{
    return view('pegawai.detail', compact('pegawai'));
}
}
