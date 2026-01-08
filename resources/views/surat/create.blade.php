@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    <h4 class="fw-semibold mb-4">Surat Tugas & SPPD</h4>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-form">
        <div class="card-body p-4 p-md-5">

            <form action="{{ route('surat.store') }}" method="POST">
                @csrf

                {{-- NOMOR --}}
                <div class="form-group">
                    <label class="form-label">Nomor</label>
                    <input type="text" name="nomor" class="form-control form-control-lg" required>
                </div>

                {{-- JENIS SURAT --}}
                <div class="form-group">
                    <label class="form-label">Jenis Surat</label>
                    <select name="jenis_surat" id="jenis_surat" class="form-control form-control-lg" required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option value="surat_tugas">Surat Tugas</option>
                        <option value="sppd">SPPD</option>
                    </select>
                </div>

                {{-- PEGAWAI --}}
                <div class="form-group">
                    <label class="form-label">Nama Pegawai</label>

                    <div id="pegawai-wrapper">
                        <div class="pegawai-row">
                            <select name="pegawai_id[]" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Pegawai --</option>
                                @foreach($pegawai as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="button"
                            id="btn-tambah-pegawai"
                            class="btn btn-outline-secondary btn-sm mt-2 d-none">
                        + Tambah Pegawai
                    </button>
                </div>

                {{-- TANGGAL --}}
                <div class="form-group">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control form-control-lg" required>
                </div>

                {{-- LAMA --}}
                <div class="form-group">
                    <label class="form-label">Lama Perjalanan (hari)</label>
                    <input type="number" name="lama_perjalanan" class="form-control form-control-lg" required>
                </div>

                {{-- TUJUAN --}}
                <div class="form-group">
                    <label class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" class="form-control form-control-lg" required>
                </div>

                {{-- PERIHAL --}}
{{-- PERIHAL --}}
<div class="mb-4">
    <label class="form-label">Perihal</label>
    <textarea
        name="perihal"
        rows="3"
        class="form-control form-control-lg"
        placeholder="Isi perihal surat (wajib untuk Surat Tugas)">
    </textarea>
</div>




                {{-- NOMOR SURAT TUGAS --}}
                <div class="form-group">
                    <label class="form-label">Nomor Surat Tugas</label>
                    <input type="text" name="nomor_surat_tugas" class="form-control form-control-lg" required>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-5">
                        Simpan Surat
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- CSS KHUSUS FORM --}}
<style>
.card-form {
    border: none;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0,0,0,.05);
}

.form-group {
    margin-bottom: 1.5rem;
}

.pegawai-row {
    display: flex;
    gap: .75rem;
    margin-bottom: .5rem;
}

.pegawai-row .btn-hapus {
    width: 44px;
    font-size: 20px;
    line-height: 1;
}

.form-label {
    font-weight: 600;
    margin-bottom: .4rem;
}
</style>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const jenis = document.getElementById('jenis_surat');
    const btnTambah = document.getElementById('btn-tambah-pegawai');
    const wrapper = document.getElementById('pegawai-wrapper');

    const pegawaiTemplate = `
        <div class="pegawai-row">
            <select name="pegawai_id[]" class="form-control form-control-lg" required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-danger btn-hapus">&times;</button>
        </div>
    `;

    jenis.addEventListener('change', function () {
        if (this.value === 'surat_tugas') {
            btnTambah.classList.remove('d-none');
        } else {
            btnTambah.classList.add('d-none');
            wrapper.innerHTML = wrapper.children[0].outerHTML;
        }
    });

    btnTambah.addEventListener('click', function () {
        wrapper.insertAdjacentHTML('beforeend', pegawaiTemplate);
    });

    wrapper.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-hapus')) {
            e.target.parentElement.remove();
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const jenis = document.getElementById('jenis_surat');
    const perihal = document.getElementById('perihal');
    const info = document.getElementById('perihal-info');

    function togglePerihal() {
        if (jenis.value === 'surat_tugas') {
            perihal.setAttribute('required', true);
            info.classList.remove('d-none');
        } else {
            perihal.removeAttribute('required');
            info.classList.add('d-none');
        }
    }

    jenis.addEventListener('change', togglePerihal);
    togglePerihal(); // run saat load
});

</script>
@endsection
