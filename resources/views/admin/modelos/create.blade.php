@extends('layouts.admin')

@section('title', 'Cadastrar Modelo')

@section('content')
<div class="container">

    <h2 class="mb-4">➕ Novo Modelo</h2>

    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <i class="fa fa-exclamation-triangle"></i> Verifique os erros abaixo:
            <ul class="mt-2">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('admin.modelos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome do Modelo</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Marca</label>
                <select name="marca_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Salvar</button>
                <a href="{{ route('admin.modelos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>

</div>
@endsection
