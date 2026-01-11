<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratController extends Controller
{
    private function bulanRomawi(int $bulan): string
    {
        return [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ][$bulan];
    }

    public function create()
    {
        $tahun = now()->year;
        $bulanRomawi = $this->bulanRomawi(now()->month);

        $lastSurat = Surat::whereYear('tanggal_surat', $tahun)
            ->orderBy('id', 'desc')
            ->first();

        $noUrut = $lastSurat ? ((int) $lastSurat->nomor + 1) : 1;
        $noUrutFormat = str_pad($noUrut, 3, '0', STR_PAD_LEFT);

        $previewNomorSurat =
            "DPMPTSP.570/BID.I/{$noUrutFormat}/{$bulanRomawi}/{$tahun}";

        $pegawai = Pegawai::orderBy('nama')->get();

        return view('surat.create', compact(
            'previewNomorSurat',
            'pegawai'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|in:surat_tugas,sppd',

            'pegawai_id' => 'required|array|min:1',
            'pegawai_id.*' => 'exists:pegawais,id',

            'tanggal_surat' => 'required|date',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'required|date|after_or_equal:tanggal_berangkat',

            'tujuan' => 'required|string',
            'perihal' => 'nullable|string',
        ]);

        // aturan SPPD hanya 1 pegawai
        if ($request->jenis_surat === 'sppd' && count($request->pegawai_id) > 1) {
            return back()->withErrors([
                'pegawai_id' => 'SPPD hanya boleh satu pegawai'
            ])->withInput();
        }

        // ===============================
        // HITUNG LAMA PERJALANAN (AMAN)
        // ===============================
        $tanggalBerangkat = Carbon::parse($request->tanggal_berangkat);
        $tanggalPulang    = Carbon::parse($request->tanggal_pulang);

        $lamaPerjalanan = $tanggalBerangkat->diffInDays($tanggalPulang) + 1;

        // ===============================
        // GENERATE NOMOR SURAT
        // ===============================
        $tahun = Carbon::parse($request->tanggal_surat)->year;
        $bulan = $this->bulanRomawi(Carbon::parse($request->tanggal_surat)->month);

        $lastSurat = Surat::whereYear('tanggal_surat', $tahun)
            ->orderBy('id', 'desc')
            ->first();

        $noUrut = $lastSurat ? ((int) $lastSurat->nomor + 1) : 1;
        $noUrutFormat = str_pad($noUrut, 3, '0', STR_PAD_LEFT);

        $nomorSuratTugas =
            "DPMPTSP.570/BID.I/{$noUrutFormat}/{$bulan}/{$tahun}";

        // ===============================
        // SIMPAN SURAT
        // ===============================
        $surat = Surat::create([
            'nomor' => $noUrut,
            'nomor_surat_tugas' => $nomorSuratTugas,
            'jenis_surat' => $request->jenis_surat,

            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,

            'lama_perjalanan' => $lamaPerjalanan,

            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
        ]);

        $surat->pegawai()->sync($request->pegawai_id);

        return redirect()
            ->route('surat.create')
            ->with('success', 'Surat berhasil disimpan');
    }

      public function index()
{
    $surat = Surat::with('pegawai')
        ->orderBy('tanggal_surat', 'desc')
        ->get();

    return view('surat.index', compact('surat'));
}
}


