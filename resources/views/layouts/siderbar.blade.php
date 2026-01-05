<div class="sidebar-modern">

    {{-- HEADER DASHBOARD (CLICKABLE) --}}
    <a href="{{ route('home') }}" class="sidebar-top">
        <div class="dashboard-icon">
            <i class="bi bi-house-door"></i>
        </div>
        <div class="dashboard-text">DASHBOARD</div>
    </a>

    {{-- DIVIDER --}}
    <div class="sidebar-divider"></div>

    {{-- MENU --}}
    <ul class="sidebar-menu">

        {{-- ARSIP SURAT --}}
        <li class="menu-section">ARSIP SURAT</li>

        <li>
            <a href="{{ route('surat-masuk.create') }}"
               class="menu-item {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i>
                <span>Surat Masuk</span>
            </a>
        </li>

        <li>
            <a href="{{ route('surat-keluar.create') }}"
               class="menu-item {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}">
                <i class="bi bi-envelope-paper"></i>
                <span>Surat Keluar</span>
            </a>
        </li>

        {{-- PEGAWAI --}}
        <li class="menu-section">PEGAWAI</li>

        <li>
            <a href="{{ route('pegawai.index') }}"
               class="menu-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                <i class="bi bi-person-plus"></i>
                <span>Tambah Pegawai</span>
            </a>
        </li>

        <li>
            <a href="{{ route('pegawai.daftar') }}"
               class="menu-item {{ request()->routeIs('pegawai.daftar') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Daftar Pegawai</span>
            </a>
        </li>

        {{-- SURAT TUGAS --}}
        <li class="menu-section">SURAT TUGAS</li>

        <li>
            <a href="{{ route('home') }}"
               class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i>
                <span>Surat Tugas &amp; SPPD</span>
            </a>
        </li>

        {{-- LAINNYA --}}
        <li class="menu-section">LAINNYA</li>

        <li>
            <a href="{{ route('template-surat.index') }}"
               class="menu-item {{ request()->routeIs('template-surat.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span>Template Surat</span>
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
    background: linear-gradient(
        180deg,
        #2563eb 0%,
        #1e40af 60%,
        #1e3a8a 100%
    );
}

/* ===============================
   DASHBOARD HEADER (CLICKABLE)
================================ */
.sidebar-top {
    display: block;
    text-align: center;
    margin-bottom: 16px;
    text-decoration: none;
}

.dashboard-icon {
    width: 56px;
    height: 56px;
    margin: auto;
    border-radius: 16px;
    background: rgba(255,255,255,.15);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s ease;
}

.dashboard-icon i {
    font-size: 26px;
    color: #d1d5db;
}

.dashboard-text {
    margin-top: 10px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #e5e7eb;
    transition: color .25s ease;
}

/* HOVER HEADER */
.sidebar-top:hover .dashboard-icon {
    background: rgba(255,255,255,.25);
    transform: translateY(-2px);
}

.sidebar-top:hover .dashboard-icon i {
    color: #ffffff;
}

.sidebar-top:hover .dashboard-text {
    color: #ffffff;
}

/* ===============================
   DIVIDER
================================ */
.sidebar-divider {
    height: 1px;
    background: rgba(255,255,255,.18);
    margin: 18px 0 22px;
}

/* ===============================
   MENU
================================ */
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-section {
    margin: 22px 12px 10px;
    font-size: 11px;
    letter-spacing: 1px;
    color: rgba(255,255,255,.6);
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    margin-bottom: 6px;
    font-size: 14px;
    text-decoration: none;
    border-radius: 12px;
    color: rgba(255,255,255,.85);
    transition: background .25s ease, transform .25s ease;
}

.menu-item i {
    font-size: 16px;
    color: #d1d5db;
}

.menu-item:hover {
    background: rgba(255,255,255,.18);
    transform: translateX(6px);
}

.menu-item.active {
    background: rgba(255,255,255,.3);
}

.menu-item.active i {
    color: #ffffff;
}
</style>
