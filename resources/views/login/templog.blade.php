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
        }y
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
    <nav class="navbar navbar-expand-lg navbar-custom py-4">
        <div class="container">
            <a class="navbar-brand" href="#">TASTY FOOD</a>
        </div>
    </nav>
    {{-- Konten --}}
    @yield('content')
</body>
</html>
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>