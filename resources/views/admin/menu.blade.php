@extends('admin.tempdash')
@section('content')
<style>
    .konten-wrapper {
        max-height: 380px;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    @media (max-width: 768px) {
        .img-wrapper {
            height: 100%;
        }
        .btn-wrapper {
            width: 100%;
        }
    }
</style>
<section class="bg-costume container-fluid" style="min-height:100vh;">
    <div class="container py-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- SEARCH --}}
        <form method="GET" class="d-flex gap-2 mb-3">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari menu"
                   value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </form>
        <button type="button"
                class="btn btn-success w-100"
                data-bs-toggle="modal"
                data-bs-target="#addModal">
            Tambah Menu
        </button>
        <hr>
        <div class="row g-2">
        @forelse ($menus as $menu)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="h-100 shadow-sm rounded d-flex position-relative">

                    {{-- FOTO --}}
                    <img src="{{ asset('storage/'.$menu->gambar) }}"
                        class="rounded-start object-fit-cover img-wrapper"
                        style="max-width:120px;"
                        alt="{{ $menu->nama_menu }}">

                    <div class="p-2 flex-grow-1">
                        {{-- ISI --}}
                        <div class="mb-1">
                            <h6 class="fw-bold mb-1">{{ $menu->nama_menu }}</h6>
                            <p class="text-muted mb-0">{{ $menu->subjudul }}</p>
                            <span class="badge bg-secondary">
                                {{ $menu->rates_count }} komentar
                            </span>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex flex-wrap gap-1 mt-2">
                            <button class="btn btn-outline-secondary btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $menu->id }}">
                                Details
                            </button>

                            <button class="btn btn-outline-info btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $menu->id }}">
                                Edit
                            </button>

                            <button class="btn btn-outline-danger btn-sm btn-wrapper"
                                data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $menu->id }}">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================= MODAL DETAIL ================= --}}
            <div class="modal fade" id="detailModal{{ $menu->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-5" style="max-height: 480px; overflow-y: auto;">
                                    <img src="{{ asset('storage/'.$menu->gambar) }}"
                                        class="w-100 rounded mb-2"
                                        style="max-height:280px; object-fit:cover">
                                    <h4 class="fw-bold">{{ $menu->nama_menu }}</h4>
                                    <p class="text-muted">{{ $menu->subjudul }}</p>
                                    <p>{{ $menu->deskripsi }}</p>
                                </div>

                                <div class="col-md-7" style="max-height: 480px; overflow-y: auto;">
                                    <h5 class="fw-bold mb-3">Komentar</h5>
                                    <div class="konten-wrapper pe-2">
                                        @forelse ($menu->rates as $rate)
                                            <div class="rounded shadow-sm my-2 p-3 border">
                                                <strong>Note:</strong> {{ $rate->komentar }}
                                                <div class="text-muted small border-top pt-2 mt-2">
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

            {{-- ================= MODAL EDIT ================= --}}
            <div class="modal fade" id="editModal{{ $menu->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="fw-bold mb-3 text-center">Edit Menu</h5>

                            <form action="{{ route('admin.menu.update', $menu->id) }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="fw-bold">Nama Menu</label>
                                    <input type="text"
                                        name="nama_menu"
                                        value="{{ $menu->nama_menu }}"
                                        class="form-control"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Subjudul</label>
                                    <input type="text"
                                        name="subjudul"
                                        value="{{ $menu->subjudul }}"
                                        class="form-control"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Deskripsi</label>
                                    <textarea name="deskripsi"
                                        class="form-control"
                                        rows="4"
                                        required>{{ $menu->deskripsi }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>

                                <button class="btn btn-primary w-100">
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================= MODAL HAPUS ================= --}}
            <div class="modal fade" id="hapusModal{{ $menu->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button class="btn-close btn-close-white"
                                data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            Yakin ingin menghapus menu
                            <strong>{{ $menu->nama_menu }}</strong>?
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary"
                                data-bs-dismiss="modal">Batal</button>

                            <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger"
                                    {{ $menu->rates_count > 0 ? 'disabled' : '' }}>
                                    Ya, Hapus
                                </button>
                            </form>
                        </div>

                        @if ($menu->rates_count > 0)
                            <div class="text-center text-danger small pb-3">
                                Menu ini memiliki komentar, tidak bisa dihapus
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @empty
            <p class="text-center text-muted">Belum ada menu</p>
        @endforelse
        </div>
        {{-- Modal Tambah --}}
        <div class="modal fade" id="addModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="fw-bold mb-3 text-center">Tambah Menu Baru</h5>
                        <div class="row g-2">
                            <div class="col-md-5">
                                <div class="rounded shadow-sm border">
                                    <!-- PREVIEW GAMBAR -->
                                    <div class="bg-secondary rounded-top text-center">
                                        <img id="previewImage"
                                            src=""
                                            class="img-fluid d-none rounded-top"
                                            style="max-height: 220px; object-fit: cover;">
                                        <i id="previewIcon" class="fa fa-image text-white fs-1 m-5"></i>
                                    </div>
                                    <div class="text-center text-muted py-2">
                                        Preview Gambar Menu
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('admin.menu.store') }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Menu</label>
                                        <input type="text"
                                            name="nama_menu"
                                            class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Subjudul</label>
                                        <input type="text"
                                            name="subjudul"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi</label>
                                        <textarea name="deskripsi"
                                                class="form-control"
                                                rows="4"
                                                required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Gambar</label>
                                        <input type="file"
                                            name="gambar"
                                            class="form-control"
                                            accept="image/*"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        Simpan Menu
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection