@extends('admin.tempdash')
@section('content')

<style>
    .berita-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        height: 100%;
    }
    .berita-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .berita-card .isi {
        padding: 20px;
    }
    .berita-card a {
        color: orange;
        font-size: 14px;
        text-decoration: none;
    }
</style>

<section class="container-fluid bg-light min-vh-100">
    <div class="container py-5">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap gap-2 mb-4 align-items-center">
            {{-- SEARCH --}}
            <form method="GET" class="input-group">
                <span class="input-group-text bg-white">
                    <i class="fa fa-search text-muted"></i>
                </span>
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul berita..."
                    value="{{ request('search') }}">
            </form>

            {{-- TAMBAH --}}
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBerita">
                <i class="fa fa-plus"></i>
                <span class="d-none d-md-inline">Tambah Berita</span>
            </button>
        </div>

        {{-- LIST BERITA --}}
        <div class="row g-3">
            @forelse($beritas as $item)
            <div class="col-md-3">
                <div class="berita-card h-100">
                    <img src="{{ asset('storage/'.$item->gambar) }}">
                    <div class="isi">
                        <h6 class="fw-bold mb-1">{{ $item->judul }}</h6>
                        <p class="text-muted small mb-2">
                            {{ Str::limit(strip_tags($item->konten), 60) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            {{-- 🔥 FIX: LINK DINAMIS --}}
                            <a href="{{ route('admin.berita.detail', $item->slug) }}">
                                Baca →
                            </a>

                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button
                                            class="dropdown-item bg-info text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditBerita"
                                            data-id="{{ $item->id }}"
                                            data-judul="{{ $item->judul }}"
                                            data-isi="{{ $item->konten }}"
                                            data-gambar="{{ asset('storage/'.$item->gambar) }}"
                                            data-tanggal="{{ $item->tanggal }}">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="dropdown-item bg-danger text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalHapusBerita"
                                            data-id="{{ $item->id }}">
                                            Hapus
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @empty
                <p class="text-center text-muted">Belum ada berita</p>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $beritas->links() }}
        </div>
    </div>
</section>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambahBerita">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form method="POST"
              action="{{ route('admin.berita.store') }}"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Berita</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <div id="previewBox" class="border rounded bg-light d-flex justify-content-center align-items-center" style="height:220px">
                        <span class="text-muted">Preview gambar</span>
                    </div>
                </div>

                <input name="judul" class="form-control mb-3" placeholder="Judul berita" required>
                <textarea name="konten" class="form-control mb-3" rows="5" placeholder="Isi berita" required></textarea>
                <input type="file" name="gambar" class="form-control mb-3" id="inputGambar" required>
                <input type="date" name="tanggal" class="form-control" id="tanggalBerita" readonly>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal fade" id="modalEditBerita">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form method="POST"
              action="{{ route('admin.berita.update') }}"
              enctype="multipart/form-data"
              class="modal-content">
            @csrf
            <input type="hidden" name="id" id="edit_id">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Berita</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="editPreviewBox" class="border rounded bg-light mb-3" style="height:220px"></div>
                <input name="judul" id="edit_judul" class="form-control mb-3" required>
                <textarea name="konten" id="edit_isi" class="form-control mb-3" rows="5" required></textarea>
                <input type="file" name="gambar" id="edit_gambar" class="form-control mb-3">
                <input type="date" name="tanggal" id="edit_tanggal" class="form-control" readonly>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL HAPUS ================= --}}
<div class="modal fade" id="modalHapusBerita">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST"
              action="{{ route('admin.berita.delete') }}"
              class="modal-content">
            @csrf
            <input type="hidden" name="id" id="hapus_id">
            <div class="modal-header">
                <h5 class="modal-title text-danger fw-bold">Konfirmasi Hapus</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus berita ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= JS ================= --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('tanggalBerita').value =
        new Date().toISOString().split('T')[0];
});

inputGambar.onchange = e => {
    const r = new FileReader();
    r.onload = () =>
        previewBox.innerHTML =
        `<img src="${r.result}" class="w-100 h-100" style="object-fit:cover">`;
    r.readAsDataURL(e.target.files[0]);
};

modalEditBerita.addEventListener('show.bs.modal', e => {
    const b = e.relatedTarget;
    edit_id.value = b.dataset.id;
    edit_judul.value = b.dataset.judul;
    edit_isi.value = b.dataset.isi;
    edit_tanggal.value = b.dataset.tanggal;
    editPreviewBox.innerHTML =
        `<img src="${b.dataset.gambar}" class="w-100 h-100" style="object-fit:cover">`;
});

edit_gambar.onchange = e => {
    const r = new FileReader();
    r.onload = () =>
        editPreviewBox.innerHTML =
        `<img src="${r.result}" class="w-100 h-100" style="object-fit:cover">`;
    r.readAsDataURL(e.target.files[0]);
};

modalHapusBerita.addEventListener('show.bs.modal', e => {
    hapus_id.value = e.relatedTarget.dataset.id;
});
</script>

@endsection
