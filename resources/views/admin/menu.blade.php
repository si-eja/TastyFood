@extends('admin.tempdash')
@section('content')
<style>
    .konten-wrapper {
        max-height: 380px;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    @media (max-width: 768px) {
        .img-wrapper {
            height: 100%;
        }
        .btn-wrapper {
            width: 100%;
        }
    }
</style>
<section class="bg-costume">
    <div class="container py-5">
        <form method="GET" class="d-flex gap-2 mb-3">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari menu"
                   value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </form>
        <button type="button"
                class="btn btn-success w-100"
                data-bs-toggle="modal"
                data-bs-target="#addModal">
            Tambah Menu
        </button>
        <hr>
        <div class="row g-2">
            <div class="col-lg-3 col-md-4 col-6">
                <div class="h-100 shadow-sm rounded d-flex position-relative ">
                    {{-- FOTO --}}
                    <img src="{{ asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}"
                        class="rounded-start object-fit-cover img-wrapper"
                        style="max-width:120px;"
                        alt="Menu">
                    <div class="p-2 flex-grow-1">
                        {{-- ISI --}}
                        <div class="mb-1">
                            <h6 class="fw-bold mb-1">Menu Nama</h6>
                            <p class="text-muted mb-0">Submenu</p>
                        </div>
                        {{-- BUTTON --}}
                        <div class="d-flex flex-wrap gap-1">
                            <button type="button"
                                class="border btn btn-outline-secondary btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#menuModal">
                                Details
                            </button>
                            <button type="button"
                                class="border btn btn-outline-info btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                Edit
                            </button>
                            <button type="button"
                                class="border btn btn-outline-danger btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#hapusModal">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="fw-bold mb-3 text-center">Edit Menu Baru</h5>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <div class="rounded shadow-sm border">
                                            <!-- PREVIEW GAMBAR -->
                                            <div class="bg-secondary rounded-top text-center">
                                                <img id="previewImage"
                                                    src=""
                                                    class="img-fluid d-none rounded-top"
                                                    style="max-height: 220px; object-fit: cover;">
                                                <i id="previewIcon" class="fa fa-image text-white fs-1 m-5"></i>
                                            </div>
                                            <div class="text-center text-muted py-2">
                                                Preview Gambar Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Nama Menu</label>
                                                <input type="text" class="form-control" placeholder="Masukkan nama menu">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Subjudul</label>
                                                <input type="text" class="form-control" placeholder="Masukkan subjudul menu">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Deskripsi</label>
                                                <textarea class="form-control" rows="4" placeholder="Masukkan deskripsi menu"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Gambar</label>
                                                <input type="file"
                                                    class="form-control"
                                                    id="imageInput"
                                                    accept="image/*">
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Simpan Menu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Hapus --}}
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">
                                    Yakin ingin menghapus menu
                                    <strong id="namaMenuHapus"></strong>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                {{-- buatkan validasi jika ada komentar maka tidak bisa dihapus --}}
                                <form id="formHapus" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Ya, Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Details --}}
        <div class="modal fade" id="menuModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-5">
                                <div class="konten-wrapper">
                                    <img src="{{ asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}"
                                        class="w-100 rounded mb-3 object-fit-cover" alt="" style="max-height: 280px">
                                    <h4 class="fw-bold">Nama Menu</h4>
                                    <p class="text-muted">Subjudul Menu</p>
                                    <p>
                                        Deskripsi lengkap tentang menu ini. Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit.
                                    </p>
                                </div>
                            </div>
                            <!-- KANAN : KOMENTAR -->
                            <div class="col-md-7">
                                <h5 class="fw-bold mb-3">Komentar</h5>
                                <div class="konten-wrapper pe-2">
                                    <!-- KOMENTAR ITEM -->
                                    <div class="rounded shadow-sm my-2 p-3 border">
                                        <span>
                                            <strong>Note:</strong> Makanannya enak dan lezat, pelayanan cepat
                                            dan ramah. Suasana restoran nyaman untuk bersantai.
                                        </span>

                                        <div class="d-flex justify-content-between border-top pt-2 mt-2 text-muted">
                                            <div>
                                                <strong>Menu:</strong> Spaghetti Bolognese
                                            </div>
                                            <div>
                                                <strong>Tanggal:</strong> 2024-06-15
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DUPLIKASI KOMENTAR -->
                                    <div class="rounded shadow-sm my-2 p-3 border">
                                        <span>
                                            <strong>Note:</strong> Porsi pas, rasa mantap, harga sesuai.
                                        </span>

                                        <div class="d-flex justify-content-between border-top pt-2 mt-2 text-muted">
                                            <div>
                                                <strong>Menu:</strong> Spaghetti Bolognese
                                            </div>
                                            <div>
                                                <strong>Tanggal:</strong> 2024-06-12
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Tambah --}}
        <div class="modal fade" id="addModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="fw-bold mb-3 text-center">Tambah Menu Baru</h5>
                        <div class="row g-2">
                            <div class="col-md-5">
                                <div class="rounded shadow-sm border">
                                    <!-- PREVIEW GAMBAR -->
                                    <div class="bg-secondary rounded-top text-center">
                                        <img id="previewImage"
                                            src=""
                                            class="img-fluid d-none rounded-top"
                                            style="max-height: 220px; object-fit: cover;">
                                        <i id="previewIcon" class="fa fa-image text-white fs-1 m-5"></i>
                                    </div>
                                    <div class="text-center text-muted py-2">
                                        Preview Gambar Menu
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Menu</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama menu">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Subjudul</label>
                                        <input type="text" class="form-control" placeholder="Masukkan subjudul menu">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi</label>
                                        <textarea class="form-control" rows="4" placeholder="Masukkan deskripsi menu"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Gambar</label>
                                        <input type="file"
                                            class="form-control"
                                            id="imageInput"
                                            accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Simpan Menu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection