@extends('layouts.app')

@section('content')
<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-0">👥 Daftar Pegawai</h4>
            <small class="text-muted">Daftar Pegawai DPMPTSP</small>
        </div>

        <a href="{{ route('pegawai.index') }}"
           class="btn btn-primary rounded-pill px-4">
            ➕ Tambah Pegawai
        </a>
    </div>

    {{-- ================= SEARCH ================= --}}
    <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('pegawai.daftar') }}">
                <div class="input-group input-group-lg">
                    <input type="text"
                           name="search"
                           value="{{ $search ?? '' }}"
                           class="form-control"
                           placeholder="🔍 Cari Nama / NIP / Jabatan">

                    <button class="btn btn-secondary px-4">
                        Cari
                    </button>

                    @if(request('search'))
                        <a href="{{ route('pegawai.daftar') }}"
                           class="btn btn-outline-secondary px-4">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- ================= TABLE ================= --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Pangkat</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pegawai as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $p->nama }}
                                </td>

                                <td>{{ $p->nip }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->golongan }}</td>
                                <td>{{ $p->pangkat }}</td>

                                <td class="text-center">
                                    <div class="d-inline-flex gap-2">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('pegawai.show', $p->id) }}"
                                           class="btn btn-sm btn-soft-success rounded-pill btn-action">
                                            👁 Detail
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('pegawai.destroy', $p->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin hapus pegawai ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-soft-danger rounded-pill btn-action">
                                                🗑 Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Data pegawai tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

{{-- ================= STYLE ================= --}}
<style>
/* CARD */
.card {
    border-radius: 16px;
}

/* TABLE */
.table th {
    font-weight: 600;
}

/* BUTTON BASE */
.btn-action {
    padding: 6px 14px;
    font-size: 13px;
    line-height: 1.2;
    font-weight: 500;
    border-radius: 999px;
    transition: all .2s ease;
}

/* SOFT SUCCESS (DETAIL) */
.btn-soft-success {
    background: #e8f5e9;
    color: #2e7d32;
    border: none;
}

.btn-soft-success:hover {
    background: #c8e6c9;
    color: #1b5e20;
}

/* SOFT DANGER (HAPUS) */
.btn-soft-danger {
    background: #fdecea;
    color: #d32f2f;
    border: none;
}

.btn-soft-danger:hover {
    background: #f9d6d3;
    color: #b71c1c;
}
</style>
@endsection
