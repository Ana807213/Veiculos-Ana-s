@extends('layouts.admin')

@section('title', 'Cadastrar Marca')

@section('content')
<div class="container">

    <h2 class="mb-4">➕ Nova Marca</h2>

    <!-- Erros -->
    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <i class="fa fa-exclamation-triangle"></i> Verifique os erros:
            <ul class="mt-2">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card -->
    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('admin.marcas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome da Marca</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Salvar</button>
                <a href="{{ route('admin.marcas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

</div>
@endsection
