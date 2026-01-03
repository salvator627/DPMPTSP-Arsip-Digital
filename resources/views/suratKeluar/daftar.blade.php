@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 animate-fade">
        <div>
            <h4 class="fw-semibold mb-1">Daftar Surat Keluar</h4>
            <small class="text-muted">
                Daftar Surat Keluar Dinas Penanaman Modal dan PTSP
            </small>
        </div>

        <a href="{{ route('surat-keluar.create') }}"
           class="btn btn-primary rounded-pill px-4">
            ➕ Tambah Surat Keluar
        </a>
    </div>

    {{-- SEARCH --}}
    <div class="card card-minimal mb-4 animate-fade">
        <div class="card-body">
            <form method="GET" action="{{ route('surat-keluar.daftar') }}">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                        🔍
                    </span>
                    <input type="text"
                           name="search"
                           value="{{ $search ?? '' }}"
                           class="form-control border-start-0 rounded-end-pill"
                           placeholder="Cari nomor surat / tujuan / perihal">
                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card card-minimal animate-fade">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th width="140" class="text-center">File</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($suratKeluar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ $item->tanggal_surat }}</td>
                                <td>{{ $item->tujuan_surat }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td class="text-center">
                                    @if ($item->file_surat)
                                        <a href="{{ asset('storage/'.$item->file_surat) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-soft success">
                                            📄 Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <div class="mb-2 fs-4">📄</div>
                                    Data surat keluar tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
