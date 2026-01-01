@extends('layouts.app')

@section('content')
<div class="container-fluid">

<h4 class="fw-bold mb-3">📄 Daftar Surat Keluar</h4>

<div class="card shadow-sm">
<div class="card-body">

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Nomor</th>
<th>Tanggal</th>
<th>Tujuan</th>
<th>Perihal</th>
<th>File</th>
</tr>
</thead>

<tbody>
@forelse($suratKeluar as $item)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->nomor_surat }}</td>
<td>{{ $item->tanggal_surat }}</td>
<td>{{ $item->tujuan_surat }}</td>
<td>{{ $item->perihal }}</td>
<td>
    @if($item->file_surat)
        <a href="{{ asset('storage/'.$item->file_surat) }}"
           target="_blank"
           class="btn btn-sm btn-outline-primary">
            📄 Lihat
        </a>
    @else
        <span class="text-muted">-</span>
    @endif
</td>

</tr>
@empty
<tr><td colspan="6" class="text-center">Belum ada data</td></tr>
@endforelse
</tbody>

</table>

</div>
</div>
</div>
@endsection
