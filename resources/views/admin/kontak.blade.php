@extends('admin.tempdash')
@section('content')
<section class="container-fluid bg-light" style="min-height: 100vh;">
    <div class="container py-5">
        <div class="d-flex flex-wrap gap-2 mb-3">
            {{-- SEARCH --}}
            <div class="input-group flex-grow-1">
                <span class="input-group-text bg-white">
                    <i class="fa fa-search text-muted"></i>
                </span>
                <input 
                    type="text" 
                    class="form-control"
                    placeholder="Cari nama atau email...">
            </div>
            {{-- BUTTON DIBACA --}}
            <button class="btn btn-success">
                <i class="fa fa-check"></i>
                <span class="d-none d-md-inline">Tandai Dibaca</span>
            </button>
            {{-- BUTTON HAPUS --}}
            <button class="btn btn-danger">
                <i class="fa fa-trash"></i>
                <span class="d-none d-md-inline">Hapus</span>
            </button>
        </div>
        {{-- CARD PESAN --}}
        <div class="card shadow-sm mb-3">
            <div class="card-body d-flex align-items-center gap-3">
                {{-- CHECKBOX --}}
                <input 
                    type="checkbox"
                    class="form-check-input mt-0 p-2 border-secondary">
                {{-- PESAN (CLICKABLE) --}}
                <button 
                    class="btn flex-grow-1 text-start p-0 border-0 bg-transparent"
                    data-bs-toggle="modal"
                    data-bs-target="#modalPesan">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1">Pengirim-1</h5>
                            <small class="text-muted">email@gmail.com</small>
                        </div>
                        {{-- STATUS --}}
                        <span class="badge bg-secondary align-items-center">
                            Belum Dibaca
                        </span>
                    </div>
                </button>
                {{-- HAPUS --}}
                <button 
                    class="btn btn-danger btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalHapusPesan">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</section>
{{-- MODAL PESAN --}}
<div class="modal fade" id="modalPesan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pesan dari Pengirim-1</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>
                    Ini adalah contoh isi pesan.<br>
                    Digunakan hanya untuk dummy tampilan admin panel.
                </p>
                <small class="text-muted">email@gmail.com</small>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- MODAL HAPUS PESAN --}}
<div class="modal fade" id="modalHapusPesan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="fa fa-triangle-exclamation"></i> Konfirmasi Hapus
                </h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah kamu yakin ingin menghapus pesan ini?
                </p>
                <small class="text-muted">
                    Tindakan ini tidak dapat dibatalkan.
                </small>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button class="btn btn-danger">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>
@endsection