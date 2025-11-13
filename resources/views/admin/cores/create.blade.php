@extends('layouts.admin')

@section('title', 'Cadastrar Cor')

@section('content')
<div class="container">

    <h2 class="mb-4">➕ Nova Cor</h2>

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
        <form action="{{ route('admin.cores.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome da Cor</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Salvar</button>
                <a href="{{ route('admin.cores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>

</div>
@endsection
