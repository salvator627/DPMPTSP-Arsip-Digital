@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Daftar Surat Tugas & SPPD</h4>
        <small class="text-muted">
            Daftar seluruh surat tugas dan SPPD yang telah dibuat
        </small>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-minimal animate-fade">
        <div class="card-body p-4 p-md-5">

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th>Nomor Urut</th>
                            <th>Jenis Surat</th>
                            <th class="col-nama">Nama Pegawai</th>
                            <th>Tujuan</th>
                            <th>Lama</th>
                            <th>Tanggal</th>
                            <th class="col-perihal">Perihal</th>
                            <th>No. Surat Tugas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($surat as $item)
                            <tr>
                                <td class="fw-medium">
                                    {{ $item->nomor }}
                                </td>

                                <td class="text-muted">
                                    {{ strtoupper(str_replace('_',' ', $item->jenis_surat)) }}
                                </td>

                                {{-- NAMA PEGAWAI --}}
                                <td class="col-nama">
                                    <ul class="mb-0 ps-3 small">
                                        @foreach($item->pegawai as $p)
                                            <li>{{ $p->nama }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td class="small">
                                    {{ $item->tujuan }}
                                </td>

                                <td class="small">
                                    {{ $item->lama_perjalanan }} hari
                                </td>

                                <td class="small">
                                    {{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}
                                </td>

                                {{-- PERIHAL (MULTI BARIS, TIDAK DIPOTONG) --}}
                                <td class="col-perihal small">
                                    {{ $item->perihal }}
                                </td>

                                <td class="small">
                                    {{ $item->nomor_surat_tugas }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada data surat
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

/* KOLOM */
.col-nama {
    min-width: 280px;
}

.col-perihal {
    max-width: 220px;
    white-space: normal;      /* ⬅️ PENTING: BIAR ENTER KE BAWAH */
    word-break: break-word;  /* ⬅️ JAGA KALIMAT PANJANG */
    line-height: 1.4;
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
