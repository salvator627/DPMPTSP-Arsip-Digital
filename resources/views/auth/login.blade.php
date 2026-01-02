@extends('layouts.app')

@section('content')
<div class="login-wrapper d-flex align-items-center justify-content-center">

    <div class="login-card animate-fade">

        {{-- HEADER --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo-ende.png') }}"
                 alt="Logo Kabupaten Ende"
                 class="login-logo mb-3">

            <h6 class="fw-bold text-danger mb-1">
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
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <div class="input-icon">
                    <span>📧</span>
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
            <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <div class="input-icon">
                    <span>🔒</span>
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
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-decoration-none small">
                        Lupa password?
                    </a>
                @endif
            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn btn-login w-100">
                 Masuk
            </button>
        </form>

    </div>
</div>

{{-- STYLE --}}
<style>
/* WRAPPER */
.login-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8f9fa, #eef2f7);
}

/* CARD */
.login-card {
    width: 100%;
    max-width: 520px; /* ⬅️ LEBIH BESAR */
    background: #fff;
    border-radius: 20px;
    padding: 44px; /* ⬅️ LEBIH LEGA */
    box-shadow: 0 22px 50px rgba(0,0,0,.08);
}

/* LOGO */
.login-logo {
    width: 140px; /* ⬅️ LEBIH BESAR */
}

/* HEADER TEXT */
.login-card h6 {
    font-size: 15px;
    letter-spacing: .6px;
    line-height: 1.5;
}

.login-card small {
    font-size: 13px;
    letter-spacing: .8px;
}

/* INPUT ICON */
.input-icon {
    position: relative;
}

.input-icon span {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    opacity: .6;
    font-size: 15px;
}

.input-icon input {
    padding-left: 48px;
    height: 46px;
    border-radius: 14px;
}

/* BUTTON */
.btn-login {
    background: #dc3545;
    color: #fff;
    padding: 14px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 15px;
    transition: all .25s ease;
}

.btn-login:hover {
    background: #bb2d3b;
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(220,53,69,.3);
}

/* ANIMATION */
.animate-fade {
    animation: fadeUp .6s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@endsection
