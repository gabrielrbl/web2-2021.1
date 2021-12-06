@extends('layouts.dashboard')

@section('title', 'Entrada')

@section('content')
<main class="container-fluid bg-light min-vh-100 text-dark">
    <section class="container py-3">
        <div class="row align-items-center d-flex">
            <div class="col-2 col-md-2 col-sm-2"></div>
            <div class="col-8 col-md-8 col-sm-8 text-center">
                <span class="display-6">ENTRADAS</span>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center">
        <form id="realizarEntrada" method="GET" action="{{ route('entrada.itensentrada') }}">
            <div class="row align-items-end mb-3 d-flex">
                <div class="col-12 col-md-12 col-sm-12 me-auto mb-3">
                    <label for="barraPesquisa" class="form-label black-text">FORNECEDOR</label>
                    <input type="text" placeholder="FORNECEDOR" class="form-control" id="barraPesquisa" aria-describedby="fornecedorHelp">
                    <input id="idfornecedor" name="idfornecedor" type="hidden" required>
                    <div id="fornecedorHelp" class="form-text">Digite o nome do fornecedor e selecione-o na lista.</div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 ms-auto d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ms-auto">DAR ENTRADA</button>
                </div>
            </div>
        </form>
    </section>

    <section class="container-fluid text-start mb-5">
        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">FORNECEDOR</th>
                        <th scope="col">DATA</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ITENS</th>
                        <th scope="col">VALOR TOTAL</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>AURORA BORJA AZEVEDO</td>
                        <td>25 DE FEVEREIRO DE 2021</td>
                        <td>FINALIZADA</td>
                        <td>4</td>
                        <td>R$ 4500</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('entrada.itensentrada') }}">VISUALIZAR</a>
                                <button class="btn btn-dark" onclick="deletar('1', 'AURORA BORJA AZEVEDO')">APAGAR</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection('content')


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#barraPesquisa').autocomplete({
                source: [{label: 'Distribuidora de frios', value: 1 }],
                minLength: 3,
                select: (event, ui) => {
                    $("#barraPesquisa").val(ui.item.label);
                    $("#idfornecedor").val(ui.item.value);

                    return false;
                }
            });

            $("#realizarVenda").on("click", "button[type=submit]", function(e) {
                e.preventDefault();

                if ($("#idcliente").val() == "") {
                    alert("Informe o cliente!");

                    return false;
                } else {
                    $("#realizarVenda").submit();
                    $("#realizarVenda button[type=submit]").prop("disabled", true);
                    $("#realizarVenda button[type=submit]").val("VENDENDO...");
                }
            });
        });

        function deletar(id, nome) {
            if (confirm("Deseja realmente excluir a entrada de " + nome + "?")) {
                alert("Entrada excluída com sucesso!");
                window.location.href = '';
                return false;
            }
        }
    </script>
@endpush('scripts')