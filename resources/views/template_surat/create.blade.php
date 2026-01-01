@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">

            <div class="card shadow-lg border-0 animate-fade">
                <div class="card-header bg-white fw-semibold fs-5">
                    📄 Tambah Template Surat
                </div>

                <div class="card-body px-4 py-4">

                    <form action="{{ route('template-surat.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- NAMA TEMPLATE --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Nama Template
                            </label>
                            <input type="text"
                                   name="nama_template"
                                   class="form-control form-control-lg"
                                   placeholder="Contoh: Naskah Dinas"
                                   required>
                            <small class="text-muted">
                                Nama akan ditampilkan pada daftar template
                            </small>
                        </div>

                        {{-- FILE TEMPLATE --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                File Template Surat
                            </label>

                            <div class="upload-box">
                                <input type="file"
                                       name="file_template"
                                       class="form-control"
                                       accept=".doc,.docx"
                                       required>

                                <small class="text-muted d-block mt-2">
                                    Format yang didukung: <b>.doc</b>, <b>.docx</b>
                                </small>
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('template-surat.index') }}"
                               class="btn btn-outline-secondary px-4">
                                📄 Daftar Template
                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-4">
                                💾 Simpan Template
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
/* ANIMATION */
.animate-fade {
    animation: fadeUp .5s ease-in-out;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* CARD */
.card {
    border-radius: 16px;
}

/* INPUT FOCUS */
.form-control:focus {
    box-shadow: 0 0 0 .15rem rgba(13,110,253,.15);
}

/* UPLOAD BOX */
.upload-box {
    background: #f8f9fa;
    padding: 16px;
    border-radius: 12px;
    border: 1px dashed #ced4da;
    transition: all .2s ease;
}

.upload-box:hover {
    background: #f1f3f5;
}

/* BUTTON */
.btn {
    border-radius: 50px;
    font-weight: 500;
}
</style>
@endsection
