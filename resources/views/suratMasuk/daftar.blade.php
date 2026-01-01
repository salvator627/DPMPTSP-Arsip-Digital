@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">📄 Daftar Surat Masuk</h4>

        <a href="{{ route('surat-masuk.create') }}" class="btn btn-danger">
            ➕ Tambah Surat Masuk
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>File</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($suratMasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->asal_surat }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>
                                @if ($item->file_surat)
                                    <a href="{{ asset('storage/'.$item->file_surat) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        📄 Lihat
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data surat masuk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
