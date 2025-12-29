@extends('admin.tempdash')
@section('content')
<style>
    /* Berita */
    .berita-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        height: 100%;
    }
    .berita-card img {
        width: 100%;
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
    /* berita new */
    .berita-besar {
        display: flex;
        flex-direction: column;
    }
    .berita-besar img {
        height: 350px;
        object-fit: cover;
    }
    /* berita mini */
    .berita-card:not(.berita-besar) img {
        height: 200px;
        object-fit: cover;
    }
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        <div class="d-flex flex-wrap gap-2 mb-3 align-items-center">
            {{-- SEARCH BERITA --}}
            <div class="input-group">
                <span class="input-group-text bg-white">
                    <i class="fa fa-search text-muted"></i>
                </span>
                <input 
                    type="text"
                    class="form-control"
                    placeholder="Cari judul berita...">
            </div>
            {{-- TAMBAH BERITA --}}
            <a href="#" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                <span class="d-none d-md-inline">Tambah Berita</span>
            </a>
        </div>
        {{-- Daftar Berita --}}
        <div class="row flex-wrap g-3">
            <div class="col-md-3">
                <div class="berita-card h-100">
                    <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="">
                    <div class="isi">
                        <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                        <p class="text-muted small mb-1">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="#">Baca selengkapnya →</a>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item bg-info text-white rounded my-1" href="#">Edit</a></li>
                                    <li><a class="dropdown-item bg-danger text-white rounded my-1" href="#">Hapus</a></li>
                                </ul>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection