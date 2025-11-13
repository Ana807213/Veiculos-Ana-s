@extends('layouts.admin')

@section('title', 'Cores')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">🎨 Cores</h2>

        <a href="{{ route('admin.cores.create') }}" class="btn btn-primary-custom">
            <i class="fa fa-plus"></i> Nova Cor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

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
                    @forelse ($cores as $cor)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $cor->id }}</span></td>
                            <td class="fw-semibold">{{ $cor->nome }}</td>

                            <td class="text-center">

                                <a href="{{ route('admin.cores.edit', $cor) }}"
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.cores.destroy', $cor) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Deseja excluir esta cor?')">
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
                                Nenhuma cor cadastrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
