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

    /* OVERLAY */
    .thumb-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.55);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: 0.3s ease;
    }

    .thumb-wrapper:hover .thumb-overlay {
        opacity: 1;
    }

    .thumb-wrapper:hover .thumb-img {
        transform: scale(1.05);
    }
    /* BANNER */
    .banner-wrapper {
        width: 100%;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        border-radius: 12px;
        position: relative;
    }

    .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .3s ease;
    }

    .banner-wrapper:hover .banner-img {
        transform: scale(1.05);
    }

    .banner-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.55);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: .3s ease;
    }

    .banner-wrapper:hover .banner-overlay {
        opacity: 1;
    }
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        <div class="rounded shadow p-2">
            <h5 class="fw-bold">Banner Galeri</h5>
            <hr>
            <div class="row g-3">
                {{-- BANNER 1 --}}
                {{-- foreach keun bagean ieu --}}
                <div class="col-md-6">
                    <div class="banner-wrapper">
                        <img 
                            src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}"
                            class="banner-img">

                        <div class="banner-overlay">
                            <button 
                                class="btn btn-light btn-sm me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditBanner">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button 
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapusBanner">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEditBanner" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fa fa-image"></i> Edit Banner
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img 
                                        id="previewBannerEdit"
                                        src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}"
                                        class="img-fluid rounded mb-3"
                                        style="max-height:220px; object-fit:cover;">

                                    <input 
                                        type="file"
                                        class="form-control"
                                        accept="image/*"
                                        onchange="previewBannerEdit(event)">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalHapusBanner" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger">
                                        <i class="fa fa-triangle-exclamation"></i> Hapus Banner
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    Yakin ingin menghapus banner ini?
                                    <br>
                                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-danger">Ya, Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- TAMBAH BANNER --}}
                <div class="col-md-6">
                    <div class="banner-wrapper d-flex align-items-center justify-content-center border border-dashed">
                        <button 
                            class="btn btn-primary w-100 h-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTambahBanner">
                            <i class="fa fa-plus"></i> Tambah Banner
                        </button>
                    </div>
                    <div class="modal fade" id="modalTambahBanner" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fa fa-image"></i> Tambah Banner
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img 
                                        id="previewBannerTambah"
                                        src="https://via.placeholder.com/600x300?text=Preview+Banner"
                                        class="img-fluid rounded mb-3"
                                        style="max-height:220px; object-fit:cover;">

                                    <input 
                                        type="file"
                                        class="form-control"
                                        accept="image/*"
                                        onchange="previewBannerTambah(event)">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded shadow p-2">
            <h5 class="fw-bold">Semua Galeri</h5>
            <hr>
            <div class="row flex-wrap g-3">
                {{-- gambar --}}
                {{-- foreach keun bagean ieu --}}
                <div class="col-6 col-md-3">
                    <div class="thumb-wrapper position-relative">
                        <img src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}" class="thumb-img">
                        {{-- OVERLAY --}}
                        <div class="thumb-overlay">
                            <button 
                                class="btn btn-sm btn-light me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEdit">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button 
                                class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapus">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalHapus" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger">
                                        <i class="fa fa-triangle-exclamation"></i> Konfirmasi Hapus
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menghapus gambar ini?
                                    <br>
                                    <small class="text-muted">Aksi ini tidak dapat dibatalkan.</small>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-danger">Ya, Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEdit" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fa fa-image"></i> Edit Gambar
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- PREVIEW --}}
                                    <div class="mb-3 text-center">
                                        <img 
                                            id="previewImage"
                                            src="{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}"
                                            class="img-fluid rounded"
                                            style="max-height: 220px;">
                                    </div>
                                    {{-- INPUT FILE --}}
                                    <input 
                                        type="file"
                                        class="form-control"
                                        accept="image/*"
                                        onchange="previewImage(event)">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button class="btn btn-primary">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- button tambah --}}
                <div class="col-6 col-md-3">
                    <div class="thumb-wrapper">
                        <button class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
                    </div>
                    <div class="modal fade" id="modalTambah" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fa fa-image"></i> Tambah Galeri
                                    </h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- PREVIEW IMAGE --}}
                                    <div class="mb-3 text-center">
                                        <div class="border rounded p-2">
                                            <img 
                                                id="previewTambah"
                                                src="https://via.placeholder.com/400x250?text=Preview+Image"
                                                class="img-fluid rounded"
                                                style="max-height:220px; object-fit:cover;">
                                        </div>
                                    </div>
                                    {{-- INPUT FILE --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Pilih Gambar</label>
                                        <input 
                                            type="file"
                                            class="form-control"
                                            accept="image/*"
                                            onchange="previewTambahImage(event)">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function previewImage(event) {
    const img = document.getElementById('previewImage');
    img.src = URL.createObjectURL(event.target.files[0]);
}
</script>
<script>
function previewBannerEdit(event) {
    document.getElementById('previewBannerEdit').src =
        URL.createObjectURL(event.target.files[0]);
}

function previewBannerTambah(event) {
    document.getElementById('previewBannerTambah').src =
        URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection
