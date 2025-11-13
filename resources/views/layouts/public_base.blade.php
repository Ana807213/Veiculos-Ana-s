<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', "Veículos Ana's")</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>

        :root {
            --primary-color: #853362;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
        }

        /* HEADER */
        #header-wrap {
            background: var(--primary-color);
            padding: 25px 0;
            text-align: center;
        }

        .logo-img {
            width: 300px;
            height: auto;
        }

        /* MENU */
        .main-navigation {
            background: var(--primary-color);
        }

        .nav-list li a {
            color: #fff;
            padding: 15px 25px;
            display: block;
            font-weight: 500;
            text-transform: uppercase;
        }

        /* HERO BANNER */
        #hero-banner {
            width: 100%;
            height: 450px;
            background-image: url("{{ asset('images/banner-carro.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 50px;
        }

        #hero-banner::before {
            content:'';
            position:absolute;
            inset:0;
            background: rgba(0,0,0,.4);
        }

        #hero-banner .banner-content {
            position: relative;
            z-index: 2;
            color:#fff;
            max-width: 600px;
        }

    </style>

    @stack('styles')
</head>
<body>

{{-- HEADER --}}
<header id="header-wrap">
    <a href="{{ route('public.index') }}">
        <img src="{{ asset('images/veiculos-ana.jpeg') }}" class="logo-img" alt="Veículos Ana's">
    </a>
</header>

{{-- MENU --}}
<nav class="main-navigation d-none d-lg-block">
    <div class="container">
        <ul class="nav-list d-flex justify-content-center list-unstyled mb-0">
            <li><a href="{{ route('public.index') }}">Início</a></li>
            <li><a href="{{ route('public.index') }}">Veículos</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </div>
</nav>

{{-- TODAS AS PÁGINAS RENDERIZAM AQUI --}}
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
