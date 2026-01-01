<!-- Sidebar -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">


<div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-white border-end"
     style="width: 280px; min-height: 100vh;">


    <!-- Logo / Header -->
    <div class="mb-4 d-flex align-items-center">
        <img src="{{ asset('images/logo-ende.png') }}"
             alt="Logo Kabupaten Ende"
             style="width: 55px;"
             class="me-3">

        <div class="lh-sm">
            <h6 class="fw-bold text-danger mb-1">
                DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU
            </h6>
            <small class="text-muted">
                Kabupaten Ende
            </small>
        </div>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">

        <!-- ARSIP SURAT -->
<li class="nav-item mt-3">
    <a class="nav-link text-dark d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#menuArsipSurat"
       role="button">
        ARSIP SURAT
        <span>▾</span>
    </a>

    <div class="collapse show" id="menuArsipSurat">
        <ul class="nav flex-column ms-3">
            <li class="nav-item">
                <a href="{{ route('surat-masuk.create') }}"
                   class="nav-link text-dark sidebar-hover">
                    • Surat Masuk
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('surat-keluar.create') }}"
                   class="nav-link text-dark sidebar-hover">
                    • Surat Keluar
                </a>
            </li>
        </ul>
    </div>
</li>


        <!-- PENGGUNA -->
     
<li class="nav-item mt-3">
    <a class="nav-link text-dark d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#menuPengguna"
       role="button">
        PEGAWAI
        <span>▾</span>
    </a>

    <div class="collapse {{ request()->routeIs('jabatan.*','pengguna.*') ? 'show' : '' }}"
         id="menuPengguna">
        <ul class="nav flex-column ms-3">
            <li class="nav-item">
                <a href="{{ route('pegawai.index') }}"
                    class="nav-link sidebar-hover text-dark">
                     • Tambah Pegawai
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('pegawai.daftar') }}" class="nav-link sidebar-hover">
                 • Daftar Pegawai
                </a>
            </li>
        </ul>
    </div>
</li>
<!-- SURAT TUGAS (Dropdown Parent) -->
<li class="nav-item mt-3">
    <a class="nav-link text-dark d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#menuSuratTugas"
       role="button">
        SURAT TUGAS
        <span>▾</span>
    </a>

    <div class="collapse" id="menuSuratTugas">
        <ul class="nav flex-column ms-3">
            <li class="nav-item">
                <a href="{{ route('home') }}"
                   class="nav-link text-dark sidebar-hover">
                    • Surat Tugas dan SPPD
                </a>
            </li>
        </ul>
    </div>
</li>
<!-- TEMPLATE SURAT (Dropdown Parent) -->
<li class="nav-item mt-3">
    <a class="nav-link text-dark d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#menuTemplateSurat"
       role="button">
        TEMPLATE SURAT
        <span>▾</span>
    </a>

    <div class="collapse" id="menuTemplateSurat">
        <ul class="nav flex-column ms-3">
            <li class="nav-item">
                <a href="{{ route('template-surat.index') }}"
                    class="nav-link text-dark sidebar-hover">
                        • Template Surat Dinas
                </a>
            </li>
        </ul>
    </div>
</li>


</ul>
</div>
