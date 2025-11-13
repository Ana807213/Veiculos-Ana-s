@extends('layouts.admin')

@section('title', 'Dashboard - Ana’s')

@section('content')

<h2 class="mb-4">📊 Dashboard Administrativo</h2>

<div class="row g-4">

    <!-- Card Veículos -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="fa-solid fa-car fa-3x mb-3 text-primary"></i>
                <h4 class="mb-2">Veículos</h4>
                <p class="text-muted">Gerenciar todos os veículos cadastrados</p>
                <a href="{{ route('admin.veiculos.index') }}" class="btn btn-primary-custom w-100">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <!-- Card Marcas -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="fa-solid fa-industry fa-3x mb-3 text-primary"></i>
                <h4 class="mb-2">Marcas</h4>
                <p class="text-muted">Cadastrar e editar marcas</p>
                <a href="{{ route('admin.marcas.index') }}" class="btn btn-primary-custom w-100">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <!-- Card Modelos -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="fa-solid fa-tags fa-3x mb-3 text-primary"></i>
                <h4 class="mb-2">Modelos</h4>
                <p class="text-muted">Gerenciar lista de modelos</p>
                <a href="{{ route('admin.modelos.index') }}" class="btn btn-primary-custom w-100">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <!-- Card Cores -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="fa-solid fa-palette fa-3x mb-3 text-primary"></i>
                <h4 class="mb-2">Cores</h4>
                <p class="text-muted">Cadastrar cores disponíveis</p>
                <a href="{{ route('admin.cores.index') }}" class="btn btn-primary-custom w-100">
                    Acessar
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
