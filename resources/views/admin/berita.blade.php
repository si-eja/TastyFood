@extends('admin.tempdash')
@section('content')
<style>
    /* Berita */
    .berita-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        height: 100%;
    }
    .berita-card img {
        width: 100%;
        object-fit: cover;
    }
    .berita-card .isi {
        padding: 20px;
    }
    .berita-card a {
        color: orange;
        font-size: 14px;
        text-decoration: none;
    }
    /* berita mini */
    .berita-card:not(.berita-besar) img {
        height: 200px;
        object-fit: cover;
    }
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        <div class="d-flex flex-wrap gap-2 mb-3 align-items-center">
            {{-- SEARCH BERITA --}}
            <div class="input-group">
                <span class="input-group-text bg-white">
                    <i class="fa fa-search text-muted"></i>
                </span>
                <input 
                    type="text"
                    class="form-control"
                    placeholder="Cari judul berita...">
            </div>
            {{-- TAMBAH BERITA --}}
            <button 
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalTambahBerita">
                <i class="fa fa-plus"></i>
                <span class="d-none d-md-inline">Tambah Berita</span>
            </button>
            <!-- MODAL TAMBAH BERITA -->
            <div class="modal fade" id="modalTambahBerita" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Tambah Berita</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- PREVIEW GAMBAR -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Gambar Berita</label>
                                <div 
                                    id="previewBox"
                                    class="border rounded d-flex align-items-center justify-content-center bg-light"
                                    style="height:220px; overflow:hidden;">
                                    <span class="text-muted">Preview gambar</span>
                                </div>
                            </div>
                            <!-- JUDUL -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Berita</label>
                                <input type="text" class="form-control" placeholder="Masukkan judul berita">
                            </div>
                            <!-- ISI -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Isi Berita</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis isi berita..."></textarea>
                            </div>
                            <!-- GAMBAR -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Gambar</label>
                                <input 
                                    type="file"
                                    class="form-control"
                                    accept="image/*"
                                    id="inputGambar">
                            </div>
                            <!-- TANGGAL -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input 
                                    type="date"
                                    class="form-control"
                                    id="tanggalBerita"
                                    readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button class="btn btn-primary">
                                Simpan Berita
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Daftar Berita --}}
        <div class="row flex-wrap g-3">
            <div class="col-md-3">
                <div class="berita-card h-100">
                    <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="">
                    <div class="isi">
                        <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                        <p class="text-muted small mb-1">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('Adetberita') }}">Baca selengkapnya →</a>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button 
                                            class="dropdown-item bg-info text-white rounded my-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditBerita"
                                            data-id="1"
                                            data-judul="Lorem Ipsum"
                                            data-isi="Lorem ipsum dolor sit amet consectetur."
                                            data-gambar="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}"
                                            data-tanggal="2025-01-01">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button 
                                            class="dropdown-item bg-danger text-white rounded my-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalHapusBerita"
                                            data-id="1">
                                            Hapus
                                        </button>
                                    </li>
                                </ul>  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL HAPUS BERITA -->
                <div class="modal fade" id="modalHapusBerita" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger fw-bold">
                                    <i class="fa fa-triangle-exclamation"></i> Konfirmasi Hapus
                                </h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-1">
                                    Apakah kamu yakin ingin menghapus berita ini?
                                </p>
                                <small class="text-muted">
                                    Tindakan ini tidak dapat dibatalkan.
                                </small>
                                <!-- hidden id (siap logic) -->
                                <input type="hidden" id="hapus_id">
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
                <!-- MODAL EDIT BERITA -->
                <div class="modal fade" id="modalEditBerita" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Edit Berita</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <!-- hidden id (siap logic) -->
                                <input type="hidden" id="edit_id">
                                <!-- PREVIEW GAMBAR -->
                                <div class="mb-3">
                                    <div 
                                        id="editPreviewBox"
                                        class="border rounded d-flex align-items-center justify-content-center bg-light"
                                        style="height:220px; overflow:hidden;">
                                        <span class="text-muted">Preview gambar</span>
                                    </div>
                                </div>
                                <!-- JUDUL -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Judul Berita</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        id="edit_judul">
                                </div>
                                <!-- ISI -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Isi Berita</label>
                                    <textarea 
                                        class="form-control"
                                        rows="5"
                                        id="edit_isi"></textarea>
                                </div>
                                <!-- GAMBAR -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Ganti Gambar</label>
                                    <input 
                                        type="file"
                                        class="form-control"
                                        accept="image/*"
                                        id="edit_gambar">
                                </div>
                                <!-- TANGGAL -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input 
                                        type="date"
                                        class="form-control"
                                        id="edit_tanggal"
                                        readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // SET TANGGAL HARI INI (readonly)
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggalBerita').value = today;
    });
    // PREVIEW GAMBAR
    document.getElementById('inputGambar').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const previewBox = document.getElementById('previewBox');
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (event) {
            previewBox.innerHTML = `
                <img 
                    src="${event.target.result}" 
                    class="w-100 h-100"
                    style="object-fit:cover;">
            `;
        };
        reader.readAsDataURL(file);
    });
    // MODAL EDIT
    const modalEdit = document.getElementById('modalEditBerita');
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        document.getElementById('edit_id').value = btn.dataset.id;
        document.getElementById('edit_judul').value = btn.dataset.judul;
        document.getElementById('edit_isi').value = btn.dataset.isi;
        document.getElementById('edit_tanggal').value = btn.dataset.tanggal;

        document.getElementById('editPreviewBox').innerHTML = `
            <img src="${btn.dataset.gambar}" class="w-100 h-100" style="object-fit:cover;">
        `;
    });
    // PREVIEW GAMBAR EDIT
    document.getElementById('edit_gambar').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('editPreviewBox').innerHTML = `
                <img src="${e.target.result}" class="w-100 h-100" style="object-fit:cover;">
            `;
        };
        reader.readAsDataURL(file);
    });
    // MODAL HAPUS
    const modalHapus = document.getElementById('modalHapusBerita');
    modalHapus.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        document.getElementById('hapus_id').value = btn.dataset.id;
    });
</script>
@endsection