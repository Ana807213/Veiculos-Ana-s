@extends('layouts.admin')

@section('title', 'Editar Cor')

@section('content')
<div class="container">

    <h2 class="mb-4">✏️ Editar Cor</h2>

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
        <form action="{{ route('admin.cores.update', $cor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome da Cor</label>
                <input type="text" name="nome" class="form-control" value="{{ $cor->nome }}" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Atualizar</button>
                <a href="{{ route('admin.cores.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

        </form>
    </div>

</div>
@endsection
