@extends('temppage')
@section('content')

{{-- HERO --}}
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Berita Kami</h1>
    </div>
</section>

{{-- ================= BERITA TERBARU ================= --}}
<section class="bg-costume">
    <div class="container py-5">
        <h3 class="fw-bold mb-4">Berita Terbaru</h3>

        @if($beritaTerbaru)
        <div class="row g-3">
            <div class="col-md-6">
                <img 
                    src="{{ asset('storage/'.$beritaTerbaru->gambar) }}"
                    class="object-fit-cover rounded-4"
                    style="width:100%; height:100%; max-height:500px;">
            </div>

            <div class="col-md-6">
                <div class="berita-besar h-100">
                    <div class="isi d-flex flex-column h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fw-bold mb-3">
                                {{ $beritaTerbaru->judul }}
                            </h2>
                            <div class="text-muted">
                                {{ $beritaTerbaru->tanggal }}
                            </div>
                        </div>

                        <p>
                            {{ Str::limit(strip_tags($beritaTerbaru->konten), 300) }}
                        </p>

                        {{-- 🔥 FIX DI SINI --}}
                        <a href="{{ route('detberita', $beritaTerbaru->slug) }}"
                           class="btn btn-dark p-4 mb-auto">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p class="text-muted">Belum ada berita.</p>
        @endif
    </div>
</section>

{{-- ================= BERITA LAINNYA ================= --}}
<section class="bg-body container py-5">
    <h3 class="fw-bold mb-4">Berita Lainnya</h3>

    <div class="row g-3">
        @forelse($beritaLainnya as $item)
        <div class="col-md-3">
            <div class="berita-card h-100">
                <img src="{{ asset('storage/'.$item->gambar) }}" alt="">
                <div class="isi">
                    <h6 class="fw-bold mb-1">
                        {{ $item->judul }}
                    </h6>
                    <p class="text-muted small mb-1">
                        {{ Str::limit(strip_tags($item->konten), 60) }}
                    </p>

                    {{-- 🔥 FIX DI SINI --}}
                    <a href="{{ route('detberita', $item->slug) }}">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-muted text-center">Tidak ada berita lainnya.</p>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $beritaLainnya->links() }}
    </div>
</section>

@endsection
