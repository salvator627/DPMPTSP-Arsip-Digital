<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratController extends Controller
{
    public function cetakSuratTugas($id)
{
    $surat = Surat::with('pegawai')->findOrFail($id);

    // Load template
    $template = new TemplateProcessor(
        storage_path('app/templates/surat_tugas.docx')
    );

    // =========================
    // DATA DINAMIS
    // =========================

    // Nomor surat
    $template->setValue('nomor_surat', $surat->nomor_surat_tugas);

    // Dasar (tetap atau dari DB)
    $template->setValue(
        'dasar',
        'DPA Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Ende Tentang Perjalanan Dinas Dalam Daerah Tahun Anggaran ' .
        Carbon::parse($surat->tanggal_surat)->year
    );

    // =========================
    // LIST PEGAWAI
    // =========================
$pegawaiText = '';
$no = 1;

// lebar kolom nomor (misal: "1.   " = 5 karakter)
$nomorWidth = 6;

foreach ($surat->pegawai as $p) {
    $nomor = str_pad($no . '.', $nomorWidth, ' ', STR_PAD_RIGHT);

    $pegawaiText .=
                        $nomor       . "Nama               :  {$p->nama}\n" .
        str_repeat(' ', $nomorWidth) . "NIP                :  {$p->nip}\n" .
        str_repeat(' ', $nomorWidth) . "Pangkat/Gol        :  {$p->pangkat}\n" .
        str_repeat(' ', $nomorWidth) . "Jabatan            :  {$p->jabatan}\n\n";

    $no++;
}

$template->setValue('pegawai_list', $pegawaiText);


    // =========================
    // PERIHAL / UNTUK
    // =========================
    $template->setValue('perihal', $surat->perihal);

    // =========================
    // TANGGAL
    // =========================
    $template->setValue(
        'tanggal_surat',
        Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y')
    );

    // =========================
    // SIMPAN & DOWNLOAD
    // =========================
    $fileName = 'Surat_Tugas_' . str_replace('/', '_', $surat->nomor_surat_tugas) . '.docx';
    $path = storage_path('app/temp/' . $fileName);

    if (!file_exists(storage_path('app/temp'))) {
        mkdir(storage_path('app/temp'), 0777, true);
    }

    $template->saveAs($path);

    return response()->download($path)->deleteFileAfterSend(true);
}

    private function bulanRomawi(int $bulan): string
    {
        return [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ][$bulan];
    }

    /* =========================
     * LIST SURAT
     * ========================= */
  public function index()
{
    $surat = Surat::with('pegawai')
        ->orderBy('nomor', 'asc') // ⬅️ KUNCI UTAMA
        ->get();

    return view('surat.index', compact('surat'));
}

    /* =========================
     * FORM CREATE
     * ========================= */
    public function create()
    {
        $pegawai = Pegawai::orderBy('nama')->get();

        // PREVIEW NOMOR SURAT (BERDASARKAN TANGGAL HARI INI)
        $tanggal = now();
        $tahun = $tanggal->year;
        $bulanRomawi = $this->bulanRomawi($tanggal->month);

        $lastSurat = Surat::whereYear('tanggal_surat', $tahun)
            ->orderBy('nomor', 'desc')
            ->first();

        $noUrut = $lastSurat ? $lastSurat->nomor + 1 : 1;

        $previewNomorSurat =
            'DPMPTSP.570/BID.I/' .
            str_pad($noUrut, 3, '0', STR_PAD_LEFT) .
            "/{$bulanRomawi}/{$tahun}";

        return view('surat.create', compact(
            'pegawai',
            'previewNomorSurat'
        ));
    }

    /* =========================
     * SIMPAN SURAT
     * ========================= */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_surat' => 'required|date',
            'pegawai_id' => 'required|array|min:1',
            'pegawai_id.*' => 'exists:pegawais,id',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'required|date|after_or_equal:tanggal_berangkat',
            'tujuan' => 'required|string',
            'perihal' => 'nullable|string',
            'perjalanan_luar_kota' => 'nullable|boolean',
        ]);

        DB::transaction(function () use ($request) {

            // Lama perjalanan (inklusif)
            $lama = Carbon::parse($request->tanggal_berangkat)
                ->diffInDays(Carbon::parse($request->tanggal_pulang)) + 1;

            // Penomoran berdasar tanggal surat
            $tanggalSurat = Carbon::parse($request->tanggal_surat);
            $tahun = $tanggalSurat->year;
            $bulanRomawi = $this->bulanRomawi($tanggalSurat->month);

            $lastSurat = Surat::whereYear('tanggal_surat', $tahun)
                ->orderBy('nomor', 'desc')
                ->first();

            $nomorUrut = $lastSurat ? $lastSurat->nomor + 1 : 1;

            /* =========================
             * SURAT TUGAS (INDUK)
             * ========================= */
            $nomorSurat = "DPMPTSP.570/BID.I/" .
                str_pad($nomorUrut, 3, '0', STR_PAD_LEFT) .
                "/{$bulanRomawi}/{$tahun}";

            $suratTugas = Surat::create([
                'nomor' => $nomorUrut,
                'jenis_surat' => 'surat_tugas',
                'tanggal_surat' => $request->tanggal_surat,
                'tanggal_berangkat' => $request->tanggal_berangkat,
                'tanggal_pulang' => $request->tanggal_pulang,
                'lama_perjalanan' => $lama,
                'tujuan' => $request->tujuan,
                'perihal' => $request->perihal,
                'nomor_surat_tugas' => $nomorSurat,
                'perjalanan_luar_kota' => $request->boolean('perjalanan_luar_kota'),
            ]);

            $suratTugas->pegawai()->sync($request->pegawai_id);

            /* =========================
             * AUTO SPPD
             * ========================= */
            if ($request->boolean('perjalanan_luar_kota')) {
                foreach ($request->pegawai_id as $pegawaiId) {
                    $nomorUrut++;

                    $nomorSPPD = "DPMPTSP.570/BID.I/" .
                        str_pad($nomorUrut, 3, '0', STR_PAD_LEFT) .
                        "/{$bulanRomawi}/{$tahun}";

                    $sppd = Surat::create([
                        'nomor' => $nomorUrut,
                        'jenis_surat' => 'sppd',
                        'tanggal_surat' => $request->tanggal_surat,
                        'tanggal_berangkat' => $request->tanggal_berangkat,
                        'tanggal_pulang' => $request->tanggal_pulang,
                        'lama_perjalanan' => $lama,
                        'tujuan' => $request->tujuan,
                        'perihal' => $request->perihal,
                        'nomor_surat_tugas' => $nomorSPPD,
                        'perjalanan_luar_kota' => true,
                    ]);

                    $sppd->pegawai()->sync([$pegawaiId]);
                }
            }
        });

        return redirect()
            ->route('surat.create')
            ->with('success', 'Surat tugas & SPPD berhasil dibuat');
    }
}
