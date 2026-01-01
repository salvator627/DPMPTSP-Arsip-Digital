@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">

            <div class="card shadow-form border-0 animate-fade">
                <div class="card-header bg-white fw-bold fs-5 d-flex align-items-center">
                    📤 <span class="ms-2">Form Registrasi Surat Keluar</span>
                </div>

                <div class="card-body px-5 py-4">
                    <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nomor Surat -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Surat</label>
                            <input type="text"
                                   name="nomor_surat"
                                   class="form-control form-control-lg form-interactive"
                                   placeholder="Contoh: 123/DPMPTSP/2025"
                                   required>
                        </div>

                        <!-- Tanggal & Tujuan -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Tanggal Surat</label>
                                <input type="date"
                                       name="tanggal_surat"
                                       class="form-control form-control-lg form-interactive"
                                       required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Tujuan Surat</label>
                                <input type="text"
                                       name="tujuan_surat"
                                       class="form-control form-control-lg form-interactive"
                                       placeholder="Instansi / Perorangan"
                                       required>
                            </div>
                        </div>

                        <!-- Perihal -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Perihal</label>
                            <input type="text"
                                   name="perihal"
                                   class="form-control form-control-lg form-interactive"
                                   placeholder="Perihal surat"
                                   required>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control form-control-lg form-interactive"
                                      placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>

                        <!-- Upload -->
                        <div class="mb-5">
                            <label class="form-label fw-semibold">
                                Upload File Surat (PDF)
                            </label>
                            <input type="file"
                                   name="file_surat"
                                   class="form-control form-control-lg form-interactive"
                                   accept="application/pdf">
                            <small class="text-muted">
                                Hanya file PDF, maksimal 2MB
                            </small>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('surat-keluar.daftar') }}"
                               class="btn btn-outline-secondary btn-lg px-4">
                                📄 Daftar Surat Keluar
                            </a>

                            <button type="submit"
                                    class="btn btn-primary btn-lg px-4">
                                💾 Simpan Surat
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- CSS --}}
<style>
.form-interactive {
    transition: all 0.2s ease-in-out;
}

.form-interactive:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.15rem rgba(13,110,253,.25);
}

.animate-fade {
    animation: fadeUp .4s ease-in-out;
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

.shadow-form {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    border-radius: 12px;
    transition: all 0.2s ease-in-out;
}

.shadow-form:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.16);
}
</style>
@endsection
