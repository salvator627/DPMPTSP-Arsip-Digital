<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Surat') }}</title>

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Footer CSS -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body>

<div id="app" class="app-wrapper">

    {{-- ================= NAVBAR ================= --}}
    @auth
    <nav class="app-navbar">
        <div class="navbar-left">
            <h6 class="page-title">
                @yield('page-title', 'Dashboard')
            </h6>
        </div>

        <div class="navbar-right">
            <div class="user-wrapper">
                <span class="user-name">
                    {{ Auth::user()->name }}
                </span>

                <div class="user-dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth
    {{-- ================= END NAVBAR ================= --}}

    {{-- ================= BODY ================= --}}
    <div class="app-main">

        {{-- SIDEBAR --}}
        @auth
            @include('layouts.siderbar')
        @endauth

        {{-- CONTENT --}}
        <main class="app-content">
            @yield('content')
        </main>

    </div>
    {{-- ================= END BODY ================= --}}

    {{-- ================= FOOTER ================= --}}
    <footer class="app-footer">
        <div class="container py-4">
            <div class="row">

                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="footer-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>
                            JL. Soekarno Hatta No. 2<br>
                            Ende, Nusa Tenggara Timur
                        </span>
                    </div>

                    <div class="footer-item">
                        <i class="bi bi-telephone"></i>
                        <span>+62 381 123456</span>
                    </div>

                    <div class="footer-item">
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:dpmptsp@endekab.go.id">
                            dpmptsp@endekab.go.id
                        </a>
                    </div>
                </div>

                <div class="col-md-6 text-md-end">
                    <h6 class="footer-title">Tentang Instansi</h6>
                    <p class="footer-text">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                        Kabupaten Ende.
                    </p>
                </div>

            </div>
        </div>
    </footer>
    {{-- ================= END FOOTER ================= --}}

</div>

</body>
</html>
<style>
    /* ================= APP STRUCTURE ================= */
.app-wrapper {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* ================= NAVBAR ================= */
.app-navbar {
    height: 64px;
    background: #ffffff;
    border-bottom: 1px solid #e5e7eb;
    padding: 0 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 1200;
}

.page-title {
    font-size: 16px;
    font-weight: 500;
    color: #1f2937;
}

/* USER */
.user-wrapper {
    position: relative;
}

.user-name {
    font-size: 14px;
    color: #374151;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
}

.user-wrapper:hover .user-name {
    background: #f3f4f6;
}

/* DROPDOWN */
.user-dropdown {
    position: absolute;
    right: 0;
    top: 44px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 12px 30px rgba(0,0,0,.08);
    padding: 8px;
    display: none;
    min-width: 140px;
}

.user-wrapper:hover .user-dropdown {
    display: block;
}

.user-dropdown button {
    width: 100%;
    border: none;
    background: transparent;
    padding: 10px 12px;
    text-align: left;
    font-size: 13px;
    color: #374151;
    border-radius: 8px;
}

.user-dropdown button:hover {
    background: #fee2e2;
    color: #dc2626;
}

/* ================= MAIN ================= */
.app-main {
    display: flex;
    flex: 1;
    background: #f4f6fb;
}

/* ================= CONTENT ================= */
.app-content {
    flex: 1;
    padding: 24px;
    overflow-x: hidden;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 992px) {
    .app-main {
        flex-direction: column;
    }
}

</style>