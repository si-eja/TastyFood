<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aos-master/dist/aos.css') }}">
    <title>Tasty Food</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }
        .nav-link {
            text-transform: uppercase;
            font-size: 14px;
            margin-left: 15px;
        }
        /* NAVBAR DEFAULT */
        .navbar-custom {
            transition: all 0.3s ease;
            background: transparent;
        }
        /* NAVBAR SAAT SCROLL */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding-top: 12px !important;
            padding-bottom: 12px !important;
        }
        /* NAVBAR COLLAPSE MOBILE */
        .navbar-collapse.show {
            background-color: var(--bs-secondary);
            padding: 1rem;
            border-radius: 12px;
            margin-top: 15px;
        }
        .navbar-collapse.show .nav-link {
            color: #fff !important;
        }

        .navbar-collapse.show .nav-link:hover {
            opacity: 0.8;
        }
        /* efek hover link */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #000;
            transition: 0.3s;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom py-4">
        <div class="container">
            <a class="navbar-brand" href="#">TASTY FOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Konten --}}
    @yield('content')
    <footer class="container-fluid bg-black">
        <div class="container py-3">
            <div class="row text-white mt-3" style="padding: 6% 0%">
                <div class="col-md-5">
                    <h2 class="fw-bold">Tasty Food</h2>
                    <p class="mt-4 fw-lighter opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, distinctio animi ullam similique blanditiis praesentium harum quisquam, recusandae reprehenderit, odit temporibus exercitationem. Pariatur commodi, vitae dolores adipisci eaque provident. Quasi.</p>
                    <div class="d-flex gap-3">
                        <img src="{{ asset('ASET/001-facebook.png') }}" alt="" style="width: 9%; height: 9%;">
                        <img src="{{ asset('ASET/002-twitter.png') }}" alt="" style="width: 9%; height: 9%;">
                    </div>
                </div>
                <div class="col-md-2">
                    <h4 class="fw-bold mb-3">Useful Link</h4>
                    <ul class="list-unstyled">
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Blog</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Hewan</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Galeri</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Testimoni</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4 class="fw-bold">Privacy</h4>
                    <ul class="list-unstyled">
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Karir</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Tentang Kami</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Kontak Kami</a></li>
                        <li class="mt-3"><a href="#" class="fw-bold text-white text-decoration-none">Servis</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="fw-bold">Contact Info</h4>
                    <ul class="list-unstyled">
                        <li class="mt-3 d-flex"><img src="{{ asset('ASET/Group 66.png') }}" alt="" style="width: 28px; height: 28px;"><p>tastyfood@gmail.com</p></li>
                        <li class="mt-3 d-flex"><img src="{{ asset('ASET/Group 67.png') }}" alt="" style="width: 28px; height: 28px;"><p>+62 812 3456 7890</p></li>
                        <li class="mt-3 d-flex"><img src="{{ asset('ASET/Group 68.png') }}" alt="" style="width: 28px; height: 28px;"><p>Bandung, Jawa Barat</p></li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-white fw-bold">
                <p>Copyrigth &copy; {{ date('Y') }} All right seserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar-custom');

        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>