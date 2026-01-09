@extends('temppage')
@section('content')
<style>
    .konten-wrapper {
        max-height: 380px;
        overflow-y: auto;
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
            <div class="col-6 col-md-4 col-lg-3">
                <button type="button"
                        class="w-100 text-start border-0 bg-transparent p-0"
                        data-bs-toggle="modal"
                        data-bs-target="#menuModal">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- FOTO -->
                        <img src="{{ asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}"
                            class="card-img-top"
                            alt="Menu">
                        <!-- ISI -->
                        <div class="card-body">
                            <h6 class="fw-bold mb-1">Menu Nama</h6>
                            <p class="text-muted mb-0">Submenu</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
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
</section>
<section class="bg-body">
    <div class="container py-5">
        <h3 class="fw-bold mb-4 text-end">Daftar Rating Menu</h3>
        <div class="mb-3">
            <div class="rounded shadow my-2 p-2 border border-1 w-100">
                <span>
                    <strong>Note:</strong> Makanannya enak dan lezat, pelayanan cepat dan ramah. Suasana restoran nyaman untuk bersantai.
                </span>
                <div class="d-flex justify-content-between border-top pt-2 mt-2">
                    <div class="text-muted">
                        <strong>Menu:</strong> Spaghetti Bolognese
                    </div>
                    <div class="text-end">
                        <strong>Tanggal:</strong> 2024-06-15
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- @forelse ($allRate as $rate)    
    <div class="rounded shadow my-2 p-2 border border-1">
        <span>
            <strong>Note:</strong> {{ Str::limit(strip_tags($rate->komentar), 50, '...') }}
        </span>
        <div class="d-flex justify-content-between border-top pt-2 mt-2">
            <div class="text-muted">
                <strong>Menu:</strong> {{ $rate->menu->nama_menu ?? 'Menu tidak ditemukan' }}
            </div>
            <div class="text-end">
                <strong>Tanggal:</strong> {{ $rate->create_at }}
            </div>
        </div>
    </div>
@empty
    <p class="text-center text-muted">Belum ada rating</p>
@endforelse --}}
{{-- @forelse ($allMenu as $menu)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="menu-card h-100">
                    <img src="{{ asset('storage/'.$menu->gambar) }}" alt="">
                    <div class="isi">
                        <h6 class="fw-bold mb-1">
                            {{ $menu->nama_menu }}
                        </h6>
                        <p class="text-muted">{{ $menu->subjudul }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Belum ada menu.</p>
            @endforelse --}}