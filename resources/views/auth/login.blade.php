@extends('layouts.app')

@section('content')
<div class="login-wrapper d-flex align-items-center justify-content-center">

    <div class="login-card animate-fade">

        {{-- HEADER --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo-ende.png') }}"
                 alt="Logo Kabupaten Ende"
                 class="login-logo mb-3">

            <h6 class="fw-semibold text-dark mb-1">
                DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU
            </h6>
            <small class="text-muted">
                KABUPATEN ENDE
            </small>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- EMAIL --}}
            <div class="mb-3">
                <label class="form-label small">Email</label>
                <div class="input-icon">
                    <i class="bi bi-envelope"></i>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="email@contoh.com"
                           value="{{ old('email') }}"
                           required autofocus>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="mb-3">
                <label class="form-label small">Password</label>
                <div class="input-icon">
                    <i class="bi bi-lock"></i>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="••••••••"
                           required>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- REMEMBER --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check small">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember">
                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="small text-decoration-none">
                        Lupa password?
                    </a>
                @endif
            </div>

            {{-- BUTTON --}}
            <x-button type="submit" class="btn btn-login w-100 mb-3">
                Masuk
            </x-button>

            {{-- REGISTER LINK --}}
            
        </form>

    </div>
</div>

<style>
/* WRAPPER */
.login-wrapper {
    min-height: 100vh;
    background: #f4f6fb; /* SAMA DENGAN DASHBOARD */
}

/* CARD */
.login-card {
    width: 100%;
    max-width: 520px;
    background: #ffffff;
    border-radius: 18px;
    padding: 44px;
    box-shadow: 0 18px 45px rgba(0,0,0,.08);
}

/* LOGO */
.login-logo {
    width: 130px;
}

/* INPUT ICON */
.input-icon {
    position: relative;
}

.input-icon i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 16px;
}

.input-icon input {
    padding-left: 46px;
    height: 46px;
    border-radius: 12px;
}

/* BUTTON */
.btn-login {
    background: #2563eb;
    color: #fff;
    padding: 14px;
    border-radius: 12px;
    font-weight: 600;
    transition: all .25s ease;
}

.btn-login:hover {
    background: #1d4ed8;
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(37,99,235,.3);
}

/* ANIMATION */
.animate-fade {
    animation: fadeUp .5s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
