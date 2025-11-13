@extends('layouts.admin')

@section('title', 'Editar Marca')

@section('content')
<div class="container">

    <h2 class="mb-4">✏️ Editar Marca</h2>

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
        <form action="{{ route('admin.marcas.update', $marca) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome da Marca</label>
                <input type="text" name="nome" value="{{ $marca->nome }}" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Atualizar</button>
                <a href="{{ route('admin.marcas.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

        </form>
    </div>

</div>
@endsection
