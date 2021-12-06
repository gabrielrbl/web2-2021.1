@extends('layouts.dashboard')

@section('title', 'Venda')

@section('content')
    <main class="container-fluid bg-light min-vh-100 text-dark">
        <section class="container py-3">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2"></div>
                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">VENDAS</span>
                </div>
            </div>
        </section>

        <section class="d-flex justify-content-center">
            <form id="realizarVenda" method="GET" action="{{ route('venda.itensvenda') }}">
                <div class="row align-items-end mb-3 d-flex">
                    <div class="col-12 col-md-12 col-sm-12 me-auto mb-3">
                        <label for="barraPesquisa" class="form-label black-text">CLIENTE</label>
                        <input type="text" autocomplete="off" placeholder="CLIENTE" class="form-control"
                            id="barraPesquisa" aria-describedby="clienteHelp">
                        <input id="idcliente" type="hidden" name="idcliente" required>
                        <div id="clienteHelp" class="form-text">Digite o nome do cliente e selecione-o na lista.</div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 ms-auto d-flex align-items-end">
                        <button type="submit" class="btn btn-primary ms-auto">REALIZAR VENDA</button>
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
                            <th scope="col">CLIENTE</th>
                            <th scope="col">FORMA DE PAGAMENTO</th>
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
                            <td>GABRIEL LOBO</td>
                            <td>CARTÃO - À VISTA</td>
                            <td>10 DE JUNHO DE 2021</td>
                            <td>FINALIZADA</td>
                            <td>8</td>
                            <td>R$ 1600</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('venda.itensvenda') }}">VISUALIZAR</a>
                                    <button class="btn btn-dark" onclick="deletar('1', 'Gabriel Lobo')">APAGAR</button>
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
                source: [{
                    label: 'Gabriel Lobo',
                    value: 1
                }],
                minLength: 3,
                select: (event, ui) => {
                    $("#barraPesquisa").val(ui.item.label);
                    $("#idcliente").val(ui.item.value);

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
            if (confirm("Deseja realmente excluir a venda de " + nome + "?")) {
                alert("Venda excluída com sucesso!");
                window.location.href = '';
                return false;
            }
        }
    </script>
@endpush('scripts')
