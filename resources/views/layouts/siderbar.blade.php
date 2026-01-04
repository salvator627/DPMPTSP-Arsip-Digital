<div class="sidebar-modern">

    {{-- HEADER --}}
    <div class="sidebar-header">
        <img src="{{ asset('images/logo-ende.png') }}" alt="Logo">
        <div>
            <div class="sidebar-title">
                DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU
            </div>
            <small>Kabupaten Ende</small>
        </div>
    </div>

    {{-- MENU --}}
    <ul class="sidebar-menu">

        {{-- DASHBOARD --}}
        <li>
            <a href="{{ route('home') }}"
               class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        {{-- ARSIP SURAT --}}
        <li class="menu-section">ARSIP SURAT</li>

        <li>
            <a href="{{ route('surat-masuk.create') }}"
               class="menu-item {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}">
                Surat Masuk
            </a>
        </li>

        <li>
            <a href="{{ route('surat-keluar.create') }}"
               class="menu-item {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}">
                Surat Keluar
            </a>
        </li>

        {{-- PEGAWAI --}}
        <li class="menu-section">PEGAWAI</li>

        <li>
            <a href="{{ route('pegawai.index') }}"
               class="menu-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                Tambah Pegawai
            </a>
        </li>

        <li>
            <a href="{{ route('pegawai.daftar') }}"
               class="menu-item {{ request()->routeIs('pegawai.daftar') ? 'active' : '' }}">
                Daftar Pegawai
            </a>
        </li>

        {{-- SURAT TUGAS --}}
        <li class="menu-section">SURAT TUGAS</li>

        <li>
            <a href="{{ route('home') }}"
               class="menu-item">
                Surat Tugas & SPPD
            </a>
        </li>

        {{-- TEMPLATE --}}
        <li class="menu-section">TEMPLATE</li>

        <li>
            <a href="{{ route('template-surat.index') }}"
               class="menu-item {{ request()->routeIs('template-surat.*') ? 'active' : '' }}">
                Template Surat
            </a>
        </li>

    </ul>

</div>

<style>
/* ===============================
   SIDEBAR BASE
================================ */
.sidebar-modern {
    width: 280px;
    min-width: 280px;
    padding: 22px;
    flex-shrink: 0;
    color: #fff;
    background: linear-gradient(
        180deg,
        #2563eb 0%,
        #1e40af 55%,
        #1e3a8a 100%
    );
}

/* ===============================
   HEADER
================================ */
.sidebar-header {
    display: flex;
    gap: 14px;
    margin-bottom: 32px;
}

.sidebar-header img {
    width: 54px;
    object-fit: contain;
}

.sidebar-title {
    font-size: 12px;
    font-weight: 700;
    line-height: 1.4;
}

.sidebar-header small {
    font-size: 11px;
    opacity: .85;
}

/* ===============================
   MENU
================================ */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* SECTION LABEL */
.menu-section {
    margin: 22px 12px 10px;
    font-size: 11px;
    letter-spacing: 1px;
    opacity: .6;
}

/* MENU ITEM */
.menu-item {
    display: block;
    padding: 10px 14px;
    margin-bottom: 6px;
    font-size: 14px;
    color: rgba(255,255,255,.88);
    text-decoration: none;
    border-radius: 12px;
    transition:
        background .25s ease,
        transform .25s ease,
        color .25s ease;
}

/* HOVER */
.menu-item:hover {
    background: rgba(255,255,255,.18);
    color: #fff;
    transform: translateX(6px);
}

/* ACTIVE */
.menu-item.active {
    background: rgba(255,255,255,.28);
    color: #fff;
}
</style>
