@extends('layouts.dashboard')

@section('title', 'Itens venda')

@section('content')
    <main class="container-fluid bg-light text-dark">
      <section class="container py-3">
          <div class="row align-items-center d-flex">
              <div class="col-2 col-md-2 col-sm-2">
                  <a href="{{ route('venda.index') }}" class="btn btn-primary">VOLTAR</a>
              </div>
              <div class="col-8 col-md-8 col-sm-8 text-center">
                  <span class="display-6">ITENS - VENDA #1</span>
              </div>
          </div>
      </section>

      <section class="container min-vh-100 py-5">
          <section class="text-start mb-3">
              <div class="row">
                  <p class="display-6 ms-auto">INFORMAÇÕES DO CLIENTE</p>
              </div>

              <div class="row">
                  <div class="col-12 col-md-4 col-sm-6 mb-3">
                      <label for="nomeCliente" class="form-label black-text">NOME</label>
                      <input type="text" id="nomeCliente" class="form-control" value="GABRIEL LOBO" disabled>
                  </div>
                  <div class="col-12 col-md-4 col-sm-6 mb-3">
                      <label for="telefoneCliente" class="form-label black-text">TELEFONE</label>
                      <input type="text" id="telefoneCliente" class="form-control" value="(77) 98123-4653" disabled>
                  </div>
                  <div class="col-12 col-md-4 col-sm-6 mb-3">
                        <label for="cpf" class="form-label black-text">CPF</label>
                        <input type="text" id="cpf" class="form-control" value="000.000.000-00" disabled>
                  </div>
              </div>
          </section>

          <section class="text-start mb-3">
            <div class="row">
                <p class="display-6 ms-auto">INSERIR ITENS</p>
            </div>

            <form method="GET" id="inserirItensVenda" action="">
                <div class="row align-items-end d-flex">
                    <div class="col-12 col-md-10 col-sm-10 mb-3">
                        <label for="idproduto" class="form-label black-text">PRODUTO</label>
                        <input type="text" class="form-control" placeholder="Pesquise pelo produto..." value="1" disabled>
                        <input type="hidden" id="idproduto" name="idproduto" value="#" required>
                    </div>
                    <div class="col-12 col-md-2 col-sm-2 mb-3 ms-auto d-flex align-items-end">
                        <a class="btn btn-primary ms-auto" title="Editar" onclick="window.open(`#`, 'Pesquisar produto', 'width=1000,height=800'); return false;">
                            PESQUISAR
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 col-sm-6 mb-3">
                        <label for="valorvenda" class="form-label black-text">PREÇO</label>
                        <input type="number" min="0" autocomplete="off" id="valorvenda" oninput="validaInputNumber(this);" name="valorvenda" class="form-control" value="" placeholder="PREÇO DE VENDA" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-3">
                        <label for="quantidade" class="form-label black-text">QUANTIDADE</label>
                        <input type="number" min="1" autocomplete="off" id="quantidade" max="" name="quantidade" oninput="validaInputNumber(this);" class="form-control" placeholder="QUANTIDADE" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-3">
                        <label for="desconto" class="form-label black-text">DESCONTO (%)</label>
                        <input type="number" min="0" autocomplete="off" max="100" id="desconto" name="desconto" oninput="validaInputNumber(this);" class="form-control" value="" placeholder="DESCONTO" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-3">
                        <label for="valorTotalItem" class="form-label black-text">VALOR TOTAL</label>
                        <input type="text" id="valorTotalItem" class="form-control" value="R$0.0" disabled>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-12 col-md-4 col-sm-6 mb-3 ms-auto d-flex align-items-end">
                        <button id="inserir" class="btn btn-primary ms-auto">INSERIR</button>
                    </div>
                </div>
            </form>
        </section>

            <section class="text-start mb-5">
                <div class="row">
                    <p class="display-6 ms-auto">ITENS</p>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">PRODUTO</th>
                                <th scope="col">QUANTIDADE</th>
                                <th scope="col">PREÇO</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CATALISADOR/TUPER X123X-201X</td>
                                <td>4</td>
                                <td>R$ 450.00</td>
                                <td>R$ 1800.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">TOTAL</td>
                                <td colspan="2">4</td>
                                <td>R$ 1800.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="text-start">
                <div class="row">
                    <p class="display-6 ms-auto">FINALIZAR VENDA</p>
                </div>

                <form id="finalizarVenda" method="GET" action="{{ route('venda.index') }}">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4 col-sm-6">
                            <label for="idformapagamento" class="form-label">FORMA DE PAGAMENTO</label>
                            <select id="idformapagamento" name="idformapagamento" class="form-select" required>
                                <option selected disabled value="">SELECIONE</option>
                            <option value="1">CARTÃO - À VISTA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-end mb-3 d-flex">
                        <div class="col-12 col-md-4 col-sm-6 me-auto mb-3">
                            <label for="valorTotalVenda" class="form-label black-text">VALOR TOTAL DA VENDA</label>
                            <input type="text" id="valorTotalVenda" class="form-control" value="R$ 1800.00" disabled>
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
            $("#inserirItensVenda").on("click", "#inserir", function(e) {
                e.preventDefault();

                if ($("#idproduto").val() == "") {
                    alert("Informe o produto!");

                    return false;
                } else {
                    $("#inserirItensVenda").submit();
                    $("#inserirItensVenda #inserir").prop("disabled", true);
                    $("#inserirItensVenda #inserir").val("INSERINDO ITEM...");
                }
            });

            $("#finalizarVenda").on("click", "#finalizar", function(e) {
                e.preventDefault();

                if ($("#idformapagamento").val() == null) {
                    alert("Informe a forma de pagamento!");

                    return false;
                } else {
                    var url = new URL(window.location.href);
                    if (url.searchParams.get("idproduto")) {
                        if (confirm("Possui produto selecionado! Deseja mesmo finalizar a venda sem inserir o item?")) {
                            $("#finalizarVenda").submit();
                        } else {
                            return false;
                        }
                    } else {
                        $("#finalizarVenda").submit();
                    }
                }
            });
        });

        function deletar(id, nome) {
            if (confirm("Deseja realmente excluir o item" + id + "?")) {
                alert("Item excluído com sucesso!");
                window.location.href = '';
                return false;
            }
        }
    </script>
@endpush('scripts')