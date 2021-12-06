@extends('layouts.dashboard')

@section('title', 'Início')

@section('content')
<div id="carrosel" class="carousel carousel-dark slide mb-3" data-bs-ride="carousel">
  <div class="carousel-indicators">
      <button type="button" data-bs-target="#carrosel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carrosel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carrosel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="{{ asset('images/produto grande-teste.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
          <img src="{{ asset('images/produto grande-teste.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
          <img src="{{ asset('images/produto grande-teste.png') }}" class="d-block w-100" alt="...">
      </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carrosel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carrosel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
  </button>
</div>

<img class="img-fluid w-100 mb-3" src="{{ asset('images/titulo 2.png') }}">

<div class="row row-cols-1 row-cols-md-4 g-4 container-fluid">
  <div class="col">
    <div class="card h-100">
      <img src="{{ asset('images/escapamento 1.png') }}" class="card-img-top" alt="...">
      <div style="background-color: #8C1818;" class="card-body">
          <h5 class="card-title">R$ 140,00</h5>
          <p class="card-text">ESCAPX20-X10</p>
      </div>
    </div>
  </div>
</div>
@endsection('content')