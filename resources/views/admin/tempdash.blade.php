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
            background-color: #f8f9fa;
        }
        /* SIDEBAR DESKTOP */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #ffffff;
            border-right: 1px solid #e5e5e5;
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
            color: #333;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #000;
            color: #fff;
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
            width: 280px;
        }
        .offcanvas-header {
            border-bottom: 1px solid #e5e5e5;
        }
        .mobile-menu a {
            text-decoration: none;
            color: #333;
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
            background-color: #000;
            color: #fff;
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
    </style>
</head>
<body>
    {{-- NAVBAR MOBILE --}}
    <nav class="navbar navbar-light bg-white border-bottom d-lg-none">
        <div class="container-fluid">
            <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                <div class="fa-solid fa-bars"></div>
            </button>
            <span class="fw-bold">Admin Dashboard</span>
        </div>
    </nav>
    {{-- OFFCANVAS MOBILE --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold">Tasty Food Admin</h5>
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
            class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
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
            <div class="logout">
                <a href="#"
                class="btn btn-danger text-white w-100 d-flex justify-content-center align-items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </div>
    </div>
    {{-- SIDEBAR DESKTOP --}}
    <div class="sidebar d-none d-lg-flex">
        <h5>Tasty Food Admin</h5>
        <a href="{{ route('admin') }}"
        class="{{ request()->routeIs('admin') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>
        <a href="{{ route('admin.tentang') }}"
        class="{{ request()->routeIs('admin.tentang') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-info"></i> Tentang
        </a>
        <a href="{{ route('admin.berita') }}"
        class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
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
        <div class="logout">
            <a href="#"
            class="btn btn-danger w-100 text-white d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </div>
    {{-- CONTENT --}}
    <div class="content-wrapper">
        @yield('content')
    </div>
</body>
</html>
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>