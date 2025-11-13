<header id="header-wrap">
    <div class="container d-flex justify-content-center">
        <div class="site-branding">
            <a href="{{ route('public.index') }}">
                <img src="{{ asset('images/veiculos-ana.jpeg') }}" 
                     alt="Veículos Ana's" 
                     class="logo-img" 
                     loading="lazy">
            </a>
        </div>
    </div>
</header>

<nav class="main-navigation d-none d-lg-block">
    <div class="container">
        <ul class="nav-list d-flex justify-content-center">
            <li><a href="{{ route('public.index') }}">Home</a></li>
            <li><a href="{{ route('public.index') }}">Todos os Veículos</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </div>
</nav>
