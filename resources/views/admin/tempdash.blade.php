<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aos-master/dist/aos.css') }}">
    <title>Tasty Food</title>
    <style>
        body {
            background-color: #f2f2f2;
        }
        /* SIDEBAR DESKTOP */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #000000;
            border-right: 1px solid #0e0e0e;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h5 {
            font-weight: 700;
            margin-bottom: 30px;
        }
        .sidebar a {
            text-decoration: none;
            color: #f2f2f2;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #ffffff;
            color: #000000;
        }
        .sidebar .logout {
            margin-top: auto;
        }
        /* CONTENT AREA */
        .content-wrapper {
            margin-left: 260px;
            padding: 0px;
        }
        /* OFFCANVAS MOBILE */
        .offcanvas {
            background-color: #0e0e0e;
            width: 280px;
        }
        .offcanvas-header {
            border-bottom: 1px solid #0e0e0e;
        }
        .mobile-menu a {
            text-decoration: none;
            color: #f2f2f2;
            padding: 12px 14px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .mobile-menu a:hover,
        .mobile-menu a.active {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
        }
        .mobile-menu .logout {
            margin-top: auto;
        }
        /* MOBILE */
        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }
            .content-wrapper {
                margin-left: 0;
                padding: 0px;
            }
        }
        .alert {
            animation: slideIn .3s ease;
        }
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    {{-- FLOATING ALERT --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; width: 350px;">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                <strong>Berhasil!</strong><br>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ERROR --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <strong>Gagal!</strong><br>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <strong>Error:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

    </div>
    {{-- NAVBAR MOBILE --}}
    <nav class="navbar navbar-light bg-white border-bottom d-lg-none">
        <div class="container-fluid">
            <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                <div class="fa-solid fa-bars"></div>
            </button>
            <span class="fw-bold text-white">Admin Dashboard</span>
        </div>
    </nav>
    {{-- OFFCANVAS MOBILE --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold text-white">Tasty Food Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column mobile-menu">
            <a href="{{ route('admin') }}"
            class="{{ request()->routeIs('admin') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
            <a href="{{ route('admin.tentang') }}"
            class="{{ request()->routeIs('admin.tentang') ? 'active' : '' }}">
                <i class="fa-solid fa-circle-info"></i> Tentang
            </a>
            <a href="{{ route('admin.berita') }}"
            class="{{ request()->routeIs('admin.berita*') || request()->routeIs('Adetberita') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Berita
            </a>
            <a href="{{ route('admin.galeri') }}"
            class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                <i class="fa-solid fa-images"></i> Galeri
            </a>
            <a href="{{ route('admin.kontak') }}"
            class="{{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Pesan
            </a>
            <a href="{{ route('admin.menu') }}"
            class="{{ request()->routeIs('admin.menu*') ? 'active' : '' }}">
                <i class="fa-solid fa-bowl-food"></i> Menu
            </a>
            <div class="logout d-flex flex-column">
                <div class="d-flex justify-content-start align-items-center mb-3">
                    <i class="fa-regular fa-circle-user fs-1 text-white"></i>
                    <div class="px-2 pt-3 align-items-center text-white">
                        <span class="fw-bold">{{ $adminGlobal->name }}</span>
                        <p class="text-white">{{ $adminGlobal->email }}</p>
                    </div>
                </div>
                <a href="{{ route('logout.authenticate') }}"
                class="btn btn-danger text-white w-100 d-flex justify-content-center align-items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </div>
    </div>
    {{-- SIDEBAR DESKTOP --}}
    <div class="sidebar d-none d-lg-flex">
        <h5 class="text-white">Tasty Food Admin</h5>
        <a href="{{ route('admin') }}"
        class="{{ request()->routeIs('admin') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>
        <a href="{{ route('admin.tentang') }}"
        class="{{ request()->routeIs('admin.tentang') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-info"></i> Tentang
        </a>
        <a href="{{ route('admin.berita') }}"
        class="{{ request()->routeIs('admin.berita*') || request()->routeIs('Adetberita') ? 'active' : '' }}">
            <i class="fa-solid fa-newspaper"></i> Berita
        </a>
        <a href="{{ route('admin.galeri') }}"
        class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
            <i class="fa-solid fa-images"></i> Galeri
        </a>
        <a href="{{ route('admin.kontak') }}"
        class="{{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
            <i class="fa-solid fa-envelope"></i> Pesan
        </a>
        <a href="{{ route('admin.menu') }}"
        class="{{ request()->routeIs('admin.menu*') ? 'active' : '' }}">
            <i class="fa-solid fa-bowl-food"></i> Menu
        </a>
        <div class="logout d-flex flex-column">
            <div class="d-flex justify-content-start align-items-center mb-3">
                {{-- nahh yang ini --}}
                <i class="fa-regular fa-circle-user fs-1 text-white"
                    style="cursor:pointer"
                    data-bs-toggle="modal"
                    data-bs-target="#profileModal">
                </i>
                <div class="px-2 pt-3 align-items-center text-white">
                    <span class="fw-bold">{{ $adminGlobal->name }}</span>
                    <p class="text-white">{{ $adminGlobal->email }}</p>
                </div>
            </div>
            <a href="{{ route('logout.authenticate') }}"
            class="btn btn-danger w-100 text-white d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </div>
    {{-- CONTENT --}}
    <div class="content-wrapper">
        @yield('content')
    </div>
    <div class="modal fade" id="profileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('admin.updateA') }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ $adminGlobal->name }}">
                        </div>

                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="nomor_hp" class="form-control"
                                value="{{ $adminGlobal->nomor_hp }}">
                        </div>

                        <div class="mb-3">
                            <label>Email (opsional)</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $adminGlobal->email }}">
                        </div>

                        <div class="mb-3">
                            <label>Password (opsional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const previewIcon = document.getElementById('previewIcon');

    if (!imageInput) return;

    imageInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (event) {
            previewImage.src = event.target.result;
            previewImage.classList.remove('d-none');
            previewIcon.classList.add('d-none');
        };
        reader.readAsDataURL(file);
    });
});
setTimeout(() => {
    let alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        let bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 4000); // 4 detik hilang
</script>