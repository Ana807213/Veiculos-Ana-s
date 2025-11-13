<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Veículos Ana's</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* CSS Base do Site Público (Cor: #853362) */
        :root {
            --primary-color: #853362; 
            --text-color: #333;
            --light-text-color: #fff; 
            --background-light: #853362; 
        }

        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #fff; }
        a { text-decoration: none; color: var(--text-color); }

        /* HEADER */
        #header-wrap { border-bottom: 1px solid #eee; }
        .logo-text { font-size: 24px; font-weight: 700; color: var(--primary-color) !important; text-transform: uppercase; }
        .header-search-form { flex-grow: 1; max-width: 500px; margin: 0 40px; }
        .search-wrap { border: 1px solid #ddd; border-radius: 50px; overflow: hidden; }
        .search-wrap .form-control { border: none; box-shadow: none; height: 40px; padding: 0 15px; }
        .search-btn { background-color: var(--primary-color); color: #fff; border: none; height: 40px; padding: 0 15px; cursor: pointer; transition: background-color 0.3s; }
        .search-btn:hover { background-color: #6a2a50; }
        .header-icon a { font-size: 18px; color: var(--text-color); transition: color 0.3s; }
        .header-icon a:hover { color: var(--primary-color); }
        .cart-icon { position: relative; }
        .cart-icon span { 
            position: absolute; top: -10px; right: -10px; 
            background-color: var(--primary-color); color: #fff; 
            font-size: 10px; border-radius: 50%; padding: 2px 5px; line-height: 1; 
        }

        /* NAVEGAÇÃO SECUNDÁRIA */
        .main-navigation { background-color: var(--background-light); border-top: 1px solid #eee; }
        .nav-list { list-style: none; padding: 0; margin: 0; }
        .nav-list li a { 
            display: block; padding: 15px 20px; font-weight: 500; 
            text-transform: uppercase; font-size: 14px; color: #fff; 
            transition: opacity 0.3s; 
        }
        .nav-list li a:hover { color: #fff; opacity: 0.8; }

        /* --- ESTILOS DO FORMULÁRIO --- */
        .login-container {
            min-height: 80vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
            background-color: #f4f6f9; 
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        .login-card h2 {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.3s;
        }

        .btn-primary-custom:hover, .btn-primary-custom:focus {
            background-color: #6a2a50;
            border-color: #6a2a50;
        }
        
        /* Estilos de Erro do Laravel */
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875em;
        }


        /* MOBILE E RESPONSIVIDADE */
        .menu-toggle { background: none; border: none; font-size: 20px; color: var(--text-color); cursor: pointer; }
        @media (max-width: 991px) {
            .main-navigation { display: none; }
            .header-search-form { display: none !important; }
            .login-container { padding: 30px 15px; }
            .login-card { padding: 30px; }
        }
    </style>
</head>
<body>

    <header id="header-wrap" class="py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="site-branding">
                <a class="logo-text" href="{{ url('/') }}">Veículos Ana's</a>
            </div>
            <div class="header-search-form d-none d-lg-block">
                <div class="search-wrap d-flex align-items-center">
                    <input type="text" class="form-control" placeholder="Digite e pressione Enter...">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="header-icon d-flex align-items-center">
                <a href="#" class="mx-3"><i class="far fa-heart"></i></a>
                <a href="{{ route('login') }}" class="mx-3"><i class="fas fa-user"></i></a> 
                <a href="#" class="mx-3 cart-icon"><i class="fas fa-shopping-cart"></i> <span>0</span></a>
                <button class="menu-toggle d-block d-lg-none ms-3"><i class="fas fa-bars"></i></button>
            </div>
        </div>
    </header>

    <nav class="main-navigation d-none d-lg-block">
        <div class="container">
            <ul class="nav-list d-flex justify-content-center">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="login-container container">
        <div class="login-card">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf 
                
                
                   

                <div class="mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i> E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fas fa-lock me-2"></i> Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label"><i class="fas fa-lock me-2"></i> Confirmar Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-user-plus me-2"></i> Cadastrar
                    </button>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}" class="text-muted" style="color: var(--primary-color) !important;">
                        Já tem conta? Clique para Login
                    </a>
                </div>

            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>