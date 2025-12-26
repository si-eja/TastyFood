@extends('temppage')
@section('content')
<style>
    /* Foto Slide */
    .gallery-main {
        overflow: hidden;
        border-radius: 12px;
    }

    .gallery-track {
        width: 100%;
        position: relative;
    }

    .gallery-img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        display: none;
    }

    .gallery-img.active {
        display: block;
    }

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

    .gallery-arrow.left {
        left: 20px;
    }

    .gallery-arrow.right {
        right: 20px;
    }

    .gallery-main:hover .gallery-arrow {
        display: block;
    }

    /* THUMBNAIL */
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
</style>
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Galeri Kami</h1>
    </div>
</section>
<section class="bg-costume">
    <div class="container py-5">
        {{-- FOTO BESAR (SLIDER MANUAL, 3 FOTO) --}}
        <div class="position-relative gallery-main">
            <div class="gallery-track d-flex">
                <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" class="gallery-img active">
                <img src="{{ asset('ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}" class="gallery-img">
                <img src="{{ asset('ASET/luisa-brimble-HvXEbkcXjSk-unsplash.jpg') }}" class="gallery-img">
            </div>
            {{-- Panah --}}
            <button class="gallery-arrow left" onclick="prevImage()">&#10094;</button>
            <button class="gallery-arrow right" onclick="nextImage()">&#10095;</button>
        </div>
    </div>
</section>
<section class="bg-body">
    <div class="container my-5">
        {{-- FOTO KECIL --}}
        <div class="row flex-wrap g-3">
            <div class="col-md-3">
                <div class="thumb-wrapper">
                    <img src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" class="thumb-img">
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb-wrapper">
                    <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" class="thumb-img">
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb-wrapper">
                    <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="thumb-img">
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb-wrapper">
                    <img src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" class="thumb-img">
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumb-wrapper">
                    <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="thumb-img">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.gallery-img');
    function showImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
    }
    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }
    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }
</script>
@endsection