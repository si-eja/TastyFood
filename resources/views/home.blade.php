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
    .konten-wrapper {
        max-height: 380px;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    .menu-wrapper {
        max-height: 450px;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
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
                    {{ $tentang->about_desc_1 }}
                    {{ $tentang->about_desc_2 }}
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
            {{ $tentang->about_desc_1 }}
        </p>
        <hr class="mx-auto mt-4" style="width:60px; border:2px solid #000;">
    </div>
</section>
{{-- Makanan --}}
<section class="menu-section">
    <div class="container">
        <div class="row g-4 justify-content-center pt-5">
            @foreach ($menus as $menu)
                <div class="col-md-3 col-6">
                    <div class="menu-card"
                        data-bs-toggle="modal"
                        data-bs-target="#menuModal{{ $menu->id }}"
                        style="cursor:pointer">

                        <img src="{{ asset('storage/'.$menu->gambar) }}">
                        <h4 class="fw-bolder mt-3">{{ $menu->nama_menu }}</h4>
                        <p class="text-muted">{{ $menu->subjudul }}</p>
                    </div>
                </div>

                {{-- MODAL --}}
                <div class="modal fade" id="menuModal{{ $menu->id }}">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="row g-2">
                                    {{-- KIRI --}}
                                        <div class="col-md-5">
                                            <img src="{{ asset('storage/'.$menu->gambar) }}"
                                                class="w-100 rounded mb-3"
                                                style="max-height:280px;object-fit:cover">

                                            <h4 class="fw-bold">{{ $menu->nama_menu }}</h4>
                                            <p class="text-muted">{{ $menu->subjudul }}</p>
                                            <p>{{ $menu->deskripsi }}</p>
                                        </div>

                                        {{-- KANAN --}}
                                        <div class="col-md-7">
                                            <h5 class="fw-bold mb-2">Beri komentar</h5>

                                            <form action="{{ route('menu.rate.store', $menu->id) }}" method="POST">
                                                @csrf
                                                <textarea name="komentar" class="form-control" rows="3" required></textarea>
                                                <button class="btn btn-primary w-100 mt-2">Kirim</button>
                                            </form>

                                            <h5 class="fw-bold mt-4">Komentar</h5>
                                            <div class="konten-wrapper pe-2">
                                                @forelse ($menu->rates as $rate)
                                                    <div class="rounded shadow-sm my-2 p-3 border">
                                                        <strong>Note:</strong> {{ $rate->komentar }}
                                                        <div class="border-top pt-2 mt-2 text-muted text-end">
                                                            {{ $rate->created_at->format('d M Y') }}
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-muted text-center">Belum ada komentar</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- Berita Kami --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Berita Kami</h2>
        <div class="row g-4">
            @if($beritaUtama)
            {{-- ================= BERITA BESAR ================= --}}
            <div class="col-lg-6">
                <div class="berita-card berita-besar h-100">
                    <img 
                        src="{{ asset('storage/'.$beritaUtama->gambar) }}" 
                        alt="{{ $beritaUtama->judul }}"
                    >
                    <div class="isi">
                        <h5 class="fw-bold">
                            {{ $beritaUtama->judul }}
                        </h5>
                        <p class="text-muted">
                            {{ Str::limit(strip_tags($beritaUtama->konten), 120, '...') }}
                        </p>
                        <a href="{{ route('detberita', $beritaUtama->slug) }}">
                            Baca selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            @endif
            {{-- ================= BERITA KECIL ================= --}}
            <div class="col-lg-6">
                <div class="row g-4">
                    @foreach($beritaKecil as $item)
                    <div class="col-md-6 col-6">
                        <div class="berita-card h-100">
                            <img 
                                src="{{ asset('storage/'.$item->gambar) }}" 
                                alt="{{ $item->judul }}"
                            >
                            <div class="isi">
                                <h6 class="fw-bold mb-1">
                                    {{ Str::limit($item->judul, 50) }}
                                </h6>
                                <p class="text-muted small mb-1">
                                    {{ Str::limit(strip_tags($item->konten), 60, '...') }}
                                </p>
                                <a href="{{ route('detberita', $item->slug) }}">
                                    Baca selengkapnya →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Kalau berita kecil kurang dari 4 --}}
                    @if($beritaKecil->isEmpty())
                        <p class="text-muted text-center">Belum ada berita.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
{{-- GALERI KAMI --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Galeri Kami</h2>
        @if($galeriHome->count())
            <div class="row g-3">
                @foreach($galeriHome as $item)
                    <div class="col-md-4">
                        <div class="galeri-item h-img">
                            <img 
                                src="{{ asset('storage/'.$item->image) }}" 
                                alt="{{ $item->caption ?? 'Galeri' }}"
                            >
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="py-4 d-flex justify-content-center">
                <a href="{{ route('galeri') }}" class="btn btn-dark rounded-1 py-2 px-5">
                    LIHAT LEBIH BANYAK
                </a>
            </div>
        @else
            {{-- EMPTY STATE --}}
            <div class="text-center text-muted py-5">
                <p class="mb-2">Galeri belum tersedia</p>
            </div>
        @endif
    </div>
</section>
@endsection