@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">

            <div class="card shadow-lg border-0 animate-fade">
                <div class="card-header bg-white fw-bold fs-5">
                    👤 Detail Pegawai
                </div>

                <div class="card-body px-4 py-4">

                    {{-- DATA PEGAWAI --}}
                    <h6 class="text-muted mb-3">Informasi Pegawai</h6>

                    <table class="table table-borderless">
                        <tr>
                            <th width="200">Nama</th>
                            <td>{{ $pegawai->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>{{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $pegawai->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Golongan</th>
                            <td>{{ $pegawai->golongan }}</td>
                        </tr>
                        <tr>
                            <th>Pangkat</th>
                            <td>{{ $pegawai->pangkat }}</td>
                        </tr>
                    </table>

                    <hr class="my-4">

                    {{-- DOKUMEN --}}
                    <h6 class="text-muted mb-3">Dokumen Pegawai</h6>

                    <div class="row">
                        @php
                            $documents = [
                                'sk' => 'SK',
                                'spmt' => 'SPMT',
                                'ijazah' => 'Ijazah',
                                'sk_cpns' => 'SK CPNS',
                                'drh' => 'DRH',
                                'akta_anak' => 'Akta Anak',
                                'karpeg' => 'Karpeg',
                                'kk' => 'Kartu Keluarga',
                                'ktp' => 'KTP',
                                'akta_kelahiran' => 'Akta Kelahiran',
                                'akta_nikah' => 'Akta Nikah',
                                'npwp' => 'NPWP',
                                'sk_jabatan' => 'SK Jabatan',
                                'skkp' => 'SKKP',
                                'skp' => 'SKP',
                                'taspen' => 'Kartu Taspen',
                                'transkrip' => 'Transkrip Nilai',
                            ];
                        @endphp

                        @foreach($documents as $field => $label)
                            <div class="col-md-4 mb-3">
                                <div class="border rounded p-3 h-100">
                                    <div class="fw-semibold mb-2">
                                        📄 {{ $label }}
                                    </div>

                                    @if($pegawai->$field)
                                        <a href="{{ asset('storage/' . $pegawai->$field) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           target="_blank"
                                           download>
                                            ⬇ Download
                                        </a>
                                    @else
                                        <span class="text-muted fst-italic">
                                            Tidak tersedia
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('pegawai.daftar') }}"
                           class="btn btn-outline-secondary px-4">
                            ← Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Animasi --}}
<style>
.animate-fade {
    animation: fadeIn 0.6s ease-in-out;
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
