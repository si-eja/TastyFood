@extends('admin.tempdash')
@section('content')
<style>
    .konten-wrapper {
        max-height: 380px;
        overflow-y: auto;
    }
    @media (max-width: 768px) {
        .img-wrapper {
            height: 100%;
        }
    }
</style>
<section class="bg-costume">
    <div class="container py-5">
        <form method="GET" class="d-flex gap-2 mb-3">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari menu"
                   value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </form>
        <hr>
        <div class="row g-2">
            <div class="col-lg-3 col-md-4 col-6">
                <div class="h-100 shadow-sm rounded d-flex position-relative ">
                    {{-- FOTO --}}
                    <img src="{{ asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}"
                        class="rounded-start object-fit-cover img-wrapper"
                        style="max-width:120px;"
                        alt="Menu">
                    <div class="p-2 flex-grow-1">
                        {{-- ISI --}}
                        <div class="mb-1">
                            <h6 class="fw-bold mb-1">Menu Nama</h6>
                            <p class="text-muted mb-0">Submenu</p>
                        </div>
                        {{-- BUTTON --}}
                        <div class="d-flex flex-wrap gap-1">
                            <button type="button"
                                class="border btn btn-outline-secondary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#menuModal">
                                Details
                            </button>
                            <button type="button"
                                class="border btn btn-outline-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#menuModal">
                                Edit
                            </button>
                            <button type="button"
                                class="border btn btn-outline-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#menuModal">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
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
@endsection