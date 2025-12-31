@extends('admin.tempdash')
@section('content')

<style>
    .bg-costume{
        background-color: #f8f9fa;
    }
</style>

<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">

        {{-- ================== PREVIEW DATA ================== --}}
        <div class="bg bg-light rounded p-2 shadow">
            <div class="bg bg-costume shadow p-2 mb-2">
                <h4>{{ $tentang->about_title }}</h4>
                <span class="fw-bold">{{ $tentang->about_desc_1 }}</span><br>
                <span>{{ $tentang->about_desc_2 }}</span>
            </div>

            <div class="row px-1">
                <div class="col-md-6 p-2">
                    <div class="bg bg-costume p-2 shadow">
                        <h4>Visi</h4>
                        <span>{{ $tentang->visi_desc_1 }}</span><br>
                        <span>{{ $tentang->visi_desc_2 }}</span>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="bg bg-costume p-2 shadow">
                        <h4>Misi</h4>
                        <span>{{ $tentang->misi_desc_1 }}</span><br>
                        <span>{{ $tentang->misi_desc_2 }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================== BUTTON ================== --}}
        <div class="bg bg-light rounded p-2 shadow mt-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <button class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTentang">
                        Edit Tentang
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalVisi">
                        Edit Visi
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalMisi">
                        Edit Misi
                    </button>
                </div>
            </div>
        </div>

        {{-- ================== MODAL TENTANG ================== --}}
        <div class="modal fade" id="modalTentang" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tentang</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="about_title"
                            class="form-control mb-2"
                            value="{{ $tentang->about_title }}"
                            placeholder="Judul Tentang">

                        <textarea name="about_desc_1" class="form-control mb-2" rows="4"
                            placeholder="Deskripsi 1">{{ $tentang->about_desc_1 }}</textarea>

                        <textarea name="about_desc_2" class="form-control" rows="4"
                            placeholder="Deskripsi 2">{{ $tentang->about_desc_2 }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================== MODAL VISI ================== --}}
        <div class="modal fade" id="modalVisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Visi</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea name="visi_desc_1" class="form-control mb-2" rows="4"
                            placeholder="Visi 1">{{ $tentang->visi_desc_1 }}</textarea>

                        <textarea name="visi_desc_2" class="form-control" rows="4"
                            placeholder="Visi 2">{{ $tentang->visi_desc_2 }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================== MODAL MISI ================== --}}
        <div class="modal fade" id="modalMisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Misi</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea name="misi_desc_1" class="form-control mb-2" rows="4"
                            placeholder="Misi 1">{{ $tentang->misi_desc_1 }}</textarea>

                        <textarea name="misi_desc_2" class="form-control" rows="4"
                            placeholder="Misi 2">{{ $tentang->misi_desc_2 }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
