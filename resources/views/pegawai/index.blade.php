@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Form Tambah Pegawai</h4>
        <small class="text-muted">
            Tambahkan data pegawai Dinas Penanaman Modal dan PTSP
        </small>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('pegawai.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- DATA PEGAWAI --}}
                        <h6 class="text-muted mb-3">Data Pegawai</h6>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">NIP</label>
                                <input type="text"
                                       name="nip"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">Jabatan</label>
                                <input type="text"
                                       name="jabatan"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">Golongan</label>
                                <input type="text"
                                       name="golongan"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">Pangkat</label>
                                <input type="text"
                                       name="pangkat"
                                       class="form-control form-control-lg"
                                       required>
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-medium">{{ $label }}</label>
                                    <input type="file"
                                           name="{{ $name }}"
                                           class="form-control"
                                           accept="application/pdf">
                                </div>
                            @endforeach

                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">
                                    Akta Anak <span class="text-muted">(Opsional)</span>
                                </label>
                                <input type="file"
                                       name="akta_anak"
                                       class="form-control"
                                       accept="application/pdf">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">
                                    Akta Nikah <span class="text-muted">(Opsional)</span>
                                </label>
                                <input type="file"
                                       name="akta_nikah"
                                       class="form-control"
                                       accept="application/pdf">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label fw-medium">Foto Pegawai</label>
                                <input type="file"
                                       name="foto"
                                       class="form-control"
                                       accept="image/*">
                            </div>
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                            <a href="{{ route('pegawai.daftar') }}"
                               class="btn btn-soft-secondary rounded-pill px-4">
                                Daftar Pegawai
                            </a>

                            <button type="submit"
                                    class="btn btn-primary rounded-pill px-5">
                                Simpan Pegawai
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- STYLE --}}
<style>
.card-minimal {
    border: none;
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(0,0,0,.05);
}

.form-control {
    border-radius: 14px;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 .15rem rgba(13,110,253,.15);
}

.btn-soft-secondary {
    background: #f1f3f5;
    color: #343a40;
    border: none;
}

.btn-soft-secondary:hover {
    background: #e9ecef;
}

.animate-fade {
    animation: fadeUp .45s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
