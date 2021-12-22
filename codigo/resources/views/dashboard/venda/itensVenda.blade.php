@extends('layouts.dashboard')

@section('title', 'Itens venda')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            ITENS - VENDA #1
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">INFORMAÇÕES DO CLIENTE</p>
                <div class="flex flex-col">
                    <div class="mb-3">
                        <label>NOME</label>
                        <input type="text" value="GABRIEL LOBO"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>TELEFONE</label>
                        <input type="text" value="(77) 98123-4653"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>CPF</label>
                        <input type="text" value="000.000.000-00"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                </div>
            </div>
        </div>


        {{-- <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            INSERIR ITENS
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <form method="GET" id="inserirItensVenda" action="">
            <div class="row align-items-end d-flex">
                <div class="col-12 col-md-10 col-sm-10 mb-3">
                    <label for="idproduto" class="form-label black-text">PRODUTO</label>
                    <input type="text" class="form-control" placeholder="Pesquise pelo produto..." value="1" disabled>
                    <input type="hidden" id="idproduto" name="idproduto" value="#" required>
                </div>
                <div class="col-12 col-md-2 col-sm-2 mb-3 ms-auto d-flex align-items-end">
                    <a class="btn btn-primary ms-auto" title="Editar"
                        onclick="window.open(`#`, 'Pesquisar produto', 'width=1000,height=800'); return false;">
                        PESQUISAR
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="valorvenda" class="form-label black-text">PREÇO</label>
                    <input type="number" min="0" autocomplete="off" id="valorvenda" oninput="validaInputNumber(this);"
                        name="valorvenda" class="form-control" value="" placeholder="PREÇO DE VENDA" required>
                </div>
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="quantidade" class="form-label black-text">QUANTIDADE</label>
                    <input type="number" min="1" autocomplete="off" id="quantidade" max="" name="quantidade"
                        oninput="validaInputNumber(this);" class="form-control" placeholder="QUANTIDADE" required>
                </div>
                <div class="col-12 col-md-4 col-sm-6 mb-3">
                    <label for="desconto" class="form-label black-text">DESCONTO (%)</label>
                    <input type="number" min="0" autocomplete="off" max="100" id="desconto" name="desconto"
                        oninput="validaInputNumber(this);" class="form-control" value="" placeholder="DESCONTO" required>
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
        </form> --}}

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            ITENS
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-full mb-8 px-3 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">PRODUTO</th>
                            <th class="px-4 py-3">QUANTIDADE</th>
                            <th class="px-4 py-3">PREÇO</th>
                            <th class="px-4 py-3">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-ms font-semibold border">CATALISADOR/TUPER X123X-201X</td>
                            <td class="px-4 py-3 text-sm border">4</td>
                            <td class="px-4 py-3 text-sm font-semibold border">R$ 450.00</td>
                            <td class="px-4 py-3 text-sm font-semibold border">R$ 1800.00</td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm font-semibold border">TOTAL</td>
                            <td colspan="2" class="px-4 py-3 text-sm font-semibold border">4</td>
                            <td class="px-4 py-3 text-sm font-semibold border">R$ 1800.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            FINALIZAR VENDA
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>


        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <form id="realizarVenda" method="GET" class="flex flex-col pt-3 md:pt-8"
                    action="{{ route('venda.index') }}">
                    <div class="flex flex-col pt-4">
                        <label for="idformapagamento"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">FORMA DE
                            PAGAMENTO</label>
                        <select id="idformapagamento" name="idformapagamento"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            <option value="1">CARTÃO - À VISTA</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>VALOR TOTAL DA VENDA</label>
                        <input type="text" value="R$ 1800.00"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>

                    <input type="submit" value="FINALIZAR"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
                </form>
            </div>
        </div>
    </section>
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
                        if (confirm(
                                "Possui produto selecionado! Deseja mesmo finalizar a venda sem inserir o item?"
                            )) {
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
