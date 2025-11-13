@extends('layouts.public_base')

@section('title', 'Todos os Veículos - Veículos Ana\'s')

@push('styles')
<style>

/* ===========================================
        VARIÁVEIS E BASE VISUAL
=========================================== */
:root {
    --primary-color:#853362;
    --primary-hover:#6b264f;
    --text-dark:#333;
    --text-muted:#777;
    --bg-soft:#faf5f8;
}

body {
    font-family: "Poppins", sans-serif;
    background: #ffffff;
    color: var(--text-dark);
}

* {
    transition: all .20s ease-in-out;
}

/* ===========================================
                    HERO
=========================================== */
#hero-banner {
    width: 100%;
    height: 420px;
    background-image: url("{{ asset('images/banner-carro.jpg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    padding-left: 50px;
    color: #fff;
    position: relative;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

#hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,.4), rgba(0,0,0,.5));
    z-index: 1;
}

#hero-banner .banner-content {
    position: relative;
    z-index: 2;
    max-width: 550px;
}

#hero-banner .banner-content h1 {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.2;
}

#hero-banner .banner-content p {
    font-size: 1.2rem;
    opacity: .9;
    margin-top: 8px;
}

.btn-hero {
    background: var(--primary-color);
    padding: 12px 26px;
    margin-top: 20px;
    color: #fff;
    border-radius: 50px;
    font-weight: 600;
    font-size: 15px;
    display: inline-block;
    box-shadow: 0 4px 12px rgba(133, 51, 98, 0.4);
}

.btn-hero:hover {
    background: var(--primary-hover);
    transform: translateY(-4px);
}

/* ===========================================
                PÁGINA PRINCIPAL
=========================================== */
.page-content {
    display: flex;
    gap: 35px;
    margin-top: 40px;
}

/* ===========================================
                    SIDEBAR
=========================================== */
.category-sidebar {
    width: 260px;
    background: #fff;
    padding: 22px;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    height: fit-content;
}

.category-title {
    font-size: 19px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.category-list {
    list-style: none;
    padding-left: 0;
}

.category-list li {
    margin-bottom: 10px;
}

.category-list li a {
    display: block;
    padding: 10px 12px;
    border-radius: 8px;
    transition: all .2s ease;
    color: var(--text-dark);
    font-size: 15px;
}

.category-list li a:hover {
    background: var(--bg-soft);
    color: var(--primary-color);
    transform: translateX(6px);
}

/* ===========================================
                GRID DE VEÍCULOS
=========================================== */
.veiculos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    gap: 28px;
}

/* CARD */
.veiculo-item {
    border-radius: 16px;
    overflow: hidden;
    background: #fff;
    padding: 0;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.veiculo-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.15);
}

/* FOTO DO CARD */
.veiculo-image {
    height: 210px;
    background-size: cover;
    background-position: center;
    position: relative;
}

/* PREÇO */
.card-price {
    position: absolute;
    bottom: 12px;
    right: 12px;
    padding: 10px 18px;
    background: var(--primary-color);
    color: #fff;
    border-radius: 8px;
    font-weight: bold;
    font-size: 18px;
    box-shadow: 0 4px 10px rgba(133, 51, 98, 0.4);
}

/* INFO DO CARD */
.veiculo-info {
    padding: 18px;
}

.veiculo-title {
    font-size: 19px;
    font-weight: 700;
    color: var(--primary-color);
}

.veiculo-details {
    font-size: 14px;
    margin-top: 6px;
    color: #666;
}

/* Resumo */
.veiculo-info p.small {
    margin-top: 8px;
    font-size: 13px;
    color: #888 !important;
    font-style: italic;
}

/* ===========================================
                RESPONSIVO
=========================================== */
@media(max-width: 992px) {
    .page-content {
        flex-direction: column;
    }
    .category-sidebar {
        width: 100%;
    }
    #hero-banner {
        height: 330px;
        padding-left: 20px;
    }
    #hero-banner h1 {
        font-size: 2rem;
    }
    .veiculo-image {
        height: 170px;
    }
}
</style>
@endpush



@section('content')

{{-- =========== HERO =========== --}}
<section id="hero-banner">
    <div class="banner-content">
        <h1>CONQUISTE SEU CARRO AGORA.</h1>
        <p>AS MELHORES OPÇÕES, OS MELHORES CARROS.</p>

        <a href="{{ route('public.index') }}" class="btn-hero">
            Navegue pelo nosso site para mais opções
        </a>
    </div>
</section>


{{-- =========== CONTEÚDO PRINCIPAL =========== --}}
<div class="page-content container">

    {{-- =========== SIDEBAR =========== --}}
    <aside class="category-sidebar">

        <h3 class="category-title">Marcas</h3>

        <ul class="category-list">
            <li>
                <a href="{{ route('public.index') }}" class="{{ empty(request('marca')) ? 'fw-bold' : '' }}">
                    Todas as Marcas
                </a>
            </li>

            @foreach($marcas as $marcaItem)
            <li>
                <a href="{{ route('public.index', ['marca' => $marcaItem->nome]) }}"
                   class="{{ request('marca') == $marcaItem->nome ? 'fw-bold' : '' }}">
                    {{ $marcaItem->nome }}
                </a>
            </li>
            @endforeach
        </ul>
    </aside>


    {{-- =========== LISTAGEM =========== --}}
    <main class="main-section flex-grow-1">

        <h1 class="text-center" style="color: var(--primary-color);">
            @if(request('marca'))
                Veículos {{ request('marca') }}
            @else
                Todos os nossos veículos
            @endif
        </h1>

        <p class="text-center text-muted">
            @if(request('marca'))
                Explore nossos veículos da marca {{ request('marca') }}.
            @else
                Explore nossos veículos e encontre o carro dos seus sonhos.
            @endif
        </p>


        {{-- === GRID DE CARROS === --}}
        @if($veiculos->count())
        <div class="veiculos-grid">

            @foreach($veiculos as $veiculo)
            <div class="veiculo-item">

                <a href="{{ route('public.veiculo.show', $veiculo->id) }}" style="text-decoration:none; color:inherit;">

                    <div class="veiculo-image"
                        style="background-image:url('{{ $veiculo->foto1 }}');">
                        <div class="card-price">{{ $veiculo->preco_formatado }}</div>
                    </div>

                    <div class="veiculo-info">
                        <h3 class="veiculo-title">
                            {{ $veiculo->marca->nome ?? 'Marca Indefinida' }}
                            {{ $veiculo->modelo->nome ?? 'Modelo Indefinido' }}
                        </h3>

                        <div class="veiculo-details">
                            <strong>Ano:</strong> {{ $veiculo->ano }} |
                            <strong>Cor:</strong> {{ $veiculo->cor->nome ?? '—' }} <br>
                            <strong>KM:</strong> {{ number_format($veiculo->quilometragem ?? 0, 0, ',', '.') }} km
                        </div>

                        @if($veiculo->descricao)
                        <p class="small text-muted mt-2">
                            {{ Str::limit($veiculo->descricao, 80) }}
                        </p>
                        @endif
                    </div>

                </a>
            </div>
            @endforeach

        </div>
        @else

        <div class="text-center py-5">
            <i class="fas fa-car fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Nenhum veículo encontrado</h4>
            <p class="text-muted">Tente outra marca ou volte mais tarde.</p>
        </div>

        @endif

    </main>
</div>

@endsection
