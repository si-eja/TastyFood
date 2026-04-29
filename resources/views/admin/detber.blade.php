@extends('admin.tempdash')
@section('content')
<section class="bg-costume">
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-3">
                {{ $berita->judul }}
            </h2>
            <div class="text-muted">
                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
            </div>
        </div>

        <img src="{{ asset('storage/'.$berita->gambar) }}"
             class="object-fit-cover rounded-4"
             style="width:100%; max-height:500px;">

        <div class="berita-besar h-100 mt-3">
            <div class="isi">
                {!! $berita->konten !!}
            </div>
        </div>

    </div>
</section>
@endsection