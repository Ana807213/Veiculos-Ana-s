<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', "Veículos Ana's")</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #853362;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
        }

        /* ===============================
                    HEADER
        ================================ */
        #header-wrap {
            background: var(--primary-color);
            padding: 18px 0;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.18);
            animation: fadeHeader .8s ease forwards;
        }

        @keyframes fadeHeader {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-img {
            width: 260px;
            height: auto;
        }

        /* ===============================
                    NAVBAR
        ================================ */
        .main-navigation {
            background: var(--primary-color);
            padding: 16px 0;
            border-top: 1px solid rgba(255,255,255,0.10);
            border-bottom: 1px solid rgba(255,255,255,0.10);
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
            animation: fadeNavbar .8s ease forwards;
        }

        @keyframes fadeNavbar {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .nav-list {
            gap: 26px;
        }

        .nav-list li a {
            color: #fff;
            padding: 12px 26px;
            display: block;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 12px;
            background: rgba(255,255,255,0.08);
            box-shadow: 0 3px 8px rgba(0,0,0,0.18);
            backdrop-filter: blur(3px);
            transition: .25s ease;
        }

        .nav-list li a:hover {
            background: rgba(255,255,255,0.22);
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 8px 18px rgba(0,0,0,0.22);
        }
    </style>

    @stack('styles')
</head>
<body>

<header id="header-wrap">
    <a href="{{ route('public.index') }}">
        <img src="{{ asset('images/veiculos-ana.jpeg') }}" class="logo-img" alt="Veículos Ana's">
    </a>
</header>

<nav class="main-navigation d-none d-lg-block">
    <div class="container">
        <ul class="nav-list d-flex justify-content-center list-unstyled mb-0">
            <li><a href="{{ route('public.index') }}">Início</a></li>
            <li><a href="{{ route('public.index') }}">Veículos</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </div>
</nav>

{{-- CONTEÚDO --}}
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
