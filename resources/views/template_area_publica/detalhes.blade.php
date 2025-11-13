<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }} - Veículos Ana's</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root { --primary-color:#853362; --text-color:#333; }
        body { font-family:'Poppins',sans-serif; background:#fff; }
        .logo-text { font-size:24px; font-weight:700; color:var(--primary-color)!important; text-transform:uppercase; }
        .btn-primary-custom { background:var(--primary-color); border-color:var(--primary-color); }
        .btn-primary-custom:hover { background:#6a2a50; border-color:#6a2a50; }
        .detail-price { font-size:2.5rem; font-weight:bold; color:var(--primary-color); }
        .image-gallery img { border-radius:10px; transition:transform .3s; }
        .image-gallery img:hover { transform:scale(1.02); }
        .specs-item { border-bottom:1px solid #eee; padding:10px 0; }
        .specs-item:last-child { border-bottom:none; }
    </style>
</head>
<body>

<header id="header-wrap" class="py-3 border-bottom">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="site-branding">
      <a class="logo-text" href="{{ route('public.index') }}">Veículos Ana's</a>
    </div>
    <a href="{{ route('public.index') }}" class="btn btn-outline-primary">
      <i class="fas fa-arrow-left me-2"></i>Voltar para Vitrine
    </a>
  </div>
</header>

<div class="container my-5">
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('public.index') }}">Home</a></li>
      <li class="breadcrumb-item">
        <a href="{{ route('public.index', ['marca' => $veiculo->marca->nome]) }}">{{ $veiculo->marca->nome }}</a>
      </li>
      <li class="breadcrumb-item active">{{ $veiculo->modelo->nome }}</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-lg-7">
      <div class="image-gallery">
        <div class="mb-4">
          <img id="mainImage" src="{{ $veiculo->foto1 }}" class="img-fluid w-100 rounded shadow"
               style="max-height:500px; object-fit:cover;"
               alt="{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}">
        </div>
        <div class="row g-2">
          @foreach (['foto1','foto2','foto3'] as $foto)
            @if ($veiculo->$foto)
              <div class="col-4">
                <img src="{{ $veiculo->$foto }}" class="img-fluid rounded cursor-pointer"
                     style="height:100px; object-fit:cover; width:100%;"
                     onclick="changeMainImage('{{ $veiculo->$foto }}')" alt="{{ ucfirst($foto) }}">
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="ps-lg-4">
        <h1 class="h2 mb-2">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h1>

        <div class="detail-price mb-4">
          {{ $veiculo->preco_formatado }}
        </div>

        <div class="card mb-4">
          <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fas fa-list-alt me-2"></i>Especificações</h5>
          </div>
          <div class="card-body">
            <div class="specs-item d-flex justify-content-between">
              <span><strong>Marca:</strong></span><span>{{ $veiculo->marca->nome }}</span>
            </div>
            <div class="specs-item d-flex justify-content-between">
              <span><strong>Modelo:</strong></span><span>{{ $veiculo->modelo->nome }}</span>
            </div>
            <div class="specs-item d-flex justify-content-between">
              <span><strong>Ano:</strong></span><span>{{ $veiculo->ano ?? '—' }}</span>
            </div>
            <div class="specs-item d-flex justify-content-between">
              <span><strong>Cor:</strong></span><span>{{ $veiculo->cor->nome ?? '—' }}</span>
            </div>
            <div class="specs-item d-flex justify-content-between">
              <span><strong>Quilometragem:</strong></span>
              <span>{{ number_format($veiculo->quilometragem ?? 0, 0, ',', '.') }} km</span>
            </div>
          </div>
        </div>

        @if ($veiculo->descricao)
          <div class="card mb-4">
            <div class="card-header bg-light">
              <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Descrição</h5>
            </div>
            <div class="card-body">
              <p class="mb-0">{{ $veiculo->descricao }}</p>
            </div>
          </div>
        @endif

        <div class="d-grid gap-2">
          <button class="btn btn-primary-custom btn-lg" id="btnWhats">
            <i class="fas fa-whatsapp me-2"></i>Entrar em Contato
          </button>
          <button class="btn btn-outline-primary btn-lg">
            <i class="fas fa-envelope me-2"></i>Solicitar Informações
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function changeMainImage(imageUrl){ document.getElementById('mainImage').src = imageUrl; }
  document.getElementById('btnWhats').addEventListener('click', function(){
    const message = `Olá! Tenho interesse no {{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }} - {{ $veiculo->preco_formatado }}`;
    const whatsappUrl = `https://wa.me/5511999999999?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
