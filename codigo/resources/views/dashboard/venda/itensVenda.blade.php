@extends('layouts.dashboard')

@section('title', 'Itens venda')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            ITENS - VENDA #{{ $venda->idvenda }}
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
                        <input type="text"
                            value="{{ strtoupper(explode(' ', $venda->cliente->nome)[0]) . ' ' . strtoupper(explode(' ', $venda->cliente->nome)[1]) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>TELEFONE</label>
                        <input type="text" value="{{ $venda->cliente->telefone }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>CPF</label>
                        <input type="text" value="{{ $venda->cliente->cpf }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            INSERIR PRODUTO
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        {{--  --}}

        <form method="POST" id="inserirItensVenda" action="{{ route('venda.inseriritemvenda', $venda->idvenda) }}">
            @csrf
            <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <div class="flex flex-col">
                        <div class="mb-3">
                            <input type="text" value="{{ $produto ? $produto->referencia : 'SELECIONE O PRODUTO...' }}"
                                disabled>
                            <input type="hidden" id="idproduto" name="idproduto"
                                value="{{ $produto ? $produto->idproduto : '' }}" required>
                            <a class="btn btn-primary ms-auto" title="Editar"
                                onclick="window.open(`{{ route('venda.inseriritem', $venda->idvenda) }}`, 'Pesquisar produto', 'width=1000,height=800'); return false;">
                                <button
                                    class="px-4 py-2 font-semibold text-sm bg-black text-white rounded-full shadow-sm">PESQUISAR</button>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label>PREÇO</label>
                            <input type="number" min="0" autocomplete="off" id="valorvenda"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                name="valorvenda" value="{{ $produto ? $produto->valorvenda : '' }}"
                                placeholder="PREÇO DE VENDA" {{ $produto ? 'required' : 'disabled' }}>
                        </div>
                        <div class="mb-3">
                            <label>QUANTIDADE</label>
                            <input type="number" min="1" autocomplete="off" id="quantidade"
                                max="{{ $produto ? $produto->quantidade : '' }}" name="quantidade"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="QUANTIDADE" {{ $produto ? 'required' : 'disabled' }}>
                        </div>
                        <div class="mb-3">
                            <label>DESCONTO (%)</label>
                            <input type="number" min="0" autocomplete="off" max="100" id="desconto" name="desconto"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="DESCONTO" {{ $produto ? 'required' : 'disabled' }}>
                        </div>
                        <div class="mb-3">
                            <label>VALOR TOTAL</label>
                            <input type="text" id="valorTotalItem" value="R$0.0"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <button id="inserir" {{ $produto ? '' : 'disabled' }}
                                class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">INSERIR</button>
                        </div>
                    </div>
                </div>
            </div>
            @if($produto)
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

                <script>
                    var qtd = $("#quantidade"),
                        preco = $("#valorvenda"),
                        desconto = $("#desconto"),
                        total = $("#valorTotalItem");
                    desconto.change(function() {
                        if (desconto.val() < 0 || desconto.val() > 100) {
                            alert("Desconto inválido...");
                            desconto.val("0");
                        } else {
                            var valor = parseFloat({{ $produto->valorvenda }} - ({{ $produto->valorvenda }} * (desconto.val() / 100))).toFixed(2);

                            preco.val(valor);
                            calculaValor();
                        }
                    });
                    qtd.change(function() {
                        if (qtd.val() < 0 || qtd.val() > {{ $produto->quantidade }}) {
                            alert('Quantidade inválida.');
                            qtd.val("");
                        }
                        calculaValor();
                    });
                    preco.change(function() {
                        if (preco.val() < 0) {
                            alert("Valor não pode ser menor que zero!");
                            preco.val("0");
                        } else if (preco.val() == "") {
                            preco.val("{{ $produto->valorvenda }}");
                            calculaValor();
                        } else if (preco.val() > {{ $produto->valorvenda }}) {
                            alert("Valor de venda não pode ser maior que o do produto!");
                            preco.val("{{ $produto->valorvenda }}");
                        } else {
                            calculaDesconto();
                            calculaValor();
                        }
                    });

                    function calculaDesconto() {
                        if (desconto.val() < 0 || desconto.val() > 100) {
                            alert("Desconto inválido...");
                        } else {
                            var valor = parseFloat(100 - (preco.val() * 100 / {{ $produto->valorvenda }})).toFixed(2);
                            desconto.val(valor);
                        }
                    }

                    function calculaValor() {
                        total.val("");

                        var valor, QTD = qtd.val() != "" ? qtd.val() : 0;

                        valor = parseFloat(QTD * preco.val()).toFixed(2);
                        total.val("R$" + valor);
                    }
                </script>
            @endif
        </form>

        {{--  --}}

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
                        @foreach ($venda->itensvenda as $item)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-ms font-semibold border">
                                    {{ $item->produto->categoria->categoria . '/' . $item->produto->marca->marca . ' - ' . $item->produto->referencia }}
                                </td>
                                <td class="px-4 py-3 text-sm border">{{ $item->quantidade }}</td>
                                <td class="px-4 py-3 text-sm font-semibold border">R$ {{ $item->valorvenda }}</td>
                                <td class="px-4 py-3 text-sm font-semibold border">R$
                                    {{ $item->quantidade * $item->valorvenda }}</td>
                            </tr>
                        @endforeach
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm font-semibold border">TOTAL</td>
                            <td colspan="2" class="px-4 py-3 text-sm font-semibold border">
                                {{ $venda->countItensVenda() }}</td>
                            <td class="px-4 py-3 text-sm font-semibold border">R$ {{ $venda->valortotal }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($venda->status == 0)
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                FINALIZAR VENDA
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <form id="realizarVenda" method="POST" class="flex flex-col pt-3 md:pt-8" action="{{ route('venda.finalizarvenda', $venda->idvenda) }}">
                        @csrf
                        <div class="flex flex-col pt-4">
                            <label for="idformapagamento"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">FORMA DE
                                PAGAMENTO</label>
                            <select id="idformapagamento" name="idformapagamento"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($formaspagamento as $formapagamento)
                                    <option value="{{ $formapagamento->idformapagamento }}">
                                        {{ $formapagamento->forma . ' - ' . $formapagamento->condicao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>VALOR TOTAL DA VENDA</label>
                            <input type="text" value="R$ {{ $venda->valortotal }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                disabled>
                        </div>

                        <input type="submit" value="FINALIZAR"
                            class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
                    </form>
                </div>
            </div>
        @endif
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
