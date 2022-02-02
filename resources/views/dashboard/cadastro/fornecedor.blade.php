@extends('layouts.dashboard')

@section('title', 'Fornecedores')

@section('content')
    <main class="container-fluid bg-light text-dark">
        <section class="container py-3 text-center container">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2">
                    <a href="{{ route('consulta.fornecedor') }}" class="btn btn-primary">VOLTAR</a>
                </div>

                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">CADASTRAR FORNECEDOR</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light vh-100">
            <section class="container min-vh-30 py-5 d-flex justify-content-center align-items-center text-dark">
                <form method="GET" id="form">
                    <div class="row mb-3">
                        <label for="nome" class="form-label">NOME</label>
                        <input type="text" name="nome" id="nome" oninput="validaInput(this, false)" class="form-control"
                            placeholder="NOME" autocomplete="off" required>
                    </div>
                    <div class="row mb-3">
                        <label for="endereco" class="form-label">ENDEREÇO</label>
                        <input type="text" name="endereco" id="endereco" oninput="validaInput(this, true)"
                            class="form-control" placeholder="ENDEREÇO" autocomplete="off" required>
                    </div>
                    <div class="row mb-3">
                        <label for="telefone" class="form-label">TELEFONE</label>
                        <input type="text" name="telefone" id="telefone" oninput="mascara(this, 'tel')"
                            class="form-control" placeholder="TELEFONE" autocomplete="off" required>
                    </div>
                    <div class="row mb-3">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" oninput="mascara(this, 'cnpj')" class="form-control"
                            placeholder="CNPJ" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary">CADASTRAR</button>
                </form>

                <div class="row-mb-3">
                    <img class="img-fluid w-100" src="{{ asset('images/caminhão.png') }}">
                </div>
            </section>
        </div>
    </main>
@endsection('content')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#form").on("submit", function() {
                event.preventDefault();
                $("button[type=submit]").prop("disabled", true);
                $("button[type=submit]").text("CADASTRANDO...");

                window.location.href = '{{ route("consulta.fornecedor") }}';
            });
        });
    </script>
@endpush('scripts')
