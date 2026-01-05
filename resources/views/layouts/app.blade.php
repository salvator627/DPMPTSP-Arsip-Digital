<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Surat') }}</title>

    <!-- Font -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div id="app" class="app-wrapper">

    {{-- ================= NAVBAR ================= --}}
    @auth
    <nav class="app-navbar">
        <!-- LEFT -->
        <div class="navbar-left">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span class="page-title">
                @yield('page-title', 'Dashboard')
            </span>
        </div>

        <!-- RIGHT -->
        <div class="navbar-right">
            <div class="user-wrapper">
                <i class="bi bi-person-circle"></i>
                <span class="user-name">{{ Auth::user()->name }}</span>

                <div class="user-dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
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

/* LEFT */
.navbar-left {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #1f2937;
}

.navbar-left i {
    font-size: 18px;
    color: #2563eb;
}

.page-title {
    font-size: 16px;
    font-weight: 600;
}

/* RIGHT */
.navbar-right {
    display: flex;
    align-items: center;
}

/* USER */
.user-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    border-radius: 10px;
    cursor: pointer;
}

.user-wrapper:hover {
    background: #f3f4f6;
}

/* DROPDOWN */
.user-dropdown {
    position: absolute;
    right: 0;
    top: 52px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 14px 35px rgba(0,0,0,.12);
    padding: 6px;
    min-width: 160px;

    /* HIDDEN DEFAULT */
    opacity: 0;
    visibility: hidden;
    transform: translateY(6px);
    transition: all .25s ease;
    z-index: 2000;
}

/* SHOW ON HOVER */
.user-wrapper:hover .user-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* DROPDOWN ITEM */
.user-dropdown button {
    width: 100%;
    border: none;
    background: transparent;
    padding: 10px 12px;
    font-size: 13px;
    color: #374151;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background .2s ease, color .2s ease;
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
