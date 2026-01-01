@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4 animate-fade">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">📂 Daftar Template Surat</h4>
            <small class="text-muted">
                Kelola template surat resmi dalam format Word (.docx)
            </small>
        </div>

        <a href="{{ route('template-surat.create') }}"
           class="btn btn-primary btn-soft-primary">
            ➕ Tambah Template
        </a>
    </div>

    {{-- CARD TABLE --}}
    <div class="card card-minimal">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Template</th>
                            <th width="220" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($templates as $t)
                        <tr>
                            <td>
                                <div class="fw-semibold">
                                    {{ $t->nama_template }}
                                </div>
                                <small class="text-muted">
                                    File dokumen (.docx)
                                </small>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('template-surat.download', $t->id) }}"
                                   class="btn btn-sm btn-success me-1">
                                    ⬇ Download
                                </a>

                                <form action="{{ route('template-surat.destroy', $t->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus template ini?')">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">
                                Belum ada template surat
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

{{-- STYLE --}}
<style>
.card-minimal {
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,.05);
}

.table thead th {
    font-weight: 600;
    font-size: 14px;
}

.table tbody tr {
    transition: background .2s ease;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

/* BUTTON */
.btn-soft-primary {
    border-radius: 50px;
    padding: 10px 20px;
    font-weight: 500;
}

/* ANIMATION */
.animate-fade {
    animation: fadeUp .4s ease;
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
