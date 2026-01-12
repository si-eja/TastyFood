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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    {{-- Jumlah data menu --}}
                    <div class="col-md-4">
                        <div class="rounded bg-light shadow p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-bowl-rice fa-5x text-danger"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0">40</h3>
                                    <p class="mt-0">menu</p>
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
        {{-- Data Menu --}}
        <div class="mt-2">
            <div class="rounded p-3 bg-light shadow">
                <h4 class="fw-bold mb-3">Kilas Menu</h4>
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
                                        class="border btn btn-outline-secondary btn-sm btn-wrapper w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#menuModal">
                                        Details
                                    </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection