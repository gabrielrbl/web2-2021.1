@extends('layouts.dashboard')

@section('title', 'Itens entrada')

@section('content')
<main class="container-fluid bg-light text-dark">
    <section class="container py-3">
        <div class="row align-items-center d-flex">
            <div class="col-2 col-md-2 col-sm-2">
                <a href="{{ route('entrada.index') }}" class="btn btn-primary">VOLTAR</a>
            </div>
            <div class="col-8 col-md-8 col-sm-8 text-center">
                <span class="display-6">ITENS - ENTRADA #1</span>
            </div>
        </div>
    </section>

    <section class="container min-vh-100 py-5">
        <section class="text-start mb-3">
            <div class="row">
                <p class="display-6 ms-auto">INFORMAÇÕES DO FORNECEDOR</p>
            </div>

            <div class="row">
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="nomeFornecedor" class="form-label black-text">NOME</label>
                    <input type="text" id="nomeFornecedor" class="form-control" value="AURORA BORJA AZEVEDO" disabled>
                </div>
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="enderecoFornecedor" class="form-label black-text">ENDEREÇO</label>
                    <input type="text" id="enderecoFornecedor" class="form-control" value="RUA BELA VISTA" disabled>
                </div>
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="telefoneFornecedor" class="form-label black-text">TELEFONE</label>
                    <input type="text" id="telefoneFornecedor" class="form-control" value="(50) 96859-0282" disabled>
                </div>
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="cnpjFornecedor" class="form-label black-text">CNPJ</label>
                    <input type="text" id="cnpjFornecedor" class="form-control" value="83.839.472/4776-88" disabled>
                </div>
            </div>
        </section>

        
            <section class="text-start mb-3">
                <div class="row">
                    <p class="display-6 ms-auto">INSERIR ITENS</p>
                </div>

                <form method="GET" id="inserirItensEntrada" action="">
                    <div class="row align-items-end d-flex">
                        <div class="col-12 col-md-10 col-sm-10 mb-3">
                            <label for="idproduto" class="form-label black-text">PRODUTO</label>
                            <input type="text" class="form-control" placeholder="Pesquise pelo produto..." value="1" disabled>
                            <input type="hidden" id="idproduto" name="idproduto" value="#" required>

                        </div>
                        <div class="col-12 col-md-2 col-sm-2 mb-3 ms-auto d-flex align-items-end">
                            <a class="btn btn-primary" title="Editar" onclick="window.open(`#`, 'Pesquisar produto', 'width=1000,height=800'); return false;">
                                PESQUISAR
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="precoCompra" class="form-label black-text">PREÇO COMPRA</label>
                            <input type="number" min="0" id="precoCompra" oninput="validaInputNumber(this);" name="precoCompra" class="form-control" placeholder="PREÇO DE COMPRA" value="" placeholder="PREÇO DE COMPRA" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="quantidade" class="form-label black-text">QUANTIDADE</label>
                            <input type="number" min="1" id="quantidade" name="quantidade" class="form-control" placeholder="QUANTIDADE" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="unidade" class="form-label black-text">UNIDADE</label>
                            <input type="text" oninput="validaInput(this);" autocomplete="off" name="unidade" id="unidade" class="form-control" placeholder="UNIDADE" required maxlength="2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="ipi" class="form-label black-text">IPI (%)</label>
                            <input type="number" min="1" id="ipi" autocomplete="off" oninput="validaInputNumber(this);" name="ipi" class="form-control" placeholder="IPI" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="frete" class="form-label black-text">FRETE (%)</label>
                            <input type="number" min="1" id="frete" autocomplete="off" oninput="validaInputNumber(this);" name="frete" class="form-control" placeholder="FRETE" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="icms" class="form-label black-text">ICMS (%)</label>
                            <input type="number" min="1" id="icms" autocomplete="off" oninput="validaInputNumber(this);" name="icms" class="form-control" placeholder="ICMS" required>
                        </div>
                        <div class="col-12 col-md-4 col-sm-6 mb-3">
                            <label for="valorTotalItem" class="form-label black-text">VALOR TOTAL</label>
                            <input type="text" id="valorTotalItem" class="form-control" value="R$0.0" disabled>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-12 col-md-4 col-sm-6 mb-3 ms-auto d-flex align-items-end">
                            <form method="POST" id="inserirItensEntrada" action="">
                                <button id="inserir" class="btn btn-primary ms-auto">INSERIR</button>
                            </form>
                        </div>
                    </div>
                </form>
            </section>

        <section class="text-start mb-5">
            <div class="row">
                <p class="display-6 ms-auto">ITENS</p>
            </div>

            <div class="table-responsive-lg">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PRODUTO</th>
                            <th scope="col">PREÇO</th>
                            <th scope="col">QUANTIDADE</th>
                            <th scope="col">UNIDADE</th>
                            <th scope="col">IPI</th>
                            <th scope="col">FRETE</th>
                            <th scope="col">ICMS</th>
                            <th scope="col">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CATALISADOR/TUPER X123X-201X</td>
                            <td>R$ 350.00</td>
                            <td>40</td>
                            <td>UN</td>
                            <td>1.0</td>
                            <td>1.0</td>
                            <td>1.0</td>
                            <td>R$ 14000.00</td>
                        </tr>
                        <tr>
                            <td colspan="3">TOTAL</td>
                            <td colspan="5">40</td>
                            <td>R$ 14000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="text-start">
            <div class="row">
                <p class="display-6 ms-auto">FINALIZAR ENTRADA</p>
            </div>

            <form id="finalizarEntrada" method="GET" action="{{ route('entrada.index') }}">
                <div class="row align-items-end mb-3 d-flex">
                    <input type="hidden" name="identrada" value="1">
                    <div class="col-12 col-md-4 col-sm-6 me-auto mb-3">
                        <label for="valorTotalnota" class="form-label black-text">VALOR TOTAL DA ENTRADA</label>
                        <input type="text" id="valorTotalnota" class="form-control" value="R$ 14000.00" disabled>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 ms-auto d-flex align-items-end">
                        <button type="button" id="finalizar" class="btn btn-primary ms-auto">FINALIZAR</button>
                    </div>
                </div>
            </form>
        </section>
    </section>
</main>
@endsection('content')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#inserirItensEntrada").on("click", "#inserir", function(e) {
                e.preventDefault();

                if ($("#idproduto").val() == "") {
                    alert("Informe o produto!");

                    return false;
                } else {
                    $("#inserirItensEntrada").submit();
                    $("#inserirItensEntrada #inserir").prop("disabled", true);
                    $("#inserirItensEntrada #inserir").val("INSERINDO ITEM...");
                }
            });

            $('#unidade').on('keyup', (ev) => {
                $('#unidade').val($('#unidade').val().toUpperCase());
            });

            $("#finalizarEntrada").on("click", "#finalizar", function(e) {
                e.preventDefault();

                var url = new URL(window.location.href);
                if (url.searchParams.get("idproduto")) {
                    if (confirm("Possui produto selecionado! Deseja mesmo finalizar a entrada sem inserir o item?")) {
                        $("#finalizarEntrada").submit();
                    } else {
                        return false;
                    }
                } else {
                    $("#finalizarEntrada").submit();
                }
            });
        });

        function deletar(id, nome) {
            if (confirm("Deseja realmente excluir o itens entrada " + id + " do fornecedor " + nome + "?")) {
                alert("Item excluído com sucesso!");
                window.location.href = '';
                return false;
            }
        }
    </script>
@endpush('scripts')