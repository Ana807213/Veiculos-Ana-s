@extends('layouts.admin')

@section('title', 'Editar Modelo')

@section('content')
<div class="container">

    <h2 class="mb-4">✏️ Editar Modelo</h2>

    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <i class="fa fa-exclamation-circle"></i> Corrija os erros abaixo:
            <ul class="mt-2">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('admin.modelos.update', $modelo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome do Modelo</label>
                <input type="text" name="nome" class="form-control" value="{{ $modelo->nome }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Marca</label>
                <select name="marca_id" class="form-select" required>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ $modelo->marca_id == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Atualizar</button>
                <a href="{{ route('admin.modelos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

        </form>
    </div>

</div>
@endsection
