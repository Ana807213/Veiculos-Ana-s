<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos - Painel Ana's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary: #853362; }
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: var(--primary);
            color: white;
            padding-top: 30px;
        }
        .sidebar a {
            color: white;
            display: block;
            text-decoration: none;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #6a2a50;
        }
        .logout-btn {
            margin-top: 20px;
            width: 100%;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: var(--primary);
            padding: 8px;
        }
        .logout-btn:hover {
            background: #f8d7da;
        }
        .table th {
            background-color: var(--primary);
            color: white;
        }
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        .btn-primary-custom:hover {
            background-color: #6a2a50;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 sidebar">
            <h3 class="text-center mb-4">Painel Ana's</h3>
            <a href="{{ url('/admin') }}">🏠 Dashboard</a>
            <a href="{{ route('admin.produtos') }}">📦 Produtos</a>
          

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Sair</button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Gerenciar Produtos</h2>
                <a href="#" class="btn btn-primary-custom">
                    ➕ Adicionar Produto
                </a>
            </div>

            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
               <tbody>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->categoria }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


            </table>
        </main>
    </div>
</div>
</body>
</html>
