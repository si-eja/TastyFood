@extends('temppage')
@section('content')

<style>
    /* Foto Slide */
    .gallery-main { overflow: hidden; border-radius: 12px; }
    .gallery-track { width: 100%; position: relative; }
    .gallery-img { width: 100%; height: 420px; object-fit: cover; display: none; }
    .gallery-img.active { display: block; }

    /* PANAH */
    .gallery-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.6);
        color: #fff;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        z-index: 10;
    }
    .gallery-arrow.left { left: 20px; }
    .gallery-arrow.right { right: 20px; }
    .gallery-main:hover .gallery-arrow { display: block; }

    /* THUMBNAIL */
    .thumb-wrapper { width: 100%; aspect-ratio: 1 / 1; overflow: hidden; border-radius: 10px; }
    .thumb-img { width: 100%; height: 100%; object-fit: cover; transition: .3s; }
    .thumb-wrapper:hover .thumb-img { transform: scale(1.05); }
</style>

{{-- ================= HERO (STATIS) ================= --}}
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Galeri Kami</h1>
    </div>
</section>

{{-- ================= SLIDER (DARI BANNER) ================= --}}
<section class="bg-costume">
    <div class="container py-5">

        <div class="position-relative gallery-main">
            <div class="gallery-track">

                @forelse ($sliders as $i => $img)
                    <img
                        src="{{ asset('storage/'.$img->image) }}"
                        class="gallery-img {{ $i === 0 ? 'active' : '' }}"
                        alt="{{ $img->title ?? 'Galeri' }}"
                    >
                @empty
                    <div class="text-center text-muted py-5 w-100">
                        Belum ada foto slider
                    </div>
                @endforelse

            </div>

            @if ($sliders->count() > 1)
                <button class="gallery-arrow left" id="prevBtn">&#10094;</button>
                <button class="gallery-arrow right" id="nextBtn">&#10095;</button>
            @endif
        </div>

    </div>
</section>

{{-- ================= THUMBNAIL ================= --}}
<section class="bg-body">
    <div class="container my-5">
        <div class="row g-3">

            @forelse ($thumbnails as $img)
                <div class="col-6 col-md-3">
                    <div class="thumb-wrapper">
                        <img
                            src="{{ asset('storage/'.$img->image) }}"
                            class="thumb-img"
                            alt="{{ $img->caption ?? 'Galeri' }}"
                        >
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">
                    Belum ada foto galeri
                </div>
            @endforelse

        </div>
    </div>
</section>

{{-- ================= JS SLIDER (FIXED) ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentIndex = 0;
    const images = document.querySelectorAll('.gallery-img');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (!images.length) return;

    function showImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        });
    }
});
</script>

@endsection
