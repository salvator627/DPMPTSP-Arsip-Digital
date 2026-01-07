@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-4 dashboard-bg">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h2 class="fw-semibold mb-1">
            Selamat datang, {{ Auth::user()->name }}
        </h2>
        <p class="text-muted mb-0">
            Berikut ringkasan pengelolaan data dan surat DPMPTSP Kabupaten Ende
        </p>
    </div>

    {{-- STATISTIC CARDS --}}
    <div class="row g-4 mb-4">

        {{-- SURAT MASUK --}}
        <div class="col-md-6">
            <div class="card stat-card-minimal">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge-soft success">Surat Masuk</span>
                        <span class="icon-soft success">📥</span>
                    </div>

                    <h2 class="fw-bold mb-0">{{ $totalSuratMasuk }}</h2>
                    <small class="text-muted">Total data tersimpan</small>
                </div>
            </div>
        </div>

        {{-- SURAT KELUAR --}}
        <div class="col-md-6">
            <div class="card stat-card-minimal">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge-soft primary">Surat Keluar</span>
                        <span class="icon-soft primary">📤</span>
                    </div>

                    <h2 class="fw-bold mb-0">{{ $totalSuratKeluar }}</h2>
                    <small class="text-muted">Total data tersimpan</small>
                </div>
            </div>
        </div>

        {{-- TOTAL PEGAWAI (UKURAN SAMA) --}}
        <div class="col-md-6">
            <div class="card stat-card-minimal">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge-soft secondary">Pegawai</span>
                        <span class="icon-soft secondary">👥</span>
                    </div>

                    <h2 class="fw-bold mb-0">{{ $totalPegawai }}</h2>
                    <small class="text-muted">Total pegawai terdaftar</small>
                </div>
            </div>
        </div>

    </div>

    {{-- QUICK ACCESS --}}
    <div class="card card-minimal animate-fade">
        <div class="card-body">
            <h6 class="fw-semibold mb-3">Quick Access</h6>

            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('surat-masuk.daftar') }}" class="btn btn-soft gray">
                    Daftar Surat Masuk
                </a>

                <a href="{{ route('surat-keluar.daftar') }}" class="btn btn-soft gray">
                    Daftar Surat Keluar
                </a>

                <a href="{{ route('pegawai.daftar') }}" class="btn btn-soft gray">
                    Daftar Pegawai
                </a>
            </div>
        </div>
    </div>

</div>

{{-- STYLE --}}
<style>
.dashboard-bg {
    background: #f7f8fa;
    min-height: 100vh;
}

/* CARD */
.card-minimal,
.stat-card-minimal {
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,.04);
    transition: all .25s ease;
}

.stat-card-minimal:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 32px rgba(0,0,0,.06);
}

/* BADGE */
.badge-soft {
    padding: 6px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 500;
}

.badge-soft.success {
    background: #e8f5e9;
    color: #2e7d32;
}

.badge-soft.primary {
    background: #e3f2fd;
    color: #1565c0;
}

.badge-soft.secondary {
    background: #ede7f6;
    color: #5e35b1;
}

/* ICON */
.icon-soft {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-soft.success { background: #e8f5e9; }
.icon-soft.primary { background: #e3f2fd; }
.icon-soft.secondary { background: #ede7f6; }

/* BUTTON */
.btn-soft {
    border-radius: 50px;
    padding: 10px 22px;
    font-weight: 500;
    border: 1px solid #dee2e6;
    transition: all .2s ease;
}

.btn-soft.gray {
    background: #f1f3f5;
    color: #343a40;
}

.btn-soft.gray:hover {
    background: #e9ecef;
    transform: translateY(-1px);
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
