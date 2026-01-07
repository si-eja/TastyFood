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
            <h2 class="fw-bold mb-3">
                {{ $berita->judul }}
            </h2>
            <div class="text-muted">
                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
            </div>
        </div>
        <img src="{{ asset('storage/'.$berita->gambar) }}" 
            class="object-fit-cover rounded-4"
            style="width:100%; max-height:500px;">
        <div class="berita-besar h-100 mt-3">
            <div class="isi d-flex flex-column justify-content-start h-100">
                {!! $berita->konten !!}
            </div>
        </div>
    </div>
</section>
@if($beritaLainnya->count())
<section class="bg-body container py-5">
    <h3 class="fw-bold mb-4">Berita Lainnya</h3>
    <div class="row g-3">
        @foreach($beritaLainnya as $item)
        <div class="col-md-3">
            <div class="berita-card h-100">
                <img 
                    src="{{ asset('storage/'.$item->gambar) }}" 
                    alt="{{ $item->judul }}"
                >
                <div class="isi">
                    <h6 class="fw-bold mb-1">
                        {{ $item->judul }}
                    </h6>
                    <p class="text-muted small mb-1">
                        {{ Str::limit(strip_tags($item->konten), 50, '...') }}
                    </p>
                    <a href="{{ route('detberita', $item->slug) }}">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
@endsection