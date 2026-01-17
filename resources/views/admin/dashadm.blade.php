@extends('admin.tempdash')
@section('content')
<style>
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

    .thumb-wrapper {
        border-radius: 12px;
        overflow: hidden;
    }
    .map-public {
        width: 100%;
        height: 450px;
    }

    .map-public iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
 
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        {{-- Data Crud --}}
        <div class="row">
            <div class="col-md-7">
                <div class="row g-2">
                    {{-- Jumlah data berita --}}
                    <div class="col-md-4">
                        <div class="rounded bg-light shadow">
                            <div class="d-flex justify-content-between p-3" style="height: 50px;">
                                <div>
                                    <i class="fa fa-newspaper fa-2x text-primary"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0 h6">{{ $totalBerita }}</h3>
                                    <p class="mt-0">Berita</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.berita') }}" class="btn btn-primary w-100 rounded-bottom mt-2">Berita</a>
                        </div>
                    </div>
                    {{-- Jumlah data galeri --}}
                    <div class="col-md-4">
                        <div class="rounded bg-light shadow">
                            <div class="d-flex justify-content-between p-3" style="height: 50px;">
                                <div>
                                    <i class="fa fa-image fa-2x text-success"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0 h6">{{ $totalGaleri }}</h3>
                                    <p class="mt-0">Galeri</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.galeri') }}" class="btn btn-success w-100 rounded-bottom mt-2">Galeri</a>
                        </div>
                    </div>
                    {{-- Jumlah data menu --}}
                    <div class="col-md-4">
                        <div class="rounded bg-light shadow">
                            <div class="d-flex justify-content-between p-3" style="height: 50px;">
                                <div>
                                    <i class="fa fa-bowl-rice fa-2x text-danger"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold mb-0 h6">{{ $totalMenu }}</h3>
                                    <p class="mt-0">menu</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.menu') }}" class="btn btn-danger w-100 rounded-bottom mt-2">Menu</a>
                        </div>
                    </div>
                </div>
                {{-- Data Menu --}}
                <div class="my-3">
                    <div class="rounded p-3 bg-light shadow">
                        <h4 class="fw-bold mb-3">Kilas Menu</h4>
                        <hr>
                        <div class="overflow-y-scroll"></div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="h-100 shadow-sm rounded d-flex position-relative border-dark border">
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
                                                class="border btn btn-outline-secondary btn-sm btn-wrapper w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target="#menuModal">
                                                Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Details --}}
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
                        </div>
                    </div>
                </div>
            </div>
            {{-- Data Pesan --}}
            <div class="col-md-5">
                <div class="rounded bg-light shadow p-3" style="height: 100%;">
                    <h4 class="fw-bold mb-3">Pesan Masuk</h4>
                    <div style="overflow-y: scroll; height: 295px; padding-right: 10px;">
                        <button     
                            class="btn w-100 text-start py-1 border-top border-bottom bg-transparent"
                            data-bs-toggle="modal"
                            data-bs-target="#modalPesan">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">Pengirim-1</h5>
                                    <small class="text-muted">email@gmail.com</small>
                                </div>
                                <span class="badge bg-secondary">
                                    Belum Dibaca
                                </span>
                            </div>
                        </button>

                        {{-- MODAL PESAN --}}
                        <div class="modal fade" id="modalPesan" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pesan dari Pengirim-1</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Ini adalah contoh isi pesan.<br>
                                            Digunakan hanya untuk dummy tampilan admin panel.
                                        </p>
                                        <small class="text-muted">email@gmail.com</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Data Lokasi Kontak --}}
        <div class="mt-2">
            <div class="rounded p-2 bg-light shadow">
                <h4 class="fw-bold mb-3">Lokasi dan Kontak</h4>
                <hr>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="map-public">
                            <iframe src="{{ $location->map_embed }}"
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row text-center">
                            <div class="col-4 mb-4">
                                <img src="{{ asset('ASET/Group 66.png') }}" style="height:30px; width:30px" class="mb-3">
                                <p class="fw-bold mb-1">EMAIL</p>
                                <p class="mb-0">{{ $user->email }}</p>
                            </div>
                            <div class="col-4 mb-4">
                                <img src="{{ asset('ASET/Group 67.png') }}" style="height:30px; width:30px" class="mb-3">
                                <p class="fw-bold mb-1">PHONE</p>
                                <p class="mb-0">{{ $user->nomor_hp }}</p>
                            </div>
                            <div class="col-4 mb-4">
                                <img src="{{ asset('ASET/Group 68.png') }}" style="height:30px; width:30px" class="mb-3">
                                <p class="fw-bold mb-1">LOCATION</p>
                                <p class="mb-0">{{ $location->nama_lokasi }}</p>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-warning w-100 my-2" data-bs-toggle="modal" data-bs-target="#editUserModal">
                            Ubah Email / Nomor
                        </button>
                        <button class="btn btn-primary w-100 my-2" data-bs-toggle="modal" data-bs-target="#locationModal">
                            Ubah Lokasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editUserModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="updateForm" method="POST" action="{{ route('admin.user.update') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Data User</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control mb-3"
                                value="{{ $user->email }}"
                                required>
                            <label>Nomor HP</label>
                            <input type="text"
                                name="nomor_hp"
                                class="form-control"
                                value="{{ $user->nomor_hp }}"
                                placeholder="08xxx / +628xxx"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="button"
                                    class="btn btn-primary"
                                    onclick="confirmUpdate()">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="locationModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.location.update') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Lokasi</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label class="fw-semibold">Nama Lokasi</label>
                            <input type="text"
                                id="location-input"
                                name="nama_lokasi"
                                class="form-control mb-3"
                                value="{{ $location->nama_lokasi }}"
                                placeholder="Contoh: Cimahi, Jawa Barat"
                                required>
                            <input type="hidden" name="map_embed" id="map_embed">

                            <div id="map-preview"
                                class="rounded border"
                                style="width:100%; height:350px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
const input = document.getElementById('location-input');
const preview = document.getElementById('map-preview');
const embedInput = document.getElementById('map_embed');

function renderMap(q) {
    const url = `https://www.google.com/maps?q=${encodeURIComponent(q)}&output=embed`;

    preview.innerHTML = `
        <iframe
            src="${url}"
            width="100%"
            height="100%"
            style="border:0;"
            loading="lazy">
        </iframe>
    `;

    embedInput.value = url;
}

input.addEventListener('input', function () {
    if (this.value.length >= 3) {
        renderMap(this.value);
    }
});

// load pertama (edit)
renderMap(`{{ $location->nama_lokasi }}`);
</script>
<script>
function confirmUpdate() {
    if (confirm('Apakah Anda yakin ingin mengubah nomor HP / email?')) {
        document.getElementById('updateForm').submit();
    }
}
</script>
@endsection