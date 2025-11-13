@extends('layouts.admin')

@section('title', 'Detalhes do Veículo')

@section('content')
<div class="container">

    <h2 class="mb-4">📄 Detalhes do Veículo</h2>

    <div class="card shadow-sm border-0 p-4">

        <div class="row">

            <!-- Fotos -->
            <div class="col-md-4 text-center">
                <img src="{{ $veiculo->foto1 }}" class="img-fluid rounded mb-3 shadow-sm">
                <img src="{{ $veiculo->foto2 }}" class="img-fluid rounded mb-3 shadow-sm">
                <img src="{{ $veiculo->foto3 }}" class="img-fluid rounded shadow-sm">
            </div>

            <!-- Informações -->
            <div class="col-md-8">

                <h3 class="fw-bold mb-3">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h3>

                <p><strong>Cor:</strong> {{ $veiculo->cor->nome }}</p>
                <p><strong>Ano:</strong> {{ $veiculo->ano }}</p>
                <p><strong>Preço:</strong> R$ {{ number_format($veiculo->preco, 2, ',', '.') }}</p>

                @if($veiculo->descricao)
                    <p><strong>Descrição:</strong> <br>{{ $veiculo->descricao }}</p>
                @endif

                <a href="{{ route('admin.veiculos.index') }}" class="btn btn-secondary">Voltar</a>

            </div>

        </div>

    </div>

</div>
@endsection
