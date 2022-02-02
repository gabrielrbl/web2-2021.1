@extends('layouts.dashboard')

@section('title', 'Marcas')

@section('content')
    <main class="container-fluid bg-light text-dark">
        <section class="container py-3">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2"></div>
                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">MEU PERFIL</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light vh-100">
            <section class="d-flex justify-content-center align-items-center text-dark">
                <form>
                    <div class="row mb-3">
                        <img class="img-fluid w-100" src="{{ asset('images/usuario.png') }}">
                    </div>
                    <div class="row mb-3">
                        <label for="nome" class="form-label">NOME</label>
                        <input type="text" placeholder="NOME" class="form-control" id="nome" value="Gabriel Lobo"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="usuario" class="form-label">USUÁRIO</label>
                        <input type="text" placeholder="USUÁRIO" class="form-control" id="usuario" value="gabrielrbl"
                            disabled>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection('content')
