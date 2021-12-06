@extends('layouts.dashboard')

@section('title', 'Produtos')

@section('content')
    <main class="container-fluid bg-light min-vh-100 text-dark">
        <section class="container py-3">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2">
                    <a href="{{ route('consulta.produto') }}" class="btn btn-primary">VOLTAR</a>
                </div>

                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">CADASTRAR PRODUTO</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light vh-100">
            <section class="container min-vh-100 py-5">
                <form method="GET" id="form">
                    <div class="row">
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idmotor" class="form-label black-text">MOTOR</label>
                            <select name="idmotor" id="idmotor" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">0.4</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idcarro" class="form-label black-text">CARRO</label>
                            <select id="idcarro" name="idcarro" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">GOL</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idvalvulas" class="form-label black-text">VÁLVULA</label>
                            <select id="idvalvulas" name="idvalvulas" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">8</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idfabricacao" class="form-label black-text">FABRICAÇÃO</label>
                            <select id="idfabricacao" name="idfabricacao" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">1990</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idlocalizacao" class="form-label black-text">LOCALIZAÇÃO</label>
                            <select id="idlocalizacao" name="idlocalizacao" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">DEPART. 1</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idcategoria" class="form-label black-text">CATEGORIA</label>
                            <select id="idcategoria" name="idcategoria" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">CATALISADOR</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idmarca" class="form-label black-text">MARCA</label>
                            <select id="idmarca" name="idmarca" class="form-control" required>
                                <option selected disabled value>SELECIONE</option>
                                <option value="1">TUPER</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="idreferencia" class="form-label black-text">REFERÊNCIA</label>
                            <input type="text" id="idreferencia" name="referencia" oninput="validaInput(this, true)"
                                class="form-control" maxlength="20" placeholder="REFERÊNCIA" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="unidade" class="form-label black-text">UNIDADE</label>
                            <input type="text" id="unidade" name="unidade" oninput="validaInput(this, false)"
                                class="form-control" maxlength="2" placeholder="UNIDADE" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row text-end">
                        <div class="col-6 col-md-12 col-sm-6 mb-3">
                            <button type="submit" class="btn btn-primary">CADASTRAR</button>
                        </div>
                    </div>
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

                window.location.href = '{{ route('consulta.produto') }}';
            });

            $('#unidade').on('keyup', (ev) => {
                $('#unidade').val($('#unidade').val().toUpperCase());
            });
        });
    </script>
@endpush('scripts')
