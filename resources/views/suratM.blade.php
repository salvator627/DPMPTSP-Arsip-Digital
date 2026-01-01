@extends('layouts.app')
 
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">

            <div class="card shadow-form border-0 animate-fade">
                <div class="card-header bg-white fw-bold fs-5 py-3 rounded-top-4">
                    📥 Form Registrasi Surat Masuk
                </div>

                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('surat-masuk.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data"
                          class="needs-validation"
                          novalidate>
                        @csrf

                        <!-- Nomor Surat -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Surat</label>
                            <input type="text" 
                                   name="nomor_surat" 
                                   class="form-control form-control-lg"
                                   placeholder="Contoh: 123/DPMPTSP/2025"
                                   required>
                        </div>

                        <!-- Tanggal -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Tanggal Surat</label>
                                <input type="date" 
                                       name="tanggal_surat" 
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Tanggal Terima</label>
                                <input type="date" 
                                       name="tanggal_terima" 
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <!-- Asal Surat -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Asal Surat</label>
                            <input type="text" 
                                   name="asal_surat" 
                                   class="form-control form-control-lg"
                                   placeholder="Nama instansi / pengirim"
                                   required>
                        </div>

                        <!-- Perihal -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Perihal</label>
                            <input type="text" 
                                   name="perihal" 
                                   class="form-control form-control-lg"
                                   placeholder="Perihal surat"
                                   required>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" 
                                      rows="4" 
                                      class="form-control form-control-lg"
                                      placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>

                        <!-- File -->
                        <div class="mb-5">
                            <label class="form-label fw-semibold">
                                Upload File Surat <span class="text-muted">(PDF)</span>
                            </label>
                            <input type="file" 
                                   name="file_surat" 
                                   class="form-control form-control-lg"
                                   accept="application/pdf">
                        </div>

                        <!-- Action -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
                                ↩ Reset
                            </button>

                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                💾 Simpan Surat
                            </button>

                             <a href="{{ route('surat-masuk.daftar') }}"
                            class="btn btn-outline-secondary px-4">
                                📄 Lihat Daftar Surat Masuk
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<style>
.animate-fade {
    animation: fadeUp 0.4s ease-in-out;
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

.shadow-form {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    border-radius: 12px;
}
</style>

@endsection
