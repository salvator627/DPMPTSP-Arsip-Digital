@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Registrasi Surat Tugas</h4>
        <small class="text-muted">
            Tambahkan data surat tugas dan SPPD Dinas Penanaman Modal dan PTSP
        </small>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 col-xxl-9">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    {{-- PREVIEW NOMOR SURAT --}}
                    <div class="mb-4">
                        <label class="form-label fw-medium">
                            Nomor Surat (Otomatis)
                        </label>
                        <input type="text"
                               class="form-control form-control-lg bg-light"
                               value="{{ $previewNomorSurat }}"
                               readonly>
                    </div>

                    <form method="POST"
                          action="{{ route('surat.store') }}"
                          novalidate>
                        @csrf

                        {{-- JENIS SURAT (DIKUNCI) --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Jenis Surat</label>
                            <input type="text"
                                   class="form-control form-control-lg bg-light"
                                   value="Surat Tugas"
                                   readonly>
                        </div>

                        {{-- PEGAWAI --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium">Nama Pegawai</label>

                            <div id="pegawai-wrapper">
                                <select name="pegawai_id[]"
                                        class="form-control form-control-lg mb-2"
                                        required>
                                    @foreach($pegawai as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button"
                                    id="btnTambah"
                                    class="btn btn-soft-secondary btn-sm">
                                + Tambah Pegawai
                            </button>
                        </div>

                        {{-- TANGGAL SURAT --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Tanggal Surat</label>
                            <input type="date"
                                   name="tanggal_surat"
                                   class="form-control form-control-lg"
                                   required>
                        </div>

                        {{-- TANGGAL DINAS --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">
                                    Tanggal Berangkat
                                </label>
                                <input type="date"
                                       id="tgl_berangkat"
                                       name="tanggal_berangkat"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">
                                    Tanggal Pulang
                                </label>
                                <input type="date"
                                       id="tgl_pulang"
                                       name="tanggal_pulang"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        {{-- PREVIEW LAMA PERJALANAN --}}
                        <div class="mb-4 text-muted">
                            Lama Perjalanan:
                            <span id="preview-lama">0 hari</span>
                        </div>

                        {{-- TUJUAN --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Tujuan</label>
                            <input type="text"
                                   name="tujuan"
                                   class="form-control form-control-lg"
                                   required>
                        </div>

                        {{-- PERIHAL --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Perihal</label>
                            <textarea name="perihal"
                                      rows="3"
                                      class="form-control form-control-lg"></textarea>
                        </div>

                        {{-- LUAR KOTA --}}
                        <div class="form-check mb-5">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="perjalanan_luar_kota"
                                   value="1">
                            <label class="form-check-label">
                                Perjalanan Luar Kota (Otomatis buat SPPD)
                            </label>
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-end">
                            <x-button type="submit" class="px-5">
                                Simpan
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
document.getElementById('btnTambah').addEventListener('click', function () {
    const wrapper = document.getElementById('pegawai-wrapper');
    wrapper.appendChild(wrapper.children[0].cloneNode(true));
});

function hitungLama() {
    const b = document.getElementById('tgl_berangkat').value;
    const p = document.getElementById('tgl_pulang').value;

    if (b && p) {
        const start = new Date(b);
        const end = new Date(p);
        const diff = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;
        document.getElementById('preview-lama').innerText =
            diff > 0 ? diff + ' hari' : '0 hari';
    }
}

document.getElementById('tgl_berangkat').addEventListener('change', hitungLama);
document.getElementById('tgl_pulang').addEventListener('change', hitungLama);
</script>

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
