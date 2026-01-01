@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <form method="GET" action="{{ route('pegawai.daftar') }}" class="mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-md-4">
            <input type="text"
                   name="search"
                   value="{{ $search ?? '' }}"
                   class="form-control form-control-lg"
                   placeholder="🔍 Cari Nama / NIP / Jabatan">
        </div>

        <div class="col-md-auto">
            <button class="btn btn-secondary btn-lg px-4">
                Cari
            </button>
        </div>

        @if(request('search'))
            <div class="col-md-auto">
                <a href="{{ route('pegawai.daftar') }}"
                   class="btn btn-outline-secondary btn-lg">
                    Reset
                </a>
            </div>
        @endif
    </div>
</form>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">👥 Daftar Pegawai</h5>

                    <a href="{{ route('pegawai.index') }}"
                       class="btn btn-primary">
                        ➕ Tambah Pegawai
                    </a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Pangkat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $p->nama }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>{{ $p->golongan }}</td>
                                    <td>{{ $p->pangkat }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pegawai.show', $p->id) }}"
                                            class="btn btn-sm btn-info">
                                            👁 Detail
                                         </a>
                                        <form action="{{ route('pegawai.destroy', $p->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin hapus pegawai ini?')">
                                            @csrf
                                            @method('DELETE')
                                             {{--  <button class="btn btn-sm btn-danger">
                                                🗑 Hapus
                                            </button> --}}
                    
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        Belum ada data pegawai
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
