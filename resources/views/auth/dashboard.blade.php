<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Veículos Ana's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #853362;
        }
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: var(--primary-color);
            color: #fff;
            padding-top: 30px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #6a2a50;
        }
        .content {
            padding: 30px;
        }
        .logout-btn {
            background-color: #fff;
            color: var(--primary-color);
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <h3 class="text-center mb-4">Painel Ana's</h3>
            <a href="#">📦 Produtos</a>
            <a href="#">🛍️ Pedidos</a>
            <a href="#">👥 Clientes</a>
            <a href="#">⚙️ Configurações</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Sair</button>
            </form>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-9 col-lg-10 content">
            <h2>Bem-vinda, {{ Auth::user()->email }} 👋</h2>
            <p>Esta é sua área administrativa. Aqui você poderá:</p>
            <ul>
                <li>Adicionar novos produtos</li>
                <li>Editar produtos existentes</li>
                <li>Excluir produtos</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
