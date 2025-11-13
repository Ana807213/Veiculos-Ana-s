@extends('layouts.admin')

@section('title', 'Veículos')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">🚗 Veículos</h2>

        <a href="{{ route('admin.veiculos.create') }}" class="btn btn-primary-custom">
            <i class="fa fa-plus"></i> Novo Veículo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-body p-0">
            <table class="table table-hover table-striped align-middle m-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Foto</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Ano</th>
                        <th>Preço</th>
                        <th class="text-center" style="width: 200px;">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($veiculos as $veiculo)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $veiculo->id }}</span></td>

                            <td>
                                <img src="{{ $veiculo->foto1 }}" 
                                     alt="foto" 
                                     width="60" height="50"
                                     style="object-fit: cover; border-radius: 5px;">
                            </td>

                            <td>{{ $veiculo->marca->nome ?? '-' }}</td>
                            <td>{{ $veiculo->modelo->nome ?? '-' }}</td>
                            <td>{{ $veiculo->cor->nome ?? '-' }}</td>
                            <td>{{ $veiculo->ano }}</td>
                            <td>R$ {{ number_format($veiculo->preco, 2, ',', '.') }}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.veiculos.show', $veiculo) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.veiculos.edit', $veiculo) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.veiculos.destroy', $veiculo) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Deseja excluir este veículo?')">
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
                            <td colspan="8" class="text-center text-muted py-4">
                                Nenhum veículo cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
