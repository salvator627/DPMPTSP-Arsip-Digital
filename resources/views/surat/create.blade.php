@extends('layouts.app')

@section('content')
<div class="container">

<h4 class="mb-4">Tambah Surat</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('surat.store') }}">
@csrf

{{-- PREVIEW NOMOR --}}
<div class="mb-4">
    <label class="form-label">Nomor Surat</label>
    <input type="text"
           class="form-control"
           value="{{ $previewNomorSurat }}"
           readonly>
</div>

{{-- JENIS --}}
<div class="mb-4">
    <label class="form-label">Jenis Surat</label>
    <select name="jenis_surat" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="surat_tugas">Surat Tugas</option>
        <option value="sppd">SPPD</option>
    </select>
</div>

{{-- PEGAWAI --}}
<div class="mb-4">
    <label class="form-label">Pegawai</label>
    <select name="pegawai_id[]" class="form-control" multiple required>
        @foreach($pegawai as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>
    <small class="text-muted">SPPD hanya boleh 1 pegawai</small>
</div>

{{-- TANGGAL --}}
<div class="row">
    <div class="col-md-4 mb-4">
        <label class="form-label">Tanggal Surat</label>
        <input type="date" name="tanggal_surat" class="form-control" required>
    </div>

    <div class="col-md-4 mb-4">
        <label class="form-label">Tanggal Berangkat</label>
        <input type="date" id="tgl_berangkat" name="tanggal_berangkat" class="form-control" required>
    </div>

    <div class="col-md-4 mb-4">
        <label class="form-label">Tanggal Pulang</label>
        <input type="date" id="tgl_pulang" name="tanggal_pulang" class="form-control" required>
    </div>
</div>

{{-- LAMA --}}
<div class="mb-4">
    <label class="form-label">Lama Perjalanan (hari)</label>
    <input type="number" id="lama" class="form-control" readonly>
</div>

{{-- TUJUAN --}}
<div class="mb-4">
    <label class="form-label">Tujuan</label>
    <input type="text" name="tujuan" class="form-control" required>
</div>

{{-- PERIHAL --}}
<div class="mb-4">
    <label class="form-label">Perihal (Opsional)</label>
    <textarea name="perihal" class="form-control"></textarea>
</div>

<button class="btn btn-primary">Simpan</button>

</form>
</div>

{{-- JS HITUNG HARI --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const berangkat = document.getElementById('tgl_berangkat');
    const pulang = document.getElementById('tgl_pulang');
    const lama = document.getElementById('lama');

    function hitung() {
        if (!berangkat.value || !pulang.value) return;

        const start = new Date(berangkat.value);
        const end = new Date(pulang.value);

        if (end < start) {
            alert('Tanggal pulang tidak boleh lebih awal');
            pulang.value = '';
            lama.value = '';
            return;
        }

        const diff = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;
        lama.value = diff;
    }

    berangkat.addEventListener('change', hitung);
    pulang.addEventListener('change', hitung);
});
</script>
@endsection
