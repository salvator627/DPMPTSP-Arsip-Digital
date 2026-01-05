@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Registrasi Surat Keluar</h4>
        <small class="text-muted">
            Tambahkan data surat keluar Dinas Penanaman Modal dan PTSP
        </small>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('surat-keluar.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          novalidate>
                        @csrf

                        {{-- NOMOR SURAT --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Nomor Surat</label>
                            <input type="text"
                                   name="nomor_surat"
                                   class="form-control form-control-lg"
                                   placeholder="Contoh: 001/DPMPTSP/IX/2025"
                                   required>
                        </div>

                        {{-- TANGGAL & TUJUAN --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">Tanggal Surat</label>
                                <input type="date"
                                       name="tanggal_surat"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">Tujuan Surat</label>
                                <input type="text"
                                       name="tujuan_surat"
                                       class="form-control form-control-lg"
                                       placeholder="Instansi / penerima"
                                       required>
                            </div>
                        </div>

                        {{-- PERIHAL --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Perihal</label>
                            <input type="text"
                                   name="perihal"
                                   class="form-control form-control-lg"
                                   placeholder="Perihal surat"
                                   required>
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Keterangan</label>
                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control form-control-lg"
                                      placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>

                        {{-- FILE --}}
                        <div class="mb-5">
                            <label class="form-label fw-medium">
                                Upload File Surat <span class="text-muted">(PDF)</span>
                            </label>
                            <input type="file"
                                   name="file_surat"
                                   class="form-control form-control-lg"
                                   accept="application/pdf">
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex flex-wrap justify-content-end gap-2">
                        

                            <a href="{{ route('surat-keluar.daftar') }}"
                               class="btn btn-soft-primary rounded-pill px-5">
                                Daftar Surat
                            </a>

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

{{-- STYLE --}}
<style>
/* CARD */
.card-minimal {
    border: none;
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(0,0,0,.05);
}

/* FORM */
.form-control {
    border-radius: 14px;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 .15rem rgba(13,110,253,.15);
}

/* BUTTON SOFT */
.btn-soft-primary {
    background: #e3f2fd;
    color: #1565c0;
    border: none;
}

.btn-soft-primary:hover {
    background: #d0e7fb;
}

.btn-soft-secondary {
    background: #f1f3f5;
    color: #343a40;
    border: none;
}

.btn-soft-secondary:hover {
    background: #e9ecef;
}

/* ANIMATION */
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
