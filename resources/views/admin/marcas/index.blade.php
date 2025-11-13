@extends('layouts.admin')

@section('title', 'Gerenciar Marcas')

@section('content')
<div class="container">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">🏭 Marcas Cadastradas</h2>

        <a href="{{ route('admin.marcas.create') }}" class="btn btn-primary-custom">
            <i class="fa fa-plus"></i> Nova Marca
        </a>
    </div>

    <!-- Mensagem de Sucesso -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Tabela -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover table-striped m-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nome</th>
                        <th class="text-center" style="width: 180px;">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($marcas as $marca)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $marca->id }}</span></td>
                            <td class="fw-semibold">{{ $marca->nome }}</td>

                            <td class="text-center">

                                <!-- Botão Editar -->
                                <a href="{{ route('admin.marcas.edit', $marca) }}"
                                   class="btn btn-sm btn-warning me-1">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <!-- Botão Excluir -->
                                <form action="{{ route('admin.marcas.destroy', $marca) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta marca?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Nenhuma marca cadastrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
