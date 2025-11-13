@extends('layouts.public_base')

@section('title', 'Todos os Veículos - Veículos Ana\'s')

@push('styles')
<style>

/* ============================================================
    AJUSTE DA SIDEBAR (MOVER PARA A ESQUERDA)
============================================================ */

.page-content.container {
    max-width: 1500px !important;
}

.category-sidebar {
    margin-left: -110px !important;
}

@media(min-width: 1500px) {
    .category-sidebar {
        margin-left: -160px !important;
    }
}

/* ============================================================
    HERO SEM ESCURECIMENTO + ANIMAÇÃO FADE-IN
============================================================ */

#hero-banner {
    width: 100%;
    height: 430px;
    background-image: url("{{ asset('images/banner-carro.jpg') }}");
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    padding-left: 60px;
    color: #fff;
    position: relative;
    border-bottom-left-radius: 22px;
    border-bottom-right-radius: 22px;
    overflow: hidden;

    /* REMOVIDO O ESCURECIMENTO */
    box-shadow: none !important;

    /* animação */
    opacity: 0;
    animation: bannerFade 1s ease forwards;
}

@keyframes bannerFade {
    to { opacity: 1; }
}

/* gradiente suave */
#hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(0,0,0,0.25),
        rgba(0,0,0,0.05)
    );
    z-index: 1;
}

/* ============================================================
    TÍTULO "MARCAS" COM ANIMAÇÃO
============================================================ */

.category-title {
    animation: titlePop .6s ease;
}

@keyframes titlePop {
    from { opacity: 0; transform: translateX(-15px); }
    to { opacity: 1; transform: translateX(0); }
}

/* ============================================================
    HOVER SUAVE NA SIDEBAR
============================================================ */

.category-list li a {
    transition: .25s;
}

.category-list li a:hover {
    padding-left: 22px;
}

/* ============================================================
    ANIMAÇÃO DE ENTRADA DOS CARDS
============================================================ */

.veiculo-item {
    opacity: 0;
    transform: translateY(25px);
    animation: vehicleEnter .7s ease forwards;
}

@keyframes vehicleEnter {
    to { opacity: 1; transform: translateY(0); }
}

/* ============================================================
    ZOOM DA IMAGEM NO HOVER
============================================================ */

.veiculo-image {
    transition: transform .4s ease;
}

.veiculo-item:hover .veiculo-image {
    transform: scale(1.06);
}

/* ============================================================
    PULSE NO PREÇO
============================================================ */

.card-price {
    animation: pricePulse 2.8s infinite ease-in-out;
}

@keyframes pricePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.06); }
}

/* ============================================================
    ESTILOS ORIGINAIS (mantidos)
============================================================ */

:root {
    --primary-color:#853362;
    --primary-hover:#6b264f;
    --text-dark:#333;
    --text-muted:#777;
    --radius:16px;
}

body {
    font-family: "Poppins", sans-serif;
    color: var(--text-dark);
}

/* Container da página */
.page-content {
    display: flex;
    gap: 40px;
    margin-top: 50px;
}

/* Sidebar */
.category-sidebar {
    width: 260px;
    background: #fff;
    padding: 28px 25px;
    border-radius: var(--radius);
    box-shadow: 0 6px 20px rgba(0,0,0,0.10);
    border: 1px solid #eee;
}

/* Lista de marcas */
.category-list {
    list-style: none;
    padding-left: 0;
}

.category-list li a {
    display: block;
    padding: 12px 14px;
    border-radius: 8px;
    color: #444;
    font-size: 15px;
}

/* GRID DE VEÍCULOS */
.veiculos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    gap: 30px;
}

/* Card do veículo */
.veiculo-item {
    border-radius: var(--radius);
    overflow: hidden;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

/* Imagem */
.veiculo-image {
    height: 210px;
    background-size: cover;
    background-position: center;
    position: relative;
}

/* Preço */
.card-price {
    position: absolute;
    bottom: 12px;
    right: 12px;
    padding: 10px 20px;
    background: var(--primary-color);
    color: #fff;
    border-radius: 10px;
    font-weight: bold;
    font-size: 18px;
}

/* Responsivo */
@media(max-width: 992px) {
    .page-content { flex-direction: column; }
    .category-sidebar {
        margin-left: 0 !important;
        width: 100%;
    }
}

</style>
@endpush


@section('content')

{{-- ================= HERO ================= --}}
<section id="hero-banner">
    <div class="banner-content" style="position:relative;z-index:2;">
        <h1>CONQUISTE SEU CARRO AGORA.</h1>
        <p>AS MELHORES OPÇÕES, OS MELHORES CARROS.</p>

        <a href="{{ route('public.index') }}" class="btn-hero" style="background:#853362; padding:13px 30px; border-radius:50px; color:#fff; font-weight:600;">
            Navegue pelo nosso site para mais opções
        </a>
    </div>
</section>

{{-- ================= CONTEÚDO PRINCIPAL ================= --}}
<div class="page-content container">

    {{-- SIDEBAR --}}
    <aside class="category-sidebar">
        <h3 class="category-title">Marcas</h3>

        <ul class="category-list">
            <li><a href="{{ route('public.index') }}" class="{{ empty(request('marca')) ? 'fw-bold' : '' }}">Todas as Marcas</a></li>

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

    {{-- LISTAGEM --}}
    <main class="flex-grow-1">

        <h1 class="text-center" style="color: var(--primary-color);">
            {{ request('marca') ? 'Veículos ' . request('marca') : 'Todos os nossos veículos' }}
        </h1>

        <p class="text-center text-muted">
            {{ request('marca') ? 'Explore nossos veículos da marca ' . request('marca') : 'Explore nossos veículos e encontre o carro dos seus sonhos.' }}
        </p>

        @if($veiculos->count())
        <div class="veiculos-grid">

            @foreach($veiculos as $veiculo)
            <div class="veiculo-item">

                <a href="{{ route('public.veiculo.show', $veiculo->id) }}" style="text-decoration:none; color:inherit;">

                    <div class="veiculo-image"
                         style="background-image:url('{{ $veiculo->foto1 }}');">
                        <div class="card-price">{{ $veiculo->preco_formatado }}</div>
                    </div>

                    <div class="p-3">
                        <h3 class="veiculo-title" style="font-size:20px; font-weight:700; color:var(--primary-color);">
                            {{ $veiculo->marca->nome ?? 'Marca' }} {{ $veiculo->modelo->nome ?? '' }}
                        </h3>

                        <div class="veiculo-details" style="color:#666; font-size:14px;">
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
