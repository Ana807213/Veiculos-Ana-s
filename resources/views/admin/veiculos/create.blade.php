@extends('layouts.admin')

@section('title', 'Cadastrar Veículo')

@section('content')
<div class="container">

    <h2 class="mb-4">➕ Novo Veículo</h2>

    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <i class="fa fa-exclamation-circle"></i> Corrija os erros:
            <ul class="mt-2">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('admin.veiculos.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Marca</label>
                    <select name="marca_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Modelo</label>
                    <select name="modelo_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        @foreach($modelos as $modelo)
                            <option value="{{ $modelo->id }}">{{ $modelo->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Cor</label>
                    <select name="cor_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        @foreach($cores as $cor)
                            <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Ano</label>
                    <input type="number" name="ano" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Preço (R$)</label>
                    <input type="text" name="preco" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Foto 1 (URL)</label>
                    <input type="url" name="foto1" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Foto 2 (URL)</label>
                    <input type="url" name="foto2" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Foto 3 (URL)</label>
                    <input type="url" name="foto3" class="form-control" required>
                </div>

            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary-custom">Salvar</button>
                <a href="{{ route('admin.veiculos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>
    </div>

</div>
@endsection
