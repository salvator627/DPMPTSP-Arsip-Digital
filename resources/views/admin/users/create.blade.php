@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="mb-4 animate-fade">
        <h4 class="fw-semibold mb-1">Tambahkan Pengguna</h4>
        <small class="text-muted">
            Tambahkan akun pengguna baru ke sistem
        </small>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 col-xxl-9">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.users.store') }}"
                          method="POST"
                          novalidate>
                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Nama Lengkap</label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   placeholder="Nama lengkap pengguna"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-lg"
                                   placeholder="email@contoh.go.id"
                                   required>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-medium">Konfirmasi Password</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-5">
                            <label class="form-label fw-medium">Role Pengguna</label>
                            <select name="role"
                                    class="form-select form-select-lg"
                                    required>
                                <option value="">-- Pilih Role --</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex flex-wrap justify-content-end gap-2">
                          

                            <x-button type="submit" class="px-5">
                                Simpan
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

{{-- STYLE --}}
<style>
/* CARD */
.card-minimal {
    border: none;
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(0,0,0,.05);
}

/* FORM */
.form-control,
.form-select {
    border-radius: 14px;
}

.form-control:focus,
.form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 .15rem rgba(13,110,253,.15);
}

/* BUTTON SOFT */
.btn-soft-primary {
    background: #e3f2fd;
    color: #1565c0;
    border: none;
}

.btn-soft-primary:hover {
    background: #d0e7fb;
}

/* ANIMATION */
.animate-fade {
    animation: fadeUp .45s ease;
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
