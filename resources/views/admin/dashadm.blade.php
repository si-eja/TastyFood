@extends('admin.tempdash')
@section('content')
<style>
    .thumb-wrapper {
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 10px;
    }

    .thumb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .3s ease;
    }

    .thumb-wrapper:hover .thumb-img {
        transform: scale(1.05);
    }

    .thumb-wrapper {
        border-radius: 12px;
        overflow: hidden;
    }   
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        {{-- Data Crud --}}
        <div class="row">
            <div class="col-md-7">
                <div class="row g-2">
                    {{-- Jumlah data berita --}}
                    <div class="col-md-6">
                        <div class="rounded bg-light shadow p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-newspaper fa-5x text-primary"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0">34</h3>
                                    <p class="mt-0">Berita</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Jumlah data galeri --}}
                    <div class="col-md-6">
                        <div class="rounded bg-light shadow p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-image fa-5x text-success"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0">120</h3>
                                    <p class="mt-0">Galeri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Data berita --}}
                <div class="mt-2">
                    <div class="rounded bg-light shadow py-2 h-100" style="max-height: 260px;">
                        <h4 class="fw-bold px-2">Kilas Berita</h4>
                        <div style="overflow-y: scroll; height: 200px; padding: 0 10px;">
                            {{-- Isi data berita --}}
                            <div class="card shadow-sm mb-2">
                                <div class="row g-0 align-items-stretch">
                                    <div class="col-md-3">
                                        <img 
                                            src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" 
                                            class="img-fluid h-100 w-100 rounded-start object-fit-cover"
                                            alt="Gambar Berita"
                                            style="max-height: 150px; max-width: 100%;"
                                        >
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body h-100 d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column justify-content-start align-items-start">
                                                <div>
                                                    <h5 class="card-title mb-1">
                                                        Judul Berita Dummy yang Jelas dan Informatif
                                                    </h5>
                                                    <small class="text-muted">
                                                        27 Desember 2025
                                                    </small>
                                                </div>
                                                <a href="#" class="text-decoration-none text-warning">Baca selengkapnya →</a>
                                            </div>
                                            <div class="text-muted d-flex align-items-center gap-1">
                                                <i class="fa-solid fa-user"></i>
                                                <small>Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Data kontak --}}
            <div class="col-md-5">
                <div class="rounded bg-light shadow p-3" style="height: 100%;">
                    <h4 class="fw-bold mb-3">Pesan Masuk</h4>
                    <div style="overflow-y: scroll; height: 295px; padding-right: 10px;">
                        <button     
                            class="btn w-100 text-start py-1 border-top border-bottom bg-transparent"
                            data-bs-toggle="modal"
                            data-bs-target="#modalPesan">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">Pengirim-1</h5>
                                    <small class="text-muted">email@gmail.com</small>
                                </div>
                                <span class="badge bg-secondary">
                                    Belum Dibaca
                                </span>
                            </div>
                        </button>

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
                    </div>
                </div>
            </div>
        </div>
        {{-- Data galeri --}}
        <div class="mt-2">
            <div class="rounded p-2 bg-light shadow">
                <h4 class="fw-bold mb-3">Kilas Galeri</h4>
                <hr>
                <div style="overflow-y: scroll; overflow-x: hidden; height: 400px;">
                    <div class="row flex-wrap g-3">
                        <div class="col-6 col-md-3">
                            <div class="thumb-wrapper">
                                <img src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" class="thumb-img">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="thumb-wrapper">
                                <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" class="thumb-img">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="thumb-wrapper">
                                <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="thumb-img">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="thumb-wrapper">
                                <img src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" class="thumb-img">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="thumb-wrapper">
                                <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="thumb-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="rounded p-3 bg-light shadow"></div>
        </div>
    </div>
</section>
@endsection