@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Tambah Template Surat</h4>
        <small class="text-muted">
            Tambahkan template surat yang akan digunakan
        </small>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('template-surat.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- NAMA TEMPLATE --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">
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
                        <div class="mb-5">
                            <label class="form-label fw-medium">
                                File Template Surat
                            </label>

                            <div class="upload-box">
                                <input type="file"
                                       name="file_template"
                                       class="form-control form-control-lg"
                                       accept=".doc,.docx"
                                       required>

                                <small class="text-muted d-block mt-2">
                                    Format yang didukung: <b>.doc</b>, <b>.docx</b>
                                </small>
                            </div>
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex flex-wrap justify-content-end gap-2">
                            <a href="{{ route('template-surat.index') }}"
                               class="btn btn-soft-primary rounded-pill px-5">
                                Daftar Template
                            </a>

                            <x-button type="submit"
                                    class="btn-login px-5">
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

/* UPLOAD BOX */
.upload-box {
    background: #f8f9fa;
    padding: 18px;
    border-radius: 14px;
    border: 1px dashed #ced4da;
    transition: all .25s ease;
}

.upload-box:hover {
    background: #f1f3f5;
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
