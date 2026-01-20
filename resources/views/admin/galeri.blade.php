@extends('admin.tempdash')
@section('content')
<style>
    .thumb-wrapper{width:100%;aspect-ratio:1/1;overflow:hidden;border-radius:12px}
    .thumb-img{width:100%;height:100%;object-fit:cover;transition:.3s}
    .thumb-wrapper:hover .thumb-img{transform:scale(1.05)}
    .thumb-overlay{position:absolute;inset:0;background:rgba(0,0,0,.55);display:flex;justify-content:center;align-items:center;opacity:0;transition:.3s}
    .thumb-wrapper:hover .thumb-overlay{opacity:1}

    .banner-wrapper{width:100%;aspect-ratio:16/9;overflow:hidden;border-radius:12px;position:relative}
    .banner-img{width:100%;height:100%;object-fit:cover;transition:.3s}
    .banner-wrapper:hover .banner-img{transform:scale(1.05)}
    .banner-overlay{position:absolute;inset:0;background:rgba(0,0,0,.55);display:flex;justify-content:center;align-items:center;opacity:0;transition:.3s}
    .banner-wrapper:hover .banner-overlay{opacity:1}
</style>

<section class="container-fluid bg-light">
<div class="container py-5">
{{-- ALERT SUCCESS --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-1"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
{{-- ALERT ERROR VALIDATION --}}
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
{{-- ================= BANNER ================= --}}
<div class="rounded shadow p-2 mb-3">
    <h5 class="fw-bold">Banner Galeri</h5>
    <hr>
    <div class="row g-3">
        {{-- BANNER EXIST --}}
        @if($banner->count())
            @foreach($banner as $item)
                <div class="col-md-6">
                    <div class="banner-wrapper">
                        <img src="{{ asset('storage/'.$item->image) }}" class="banner-img">
                        <div class="banner-overlay">
                            <button class="btn btn-light btn-sm me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditBanner{{ $item->id }}">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapusBanner{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- EDIT BANNER --}}
                <div class="modal fade" id="modalEditBanner{{ $item->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('galeri.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <input type="hidden" name="section" value="banner">
                                <div class="modal-header">
                                    <h5>Edit Banner</h5>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/'.$item->image) }}"
                                        class="img-fluid mb-3"
                                        style="max-height:220px">

                                    <input type="file" name="image" class="form-control mb-2">
                                    <input type="text" name="title"
                                        class="form-control"
                                        value="{{ $item->title }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- HAPUS BANNER --}}
                <div class="modal fade" id="modalHapusBanner{{ $item->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('galeri.destroy',$item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="text-danger">Hapus Banner</h5>
                                </div>
                                <div class="modal-body">
                                    Yakin hapus banner?
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- TAMBAH BANNER --}}
        <div class="col-md-6">
            <div class="banner-wrapper d-flex align-items-center justify-content-center border">
                <button class="btn btn-primary w-100 h-100"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTambahBanner">
                    <i class="fa fa-plus"></i> Tambah Banner
                </button>
            </div>
        </div>

        <div class="modal fade" id="modalTambahBanner">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="section" value="banner">
                        <div class="modal-header">
                            <h5>Tambah Banner</h5>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="image" class="form-control mb-2" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ================= GALERI ================= --}}
<div class="rounded shadow p-2">
    <h5 class="fw-bold">Semua Galeri</h5>
    <hr>
    <div class="row g-3">
        @foreach($galeris as $g)
        <div class="col-6 col-md-3">
            <div class="thumb-wrapper position-relative">
                <img src="{{ asset('storage/'.$g->image) }}" class="thumb-img">
                <div class="thumb-overlay">
                    <button class="btn btn-sm btn-light me-2"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEdit{{ $g->id }}">
                        <i class="fa fa-pen"></i>
                    </button>
                    <button class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalHapus{{ $g->id }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        {{-- EDIT --}}
        <div class="modal fade" id="modalEdit{{ $g->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('galeri.update',$g->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <input type="hidden" name="section" value="{{ $g->section }}">
                        <div class="modal-header">
                            <h5>Edit Gambar</h5>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/'.$g->image) }}" class="object-fit-cover mb-2 w-100" style="max-height: 320px;">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- HAPUS --}}
        <div class="modal fade" id="modalHapus{{ $g->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('galeri.destroy',$g->id) }}" method="POST">
                        @csrf @method('DELETE')

                        <div class="modal-header">
                            <h5 class="text-danger">Hapus</h5>
                        </div>
                        <div class="modal-body">
                            Yakin hapus gambar?
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{-- TAMBAH GALERI --}}
        <div class="col-6 col-md-3">
            <div class="thumb-wrapper d-flex align-items-center justify-content-center border">
                <button class="btn btn-primary w-100 h-100"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTambahGaleri">
                    Tambah
                </button>
            </div>
        </div>
        <div class="modal fade" id="modalTambahGaleri">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="section" value="thumbnail">
                        <div class="modal-header">
                            <h5>Tambah Galeri</h5>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection
