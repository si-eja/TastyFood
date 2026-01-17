@extends('login.templog')
@section('content')
<style>
    .login-wrapper {
        display: flex;
        background: #000;
        overflow: hidden;
        min-height: 580px;
    }
    .login-image {
        flex: 1;
        position: relative;
        background-image: url('{{ asset('ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    .login-image::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
    }
    .login-image-content {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 60px;
        color: #fff;
        z-index: 1;
    }
    .login-form {
        width: 420px;
        background: #000;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center; /* 🔥 ini penting */
        padding: 60px 40px;
    }
    @media (max-width: 768px) {
        .container {
            padding: 0px 12px;
        }
        .login-wrapper {
            min-height: unset;
            flex-direction: column;
        }
        .login-image {
            height: 200px; /* ukuran kecil */
            flex: unset;
            border-radius: 12px 12px 0 0;
        }
        .login-image-content {
            padding: 20px;
            justify-content: flex-end;
        }
        .login-form {
            width: 100%;
            padding: 32px 20px;
            border-radius: 0 0 12px 12px;
        }
    }
</style>
<div class="container">
    <div class="login-wrapper my-5 rounded-3 shadow">
        {{-- IMAGE --}}
        <div class="login-image rounded-start-3">
            <div class="login-image-content">
                <h2 class="fw-bold mb-2">Selamat Datang di Tasty Food</h2>
                <p class="opacity-75">
                    Kelola konten dengan mudah
                </p>
            </div>
        </div>
        {{-- FORM --}}
        <div class="login-form rounded-end-3">
            <div class="w-100">
                <h3 class="fw-bold mb-4">Admin Login</h3>
                <form action="{{ route('login.authenticate') }}" method="POST">
                    @csrf
                    {{-- USERNAME --}}
                    <div class="mb-3">
                        <label class="form-label">Email / Nomor HP</label>
                        <input
                            type="text"
                            name="login"
                            value="{{ old('login') }}"
                            class="form-control bg-dark text-white border-0 @error('login') is-invalid @enderror"
                            placeholder="Masukkan email atau nomor HP"
                        >
                        @error('login')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control bg-dark text-white border-0 @error('password') is-invalid @enderror"
                            placeholder="Masukkan password"
                        >
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-light w-100 fw-semibold">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection