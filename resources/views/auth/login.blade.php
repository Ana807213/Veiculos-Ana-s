<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* === BASE === */
        :root {
            --primary-color: #853362; 
            --text-color: #333;
            --background-light: #853362; 
        }

        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #fff; }

        /* === CABEÇALHO === */
        #header-wrap {
            background-color: var(--primary-color);
            padding: 1.4rem 0; /* cabeçalho mais grosso */
            position: relative; /* necessário para posicionar o botão Home */
        }

        /* Home fica fixo à esquerda */
        .header-home-btn {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Logo centralizado de verdade */
        .header-logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-img {
            max-height: 80px;
            display: block;
        }

        .btn-outline-light {
            color: #fff;
            border-color: #fff;
            transition: 0.3s;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: var(--primary-color);
            transform: scale(1.07);
        }

        /* === NAVEGAÇÃO SECUNDÁRIA === */
        .main-navigation {
            background-color: var(--background-light);
            border-top: 1px solid #eee;
        }

        .nav-list li a {
            display: block;
            padding: 15px 20px;
            text-transform: uppercase;
            font-size: 14px;
            color: #fff;
            font-weight: 500;
        }

        /* === LOGIN === */
        .login-container {
            min-height: 60vh;
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

        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: 0.3s;
        }

        .btn-primary-custom:hover {
            background-color: #6a2a50;
        }

        /* === RESPONSIVO === */
        @media (max-width: 991px) {
            .main-navigation { display: none; }

            .header-home-btn {
                left: 10px;
            }

            .logo-img {
                max-height: 70px;
            }
        }

    </style>
</head>
<body>

    <!-- === CABEÇALHO === -->
    <header id="header-wrap">

        <!-- Botão Home fixo na esquerda -->
        <a href="{{ route('public.index') }}" class="btn btn-outline-light header-home-btn">
            <i class="fas fa-home me-2"></i> Home
        </a>

        <!-- Logo centralizado corretamente -->
        <div class="header-logo-container">
            <img src="{{ asset('images/veiculos-ana.jpeg') }}" 
                 alt="Veículos Ana's" 
                 class="logo-img"
                 loading="lazy">
        </div>

    </header>

    <!-- NAV (vazia) -->
    <nav class="main-navigation d-none d-lg-block">
        <div class="container">
            <ul class="nav-list d-flex justify-content-center">
                <!-- sem links -->
            </ul>
        </div>
    </nav>
    
    <div class="login-container container">
        <div class="login-card">
            <h2>Acesso Administrativo</h2>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-user me-2"></i> E-mail
                    </label>
                    <input type="email" class="form-control" id="email" name="email" required autocapitalize="none" spellcheck="false">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2"></i> Senha
                    </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-sign-in-alt me-2"></i> Entrar
                    </button>
                </div>

            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
