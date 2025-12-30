@extends('temppage')
@section('content')
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Berita Kami</h1>
    </div>
</section>
<section class="bg-costume">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-3">Judul Berita Terbaru</h2>
            <div class="text-muted">12 Juni 2024</div>
        </div>
        <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 500px;">
        <div class="berita-besar h-100 mt-3">
            <div class="isi d-flex flex-column justify-content-start h-100">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-body container py-5">
    <div class="py-1">
        <h3 class="fw-bold mb-4">Berita Lainnya</h3>
    </div>
    <div class="row flex-wrap g-3">
        <div class="col-md-3">
            <div class="berita-card h-100">
                <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="">
                <div class="isi">
                    <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                    <p class="text-muted small mb-1">
                        Lorem ipsum dolor sit amet consectetur.
                    </p>
                    <a href="{{ route('detberita') }}">Baca selengkapnya →</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection