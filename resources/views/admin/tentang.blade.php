@extends('admin.tempdash')
@section('content')
<style>
    .bg-costume{
        background-color: #f8f9fa;
    }
</style>
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        <div class="bg bg-light rounded p-2 shadow">
            <div class="bg bg-costume shadow p-2 mb-2">
                <h4>Tentang Tasty Food</h4>
                <span class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span> <br>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span>
            </div>
            <div class="row px-1">
                <div class="col-md-6 p-2">
                    <div class="bg bg-costume p-2 shadow">
                        <h4>Visi</h4>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="bg bg-costume p-2 shadow">
                        <h4>Misi</h4>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores at, corrupti aliquid praesentium enim debitis est sint. Exercitationem deleniti molestias minus natus sapiente, eaque error amet quis? Ducimus, quaerat. Laborum!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg bg-light rounded p-2 shadow mt-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <button 
                        class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTentang">
                        Edit Tentang
                    </button>
                </div>
                <div class="col-md-4">
                    <button 
                        class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalVisi">
                        Edit Visi
                    </button>
                </div>
                <div class="col-md-4">
                    <button 
                        class="w-100 fw-bold btn btn-warning rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#modalMisi">
                        Edit Misi
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalTentang" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tentang Tasty Food</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="6" placeholder="Isi Tentang..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalVisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Visi</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="6" placeholder="Isi Visi..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMisi" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Misi</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="6" placeholder="Isi Misi..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-warning">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection