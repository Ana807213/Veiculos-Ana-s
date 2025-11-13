<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel Administrativo - Ana’s')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #853362;
            --hover: #6a2a50;
            --light-bg: #f8f9fa;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
        }

        /* Layout */
        .sidebar {
            min-height: 100vh;
            background-color: var(--primary);
            color: #fff;
            padding: 30px 20px;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar h3 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 35px;
        }

        /* Links */
        .menu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .menu-link:hover,
        .menu-link.active {
            background-color: var(--hover);
            text-decoration: none;
        }

        /* Botão Logout */
        .logout-btn {
            border: none;
            background: #fff;
            color: var(--primary);
            padding: 10px;
            border-radius: 6px;
            width: 100%;
            font-weight: 600;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background: #f8d7da;
        }

        /* Cabeçalho */
        .top-header {
            background-color: #ffffff;
            padding: 18px 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-radius: 0 0 8px 8px;
        }

        .content-area {
            padding: 20px 40px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <aside class="col-md-3 col-lg-2 sidebar">

            <h3>Painel Ana’s</h3>

            <a href="{{ url('/admin') }}"
               class="menu-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <a href="{{ route('admin.veiculos.index') }}"
               class="menu-link {{ request()->is('admin/veiculos*') ? 'active' : '' }}">
                <i class="fa-solid fa-car"></i> Veículos
            </a>

            <a href="{{ route('admin.marcas.index') }}"
               class="menu-link {{ request()->is('admin/marcas*') ? 'active' : '' }}">
                <i class="fa-solid fa-industry"></i> Marcas
            </a>

            <a href="{{ route('admin.modelos.index') }}"
               class="menu-link {{ request()->is('admin/modelos*') ? 'active' : '' }}">
                <i class="fa-solid fa-tags"></i> Modelos
            </a>

            <a href="{{ route('admin.cores.index') }}"
               class="menu-link {{ request()->is('admin/cores*') ? 'active' : '' }}">
                <i class="fa-solid fa-palette"></i> Cores
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair
                </button>
            </form>
        </aside>

        <!-- Main content -->
        <main class="col-md-9 col-lg-10">

            <div class="top-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">Bem-vinda, {{ Auth::user()->email }}</h4>
                <span class="text-muted">Painel Administrativo</span>
            </div>

            <div class="content-area">
                @yield('content')
            </div>

        </main>

    </div>
</div>

</body>
</html>
