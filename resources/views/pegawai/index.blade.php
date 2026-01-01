@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">

            <div class="card shadow-lg border-0 animate-fade">
                <div class="card-header bg-white fw-bold fs-5">
                    👤 Form Tambah Pegawai
                </div>

                <div class="card-body px-4 py-4">
                    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- DATA UTAMA --}}
                        <h6 class="text-muted mb-3">Data Pegawai</h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NIP</label>
                                <input type="text" name="nip" class="form-control form-control-lg" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Golongan</label>
                                <input type="text" name="golongan" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Pangkat</label>
                                <input type="text" name="pangkat" class="form-control form-control-lg" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- DOKUMEN --}}
                        <h6 class="text-muted mb-3">Dokumen Pegawai (PDF)</h6>

                        <div class="row">
                            @php
                                $files = [
                                    'sk' => 'SK',
                                    'spmt' => 'SPMT',
                                    'ijazah' => 'Ijazah',
                                    'sk_cpns' => 'SK CPNS',
                                    'drh' => 'DRH',
                                    'karpeg' => 'Karpeg',
                                    'kk' => 'Kartu Keluarga',
                                    'ktp' => 'KTP',
                                    'akta_kelahiran' => 'Akta Kelahiran',
                                    'npwp' => 'NPWP',
                                    'sk_jabatan' => 'SK Jabatan',
                                    'skkp' => 'SKKP',
                                    'skp' => 'SKP',
                                    'taspen' => 'Kartu Taspen',
                                    'transkrip' => 'Transkrip Nilai',
                                ];
                            @endphp

                            @foreach($files as $name => $label)
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ $label }}</label>
                                    <input type="file" name="{{ $name }}" class="form-control" accept="application/pdf">
                                </div>
                            @endforeach

                            {{-- OPTIONAL --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Akta Anak (Opsional)</label>
                                <input type="file" name="akta_anak" class="form-control" accept="application/pdf">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Akta Nikah (Opsional)</label>
                                <input type="file" name="akta_nikah" class="form-control" accept="application/pdf">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Foto Pegawai</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('pegawai.daftar') }}"
                               class="btn btn-outline-secondary px-4">
                                📄 Daftar Pegawai
                            </a>

                            <button type="submit" class="btn btn-primary px-4">
                                💾 Simpan Pegawai
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Animasi --}}
<style>
.animate-fade {
    animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
