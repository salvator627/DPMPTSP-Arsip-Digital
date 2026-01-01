<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
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
<div id="app" class="d-flex flex-column min-vh-100">

    <!-- ================= TOP NAVBAR ================= -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- LEFT -->
                <ul class="navbar-nav me-auto"></ul>

                <!-- RIGHT -->
                
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                               class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form"
                                      action="{{ route('logout') }}"
                                      method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- ================= END NAVBAR ================= -->

    <!-- ================= MAIN BODY ================= -->
    <div class="d-flex flex-grow-1">

        <!-- SIDEBAR (HANYA SAAT LOGIN) -->
        @auth
            @include('layouts.siderbar')
        @endauth

        <!-- CONTENT -->
        <main class="flex-grow-1 p-4 bg-light">
            @yield('content')
        </main>

    </div>
    <!-- ================= END MAIN BODY ================= -->

    <!-- ================= FOOTER ================= -->
    <footer class="app-footer mt-auto">
        <div class="container py-4">
            <div class="row">

                <!-- LEFT -->
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

                <!-- RIGHT -->
                <div class="col-md-6 text-md-end">
                    <h6 class="footer-title">Tentang Instansi</h6>
                    <p class="footer-text">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                        Kabupaten Ende.
                    </p>

                    <div class="footer-social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-globe"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- ================= END FOOTER ================= -->

</div>
</body>
</html>
