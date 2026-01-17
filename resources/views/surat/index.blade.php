@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
                            <th>No. Surat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($surat as $item)
                            <tr class="surat-row"
                                style="cursor:pointer"
                                data-id="{{ $item->id }}"
                                data-jenis="{{ $item->jenis_surat }}">

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

                                <td class="col-perihal small">
                                    {{ $item->perihal }}
                                </td>

                                <td class="small">
                                    {{ $item->nomor_surat_tugas }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"
                                    class="text-center text-muted py-4">
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

{{-- ================= MODAL CETAK ================= --}}
<div class="modal fade" id="modalCetak" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cetak Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

                {{-- TOMBOL SURAT TUGAS --}}
                <a id="btnSuratTugas"
                   href="{{ route('surat.cetak.surat_tugas', $item->id) }}"
                   class="btn btn-primary w-100 mb-2 d-none">
                    Cetak Surat Tugas
                </a>

                {{-- TOMBOL SPPD --}}
                <a id="btnSPPD"
                   href="#"
                   class="btn btn-success w-100 d-none">
                    Cetak SPPD
                </a>

            </div>

        </div>
    </div>
</div>


{{-- ================= SCRIPT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = new bootstrap.Modal(document.getElementById('modalCetak'));

    const btnSuratTugas = document.getElementById('btnSuratTugas');
    const btnSPPD = document.getElementById('btnSPPD');

    document.querySelectorAll('.surat-row').forEach(row => {
        row.addEventListener('click', function () {

            const id = this.dataset.id;
            const jenis = this.dataset.jenis;

            // reset
            btnSuratTugas.classList.add('d-none');
            btnSPPD.classList.add('d-none');

            if (jenis === 'surat_tugas') {
                btnSuratTugas.classList.remove('d-none');
                btnSuratTugas.href = `/surat/${id}/cetak-surat-tugas`;
            }

            if (jenis === 'sppd') {
                btnSPPD.classList.remove('d-none');
                btnSPPD.href = `/surat/${id}/cetak-sppd`;
            }

            modal.show();
        });
    });
});
</script>



{{-- ================= STYLE ================= --}}
<style>
.card-minimal {
    border: none;
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(0,0,0,.05);
}

.col-nama {
    min-width: 280px;
}

.col-perihal {
    max-width: 220px;
    white-space: normal;
    word-break: break-word;
    line-height: 1.4;
}

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
