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
        <div class="col-12 col-xl-8">

            <div class="card card-minimal animate-fade">
                <div class="card-body p-4 p-md-5">

                    @if(session('success'))
                        <div class="alert alert-success rounded-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Nama Lengkap</label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-lg"
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

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <x-button type="submit" class="px-5">
                                Simpan Pengguna
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
