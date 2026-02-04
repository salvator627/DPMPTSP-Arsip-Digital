@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 animate-fade">
        <div>
            <h4 class="fw-semibold mb-1">Daftar Surat Tugas & SPPD</h4>
            <small class="text-muted">Daftar seluruh surat tugas dan SPPD yang telah dibuat</small>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- SEARCH (UI ONLY) --}}
    <div class="card card-minimal mb-4 animate-fade">
        <div class="card-body">
            <form method="GET">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                        🔍
                    </span>
                    <input type="text"
                           class="form-control border-start-0 rounded-end-pill"
                           placeholder="Cari nomor surat / pegawai / tujuan...">
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
                        <th width="90" class="ps-4">No</th>
                        <th>Jenis</th>
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

                            <td class="ps-4 fw-medium">{{ $item->nomor }}</td>

                            <td class="text-muted">
                                {{ strtoupper(str_replace('_',' ', $item->jenis_surat)) }}
                            </td>

                            <td class="col-nama">
                                <ul class="mb-0 ps-3 small">
                                    @foreach($item->pegawai as $p)
                                        <li>{{ $p->nama }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="small">{{ $item->tujuan }}</td>
                            <td class="small">{{ $item->lama_perjalanan }} hari</td>
                            <td class="small">
                                {{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}
                            </td>
                            <td class="col-perihal small">{{ $item->perihal }}</td>
                            <td class="small">{{ $item->nomor_surat_tugas }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <div class="mb-2 fs-4">📄</div>
                                Belum ada data surat
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
                <a id="btnSuratTugas" class="btn btn-primary w-100 mb-2 d-none">
                    Cetak Surat Tugas
                </a>

                <a id="btnSPPD" class="btn btn-success w-100 d-none">
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

.table thead th {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

.col-nama { min-width: 280px; }

.col-perihal {
    max-width: 220px;
    white-space: normal;
    word-break: break-word;
    line-height: 1.4;
}

.input-group-text { border-radius: 50px; }

.animate-fade {
    animation: fadeUp .5s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
