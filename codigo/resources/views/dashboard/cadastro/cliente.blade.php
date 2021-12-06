@extends('layouts.dashboard')

@section('title', 'Clientes')

@section('content')
    <main class="container-fluid bg-light text-dark">
        <section class="container py-3 text-center container">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2">
                    <a href="{{ route('consulta.cliente') }}" class="btn btn-primary">VOLTAR</a>
                </div>

                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">CADASTRAR CLIENTE</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light vh-100">
            <section class="container min-vh-100 py-5 d-flex justify-content-center align-items-center text-dark">
                <form method="GET" id="form">
                    <div class="row mb-3">
                        <img class="img-fluid w-100" src="{{ asset('images/usuario.png') }}">
                    </div>
                    <div class="row mb-3">
                        <select id="selecionar" name="tipoCliente" class="form-select">
                            <option selected value="fisico">FÍSICO</option>
                            <option value="juridico">JURIDICO</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="nome" class="form-label">NOME</label>
                        <input type="text" id="nome" name="nome" oninput="validaInput(this, false)" class="form-control" placeholder="NOME" autocomplete="off" required>
                    </div>
                    <div class="row mb-3">
                        <label for="telefone" class="form-label">TELEFONE</label>
                        <input type="text" id="telefone" name="telefone" oninput="mascara(this, 'tel')" class="form-control" placeholder="TELEFONE" autocomplete="off" required>
                    </div>
                    <div class="row mb-3 rowCpf">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" oninput="mascara(this, 'cpf')" class="form-control" placeholder="CPF" autocomplete="off" required>
                    </div>
                    <div class="row mb-3 rowCnpj visually-hidden">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" oninput="mascara(this, 'cnpj')" class="form-control" placeholder="CNPJ" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">CADASTRAR</button>
                </form>
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

                window.location.href = '{{ route("consulta.cliente") }}';
            });

            $("#selecionar").change(function() {
                if ($(this).val() == "fisico") {
                    $("#cnpj").removeAttr("required");
                    $(".rowCnpj").addClass("visually-hidden");
                    $(".rowCpf").removeClass("visually-hidden");
                    $("#cpf").addAttr("required");
                } else if ($(this).val() == "juridico") {
                    $("#cpf").removeAttr("required");
                    $(".rowCpf").addClass("visually-hidden");
                    $(".rowCnpj").removeClass("visually-hidden");
                    $("#cnpj").addAttr("required");
                }
            });
        });
    </script>
@endpush('scripts')