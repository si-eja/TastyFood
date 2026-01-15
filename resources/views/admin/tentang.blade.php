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
            <div class="bg bg-costume shadow p-2 mb-2 rounded">
                <h4>{{ $tentang->about_title }}</h4>
                <span class="fw-bold">{{ $tentang->about_desc_1 }}</span><br>
                <span>{{ $tentang->about_desc_2 }}</span>
                <div class="row g-1 mt-2">
                    <div class="col-md-6 p-2">
                        <img src="{{ asset('ASET/'.$tentang->about_image_1) }}"
                            class="object-fit-cover rounded-4"
                            style="width:100%; height:100%; max-height:390px;">
                    </div>
                    <div class="col-md-6 p-2">
                        <img src="{{ asset('ASET/'.$tentang->about_image_2) }}"
                            class="object-fit-cover rounded-4"
                            style="width:100%; height:100%; max-height:390px;">
                    </div>
                </div>
            </div>

            <div class="row g-1">
                <div class="col-md-6 p-2 bg-costume shadow rounded">
                    <div class="p-2" style="height: 120px; overflow-x: auto;">
                        <h4>Visi</h4>
                        <span>{{ $tentang->visi_desc_1 }}</span><br>
                        <span>{{ $tentang->visi_desc_2 }}</span>
                    </div>
                    <div class="row p-2">
                        <div class="col-6">
                            <img src="{{ asset('storage/tentang/'.$tentang->visi_image_1) }}"
                                class="object-fit-cover rounded-4"
                                style="width:100%; height:100%; max-height:280px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('storage/tentang/'.$tentang->visi_image_2) }}"
                                class="object-fit-cover rounded-4"
                                style="width:100%; height:100%; max-height:280px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-2 bg bg-costume shadow rounded">
                    <div class="p-2" style="height: 120px; overflow-x: auto;">
                        <h4>Misi</h4>
                        <span>{{ $tentang->misi_desc_1 }}</span><br>
                        <span>{{ $tentang->misi_desc_2 }}</span>
                    </div>
                    <div class="col-12 p-2">
                        <img src="{{ asset('storage/tentang/'.$tentang->misi_image) }}"
                            class="object-fit-cover rounded-4"
                            style="width:100%; height:100%; max-height:280px;">
                    </div>
                </div>
            </div>
        </div>

        {{-- ================== BUTTON ================== --}}
        <div class="bg bg-light rounded p-2 shadow mt-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <button type="button" class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTentang">
                        Edit Tentang
                    </button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalVisi">
                        Edit Visi
                    </button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="w-100 fw-bold btn btn-warning rounded"
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
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tentang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-6 d-flex flex-column">
                                <span class="rounded p-1 bg-black text-center text-white mb-2 d-inline-block w-100">
                                    Foto 1
                                </span>
                                {{-- untuk preview gambar --}}
                                <div id="preview_about_image_1"
                                    class="rounded object-fit-cover mb-2"
                                    style="
                                        max-height:210px;
                                        height:210px;
                                        background-size:cover;
                                        background-position:center;
                                        background-image:url('{{ asset('storage/tentang/'.$tentang->about_image_1) }}');
                                    ">
                                </div>
                                {{-- input image --}}
                                <input type="file" name="about_image_1" id="" class="form-control" onchange="previewImage(this, 'preview_about_image_1')">
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <span class="rounded p-1 bg-black text-center text-white mb-2 d-inline-block w-100">
                                    Foto 2
                                </span>
                                {{-- untuk preview gambar --}}
                                <div id="preview_about_image_2"
                                    class="rounded object-fit-cover mb-2"
                                    style="
                                        max-height:210px;
                                        height:210px;
                                        background-size:cover;
                                        background-position:center;
                                        background-image:url('{{ asset('storage/tentang/'.$tentang->about_image_2) }}');
                                    ">
                                </div>
                                {{-- input image --}}
                                <input type="file" name="about_image_2" id="" class="form-control" onchange="previewImage(this, 'preview_about_image_2')">
                            </div>
                        </div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================== MODAL VISI ================== --}}
        <div class="modal fade" id="modalVisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Visi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-6 d-flex flex-column">
                                <span class="rounded p-1 bg-black text-center text-white mb-2 d-inline-block w-100">
                                    Foto 1
                                </span>
                                {{-- untuk preview gambar --}}
                                <div id="preview_visi_image_1"
                                    class="rounded object-fit-cover mb-2"
                                    style="
                                        max-height:210px;
                                        height:210px;
                                        background-size:cover;
                                        background-position:center;
                                        background-image:url('{{ asset('storage/tentang/'.$tentang->visi_image_1) }}');
                                    ">
                                </div>
                                {{-- input image --}}
                                <input type="file" name="visi_image_1" id="" class="form-control" onchange="previewImage(this, 'preview_visi_image_1')">
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <span class="rounded p-1 bg-black text-center text-white mb-2 d-inline-block w-100">
                                    Foto 2
                                </span>
                                {{-- untuk preview gambar --}}
                                <div id="preview_visi_image_2"
                                    class="rounded object-fit-cover mb-2"
                                    style="
                                        max-height:210px;
                                        height:210px;
                                        background-size:cover;
                                        background-position:center;
                                        background-image:url('{{ asset('storage/tentang/'.$tentang->visi_image_2) }}');
                                    ">
                                </div>
                                {{-- input image --}}
                                <input type="file" name="visi_image_2" id="" class="form-control" onchange="previewImage(this, 'preview_visi_image_2')">
                            </div>
                        </div>
                        <textarea name="visi_desc_1" class="form-control mb-2" rows="4"
                            placeholder="Visi 1">{{ $tentang->visi_desc_1 }}</textarea>

                        <textarea name="visi_desc_2" class="form-control" rows="4"
                            placeholder="Visi 2">{{ $tentang->visi_desc_2 }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================== MODAL MISI ================== --}}
        <div class="modal fade" id="modalMisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ url('/admin/tentang') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Misi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column col-12 mb-2">
                            <span class="rounded p-1 bg-black text-center text-white mb-2 d-inline-block w-100">
                                Foto
                            </span>
                            {{-- untuk preview gambar --}}
                            <div id="preview_misi_image"
                                class="rounded object-fit-cover mb-2"
                                style="
                                    max-height:210px;
                                    height:210px;
                                    background-size:cover;
                                    background-position:center;
                                    background-image:url('{{ asset('storage/tentang/'.$tentang->misi_image) }} ');
                                ">
                            </div>
                            {{-- input image --}}
                            <input type="file" name="misi_image" id="" class="form-control" onchange="previewImage(this, 'preview_misi_image')">
                        </div>
                        <textarea name="misi_desc_1" class="form-control mb-2" rows="4"
                            placeholder="Misi 1">{{ $tentang->misi_desc_1 }}</textarea>

                        <textarea name="misi_desc_2" class="form-control" rows="4"
                            placeholder="Misi 2">{{ $tentang->misi_desc_2 }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<script>
function previewImage(input, previewId) {
    if (!input.files || !input.files[0]) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        const preview = document.getElementById(previewId);
        preview.style.backgroundImage = `url('${e.target.result}')`;
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
@endsection
