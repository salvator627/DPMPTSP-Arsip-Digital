@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 animate-fade">
        <div>
            <h4 class="fw-semibold mb-1">Daftar Template Surat</h4>
            <small class="text-muted">Kelola template surat yang tersedia</small>
        </div>

        <a href="{{ route('template-surat.create') }}"
           class="btn btn-primary rounded-pill px-4">
            ➕ Tambah Template
        </a>
    </div>

    {{-- SEARCH --}}
    <div class="card card-minimal mb-4 animate-fade">
        <div class="card-body">
            <form method="GET" action="{{ route('template-surat.index') }}">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                        🔍
                    </span>
                    <input type="text"
                           name="search"
                           value="{{ $search ?? '' }}"
                           class="form-control border-start-0 rounded-end-pill"
                           placeholder="Cari nama template surat...">
                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card card-minimal animate-fade">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Nama Template</th>
                        <th width="240" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($templates as $t)
                        <tr>
                            <td class="ps-4 fw-medium">
                                {{ $t->nama_template }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('template-surat.download', $t->id) }}"
                                   class="btn btn-sm btn-soft success me-1">
                                    ⬇ Download
                                </a>

                                <form action="{{ route('template-surat.destroy', $t->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-soft danger"
                                            onclick="return confirm('Yakin hapus template ini?')">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-5 text-muted">
                                <div class="mb-2 fs-4">📄</div>
                                Template surat tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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

/* TABLE */
.table thead th {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

/* BUTTON SOFT */
.btn-soft {
    border-radius: 50px;
    padding: 6px 14px;
    font-size: 13px;
    font-weight: 500;
    border: 1px solid transparent;
    transition: all .2s ease;
}

.btn-soft.success {
    background: #e8f5e9;
    color: #2e7d32;
}

.btn-soft.success:hover {
    background: #dcedc8;
}

.btn-soft.danger {
    background: #fdecea;
    color: #c62828;
}

.btn-soft.danger:hover {
    background: #f9d6d3;
}

/* INPUT */
.input-group-text {
    border-radius: 50px;
}

/* ANIMATION */
.animate-fade {
    animation: fadeUp .5s ease;
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
