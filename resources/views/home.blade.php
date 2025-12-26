@extends('template')
@section('content')
<style> 
    /* KONTEN UTAMA */
    .konten-utama {
        position: relative;
        min-height: 90vh;
        overflow: hidden;
    }
    .konten-text {
        padding-top: 120px;
    }
    /* GAMBAR KANAN ATAS */
    .gambar-utama {
        position: absolute;
        top: -160px;
        right: -150px;
        width: 800px;
        height: 800px;
        object-fit: cover;
        border-radius: 50%;
        background: transparent !important;
    }
    /* RESPONSIVE */
    @media (max-width: 768px) {
        .gambar-utama {
            position: relative;
            width: 100%;
            height: auto;
            right: 0;
            top: 0;
            margin-top: 40px;
        }
        .konten-text {
            padding-top: 60px;
        }
    }
    /* gambar makanan */
    .menu-section {
        background-image: url('{{ asset("ASET/Group 70.png") }}');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
    }
    .menu-card {
        background: #fff;
        border-radius: 20px;
        padding: 80px 20px 30px; /* penting: ruang buat gambar bulat */
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        position: relative;
        height: 100%;
    }
    .menu-card img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        position: absolute;
        top: -90px;
        left: 50%;
        transform: translateX(-50%);
    }
    /* ===== MENU HOVER EFFECT ===== */
    .menu-card {
        transition: all 0.3s ease;
    }
    .menu-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.2);
    }
    .menu-card img {
        transition: transform 0.3s ease;
    }
    .menu-card:hover img {
        transform: translateX(-50%) scale(1.05);
    }
    /* ===== BERITA ===== */
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
    /* berita new */
    .berita-besar {
        display: flex;
        flex-direction: column;
    }
    .berita-besar img {
        height: 350px;
        object-fit: cover;
    }
    /* berita mini */
    .berita-card:not(.berita-besar) img {
        height: 200px;
        object-fit: cover;
    }
    /* ===== GALERI ===== */
    .galeri-item {
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        height: 250px; /* 🔥 KUNCI UTAMA */
    }
    .galeri-item img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* 🔥 biar rapi */
        transition: transform 0.4s ease;
    }
    .galeri-item:hover img {
        transform: scale(1.08);
    }
    .h-img{
        height: 320px;
    }
</style>
{{-- kontent --}}
<section class="konten-utama" style="background-color: #f0f0f0;">
    {{-- Teks --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 konten-text">
                <hr style="width:100px; border:3px solid #000000;">
                <h1 class="text-uppercase mt-4">Healthy</h1>
                <h1 class="fw-bolder">TASTY FOOD</h1>
                <p class="text-muted mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu,
                    eget consectetur ex sem eget lacus.
                </p>
                <a href="#tentang" class="btn btn-dark px-5 py-3 mt-3">
                    TENTANG KAMI
                </a>
            </div>
        </div>
    </div>
    {{-- Gambar --}}
    <img src="{{ asset('ASET/img-4-2000x2000.png') }}"
         alt="Tasty Food"
         class="gambar-utama">
</section>
{{-- Tentang --}}
<section id="tentang" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold">TENTANG KAMI</h2>
        <p class="text-muted mt-4 mx-auto" style="max-width:700px;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu,
            eget consectetur ex sem eget lacus.
        </p>
        <hr class="mx-auto mt-4" style="width:60px; border:2px solid #000;">
    </div>
</section>
{{-- Makanan --}}
<section class="menu-section">
    <div class="container">
        <div class="row g-4 justify-content-center pt-5">
            {{-- CARD 1 --}}
            <div class="col-md-3">
                <div class="menu-card">
                    <img src="{{ asset('ASET/img-1.png') }}" alt="">
                    <h4 class="fw-bolder mt-5">LOREM IPSUM</h4>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            {{-- CARD 2 --}}
            <div class="col-md-3">
                <div class="menu-card">
                    <img src="{{ asset('ASET/img-2.png') }}" alt="">
                    <h4 class="fw-bolder mt-5">LOREM IPSUM</h4>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            {{-- CARD 3 --}}
            <div class="col-md-3">
                <div class="menu-card">
                    <img src="{{ asset('ASET/img-3.png') }}" alt="">
                    <h4 class="fw-bolder mt-5">LOREM IPSUM</h4>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            {{-- CARD 4 --}}
            <div class="col-md-3">
                <div class="menu-card">
                    <img src="{{ asset('ASET/img-4.png') }}" alt="">
                    <h4 class="fw-bolder mt-5">LOREM IPSUM</h4>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Berita Kami --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Berita Kami</h2>
        <div class="row g-4">
            {{-- BERITA BESAR --}}
            <div class="col-lg-6">
                <div class="berita-card berita-besar h-100">
                    <img src="{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="">
                    <div class="isi">
                        <h5 class="fw-bold">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </h5>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus ornare augue eu rutrum commodo.
                        </p>
                        <a href="#">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>
            {{-- BERITA KECIL --}}
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="berita-card h-100">
                            <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="">
                            <div class="isi">
                                <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                                <p class="text-muted small mb-1">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                                <a href="#">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="berita-card h-100">
                            <img src="{{ asset('ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="">
                            <div class="isi">
                                <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                                <p class="text-muted small mb-1">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                                <a href="#">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="berita-card h-100">
                            <img src="{{ asset('ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg') }}" alt="">
                            <div class="isi">
                                <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                                <p class="text-muted small mb-1">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                                <a href="#">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="berita-card h-100">
                            <img src="{{ asset('ASET/luisa-brimble-HvXEbkcXjSk-unsplash.jpg') }}" alt="">
                            <div class="isi">
                                <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                                <p class="text-muted small mb-1">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                                <a href="#">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Galeri Kami --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Galeri Kami</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row g-3 pt-3">
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="galeri-item h-img">
                    <img src="{{ asset('ASET/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="py-4 justify-content-center d-flex">
            <a href="#" class="btn btn-dark rounded-1 py-2 px-5">LIHAT LEBIH BANYAK</a>
        </div>
    </div>
</section>
@endsection