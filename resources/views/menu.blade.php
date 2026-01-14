@extends('temppage')
@section('content')
<style>
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
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Menu Kami</h1>
    </div>
</section>
<section class="bg-costume">
    <div class="container py-5">
        <h3 class="fw-bold mb-4">Daftar Menu</h3>
        <div class="row g-3">
            @forelse ($allMenu as $menu)
                <div class="col-6 col-md-4 col-lg-3">
                    <button class="w-100 border-0 bg-transparent p-0"
                            data-bs-toggle="modal"
                            data-bs-target="#menuModal{{ $menu->id }}">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('storage/'.$menu->gambar) }}" class="card-img-top">
                            <div class="card-body">
                                <h6 class="fw-bold mb-1">{{ $menu->nama_menu }}</h6>
                                <p class="text-muted mb-0">{{ $menu->subjudul }}</p>
                            </div>
                        </div>
                    </button>
                </div>

                {{-- MODAL DETAIL MENU --}}
                <div class="modal fade" id="menuModal{{ $menu->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
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
            @empty
                <p class="text-center text-muted">Belum ada menu.</p>
            @endforelse
        </div>
    </div>
</section>
<section class="bg-body">
    <div class="container py-5">
        <h3 class="fw-bold mb-4 text-end">Daftar Rating Menu</h3>

        @forelse ($allRate as $rate)
            <div class="rounded shadow my-2 p-2 border">
                <strong>Note:</strong>
                {{ Str::limit($rate->komentar, 80) }}

                <div class="d-flex justify-content-between border-top pt-2 mt-2 text-muted">
                    <div><strong>Menu:</strong> {{ $rate->menu->nama_menu }}</div>
                    <div>{{ $rate->created_at->format('d M Y') }}</div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada rating</p>
        @endforelse
    </div>
</section>
@endsection