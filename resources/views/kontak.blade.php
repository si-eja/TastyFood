@extends('temppage')
@section('content')
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Kontak Kami</h1>
    </div>
</section>
<section class="bg-body">
    <div class="container py-5">
        <h3 class="fw-bold my-4 mb-5">KONTAK KAMI</h3>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <input type="text" name="subject" class="form-control mb-3 custom-input" placeholder="Subject">
                    <input type="text" name="name" class="form-control mb-3 custom-input" placeholder="Name">
                    <input type="email" name="email" class="form-control custom-input" placeholder="Email">
                </div>
                <div class="col-12 col-md-6">
                    <textarea name="message" class="form-control custom-input h-100"
                        rows="7"
                        placeholder="Message"></textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-dark w-100 py-3 fw-semibold">
                    KIRIM
                </button>
            </div>
        </form>
        <div class="row text-center mt-5">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('ASET/Group 66.png') }}" alt="" style="height: 60px; width: 60px;" class="mb-3">
                <p class="fw-bold mb-1">EMAIL</p>
                <p class="mb-0">tastyfood@gmail.com</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('ASET/Group 67.png') }}" alt="" style="height: 60px; width: 60px;" class="mb-3">
                <p class="fw-bold mb-1">PHONE</p>
                <p class="mb-0">+62 812 3456 7890</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('ASET/Group 68.png') }}" alt="" style="height: 60px; width: 60px;" class="mb-3">
                <p class="fw-bold mb-1">LOCATION</p>
                <p class="mb-0">Kota Bandung, Jawa Barat</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-costume">
    <div class="container py-5"></div>
</section>
@endsection