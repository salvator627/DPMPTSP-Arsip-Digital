@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 animate-fade">
        <div>
            <h4 class="fw-semibold mb-1">Daftar Pegawai</h4>
            <small class="text-muted">
                Daftar Pegawai Dinas Penanaman Modal dan PTSP
            </small>
        </div>

        @auth
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('pegawai.index') }}"
           class="btn btn-primary rounded-pill px-4">
            ➕ Tambah Pegawai
        </a>
        @endif
        @endauth
    </div>
  

    {{-- SEARCH --}}
    <div class="card card-minimal mb-4 animate-fade">
        <div class="card-body">
            <form method="GET" action="{{ route('pegawai.daftar') }}">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                        🔍
                    </span>
                    <input type="text"
                           name="search"
                           value="{{ $search ?? '' }}"
                           class="form-control border-start-0 rounded-end-pill"
                           placeholder="Cari nama / NIP / jabatan pegawai...">
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
                            <th width="60" class="ps-4">No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Pangkat</th>
                            <th width="220" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $p)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $p->nama }}</td>
                                <td>{{ $p->nip }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->golongan }}</td>
                                <td>{{ $p->pangkat }}</td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('pegawai.show', $p->id) }}"
                                           class="btn btn-sm btn-soft success">
                                            👁 Detail
                                        </a>

                                        @auth
                                        @if(auth()->user()->role === 'admin')
                                        <form action="{{ route('pegawai.destroy', $p->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin hapus pegawai ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-soft danger">
                                                🗑 Hapus
                                            </button>
                                        </form>
                                         @endif
                                        @endauth

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <div class="fs-4 mb-2">👥</div>
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
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

.table td {
    vertical-align: middle;
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

/* SEARCH */
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
