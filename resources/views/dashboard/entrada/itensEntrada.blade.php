@extends('layouts.dashboard')

@section('title', 'Itens entrada')

@section('content')
    <section class="bg-gray-100 py-8">
        @if (\Session::has('success'))
            <script>
                alert('{!! \Session::get('success') !!}');
            </script>
        @endif

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            ITENS - ENTRADA #{{ $entrada->identrada }}
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">INFORMAÇÕES DO FORNECEDOR</p>
                <div class="flex flex-col">
                    <div class="mb-3">
                        <label>NOME</label>
                        <input type="text"
                            value="{{ strtoupper(explode(' ', $entrada->fornecedor->nome)[0]) .' ' .strtoupper(explode(' ', $entrada->fornecedor->nome)[1]) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>ENDEREÇO</label>
                        <input type="text"
                            value="{{ strtoupper(explode(' ', $entrada->fornecedor->nome)[0]) .' ' .strtoupper(explode(' ', $entrada->fornecedor->nome)[1]) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>TELEFONE</label>
                        <input type="text" value="{{ $entrada->fornecedor->telefone }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label>CNPJ</label>
                        <input type="text" value="{{ $entrada->fornecedor->cnpj }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                            disabled>
                    </div>
                </div>
            </div>
        </div>

        @if ($entrada->status == 0)
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                INSERIR PRODUTO
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <form method="POST" id="inserirItensEntrada" action="{{ route('itensentrada.store') }}">
                @csrf

                <input type="hidden" name="identrada" value="{{ $entrada->identrada }}">
                @error('identrada') <strong>{{ $message }}</strong> @enderror

                <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                    <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                        <div class="mb-3 flex justify-between">
                            <input type="text" value="{{ $produto ? $produto->referencia : 'SELECIONE O PRODUTO...' }}"
                                disabled>
                            <input type="hidden" id="idproduto" name="idproduto"
                                value="{{ $produto ? $produto->idproduto : '' }}" required>
                            <a class="btn btn-primary ms-auto" title="Editar"
                                onclick="window.open(`{{ route('entrada.inseriritem', $entrada->identrada) }}`, 'Pesquisar produto', 'width=1000,height=800'); return false;">
                                <button
                                    class="px-4 py-2 font-semibold text-sm bg-black text-white rounded-full shadow-sm">PESQUISAR</button>
                            </a>
                            @error('idproduto') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>PREÇO DE COMPRA</label>
                            <input type="number" min="0" autocomplete="off" id="precoCompra"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                name="precocompra" value="{{ $produto ? $produto->valordecompra : '' }}"
                                placeholder="PREÇO DE COMPRA" {{ $produto ? 'required' : 'disabled' }}>
                            @error('precocompra') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>QUANTIDADE</label>
                            <input type="number" min="1" autocomplete="off" id="quantidade"
                                max="{{ $produto ? $produto->quantidade : '' }}" name="quantidade"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="QUANTIDADE" {{ $produto ? 'required' : 'disabled' }}>
                            @error('quantidade') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>UNIDADE</label>
                            <input type="text" maxlength="2" autocomplete="off" id="unidade" name="unidade"
                                oninput="validaInput(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="UNIDADE" {{ $produto ? 'required' : 'disabled' }}>
                            @error('unidade') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>IPI (%)</label>
                            <input type="number" min="1" autocomplete="off" max="100" id="ipi" name="ipi"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="IPI" {{ $produto ? 'required' : 'disabled' }}>
                            @error('ipi') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>FRETE (%)</label>
                            <input type="number" min="1" autocomplete="off" max="100" id="frete" name="frete"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="FRETE" {{ $produto ? 'required' : 'disabled' }}>
                            @error('frete') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>ICMS (%)</label>
                            <input type="number" min="1" autocomplete="off" max="100" id="icms" name="icms"
                                oninput="validaInputNumber(this);"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="ICMS" {{ $produto ? 'required' : 'disabled' }}>
                            @error('icms') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="mb-3">
                            <label>VALOR TOTAL</label>
                            <input type="text" id="valorTotalItem" value="R$0.0"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                disabled>
                        </div>
                        <div class="mb-3 flex justify-end">
                            <button id="inserir" {{ $produto ? '' : 'disabled' }}
                                class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">INSERIR</button>
                        </div>
                    </div>
                </div>
                @if ($produto)
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

                    <script>
                        var qtd = $("#quantidade"),
                            preco = $("#precoCompra"),
                            ipi = $("#ipi"),
                            frete = $("#frete"),
                            icms = $("#icms"),
                            total = $("#valorTotalItem");
                        qtd.change(function() {
                            if (qtd.val() < 0) {
                                alert('Quantidade inválida.');
                                qtd.val("");
                            }
                            calculaValor();
                        });
                        ipi.change(function() {
                            if (ipi.val() < 1) {
                                alert('IPI inválido.');
                                ipi.val("1");
                            } else if (qtd.val() > 0) {
                                calculaValor();
                            }
                        });
                        frete.change(function() {
                            if (frete.val() < 1) {
                                alert('Frete inválido.');
                                frete.val("1");
                            } else if (qtd.val() > 0) {
                                calculaValor();
                            }
                        });
                        icms.change(function() {
                            if (icms.val() < 1) {
                                alert('ICMS inválido.');
                                icms.val("1");
                            } else if (qtd.val() > 0) {
                                calculaValor();
                            }
                        });
                        preco.change(function() {
                            if (preco.val() < 0) {
                                alert("Valor não pode ser menor que zero!");
                                preco.val("0");
                            } else if (preco.val() == "") {
                                preco.val("{{ $produto->valornafabrica }}");
                                calculaValor();
                            } else {
                                calculaValor();
                            }
                        });

                        function calculaValor() {
                            total.val("");

                            var QTD = qtd.val() != "" ? qtd.val() : 0,
                                IPI = ipi.val() != "" ? ipi.val() : 1,
                                FRETE = frete.val() != "" ? frete.val() : 1,
                                ICMS = icms.val() != "" ? icms.val() : 1;

                            var valor = parseFloat((IPI * FRETE * ICMS) * (QTD * preco.val())).toFixed(2);
                            total.val("R$" + valor);
                        }
                    </script>
                @endif
            </form>
        @endif

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            ITENS
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="mb-8 mx-20 overflow-hidden rounded-lg shadow-lg">
            <table class="w-full">
                <thead>
                    <tr
                        class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">PRODUTO</th>
                        <th class="px-4 py-3">PREÇO</th>
                        <th class="px-4 py-3">QUANTIDADE</th>
                        <th class="px-4 py-3">UNIDADE</th>
                        <th class="px-4 py-3">IPI</th>
                        <th class="px-4 py-3">FRETE</th>
                        <th class="px-4 py-3">ICMS</th>
                        <th class="px-4 py-3">TOTAL</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($entrada->itensentrada as $key => $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $key + 1 }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">
                                {{ $item->produto->categoria->categoria .'/' .$item->produto->marca->marca .' - ' .$item->produto->referencia }}
                            </td>
                            <td class="px-4 py-3 text-sm border">{{ $item->precocompra }}</td>
                            <td class="px-4 py-3 text-sm border">{{ $item->quantidade }}</td>
                            <td class="px-4 py-3 text-sm border">{{ $item->unidade }}</td>
                            <td class="px-4 py-3 text-sm border">{{ $item->ipi }}</td>
                            <td class="px-4 py-3 text-sm border">{{ $item->frete }}</td>
                            <td class="px-4 py-3 text-sm border">{{ $item->icms }}</td>
                            <td class="px-4 py-3 text-sm font-semibold border">R$
                                {{ $item->quantidade * $item->precocompra }}</td>
                        </tr>
                    @endforeach
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm font-semibold border"></td>
                        <td colspan="2" class="px-4 py-3 text-sm font-semibold border">TOTAL</td>
                        <td class="px-4 py-3 text-sm font-semibold border">
                            {{ $entrada->countItensEntrada() }}</td>
                        <td colspan="4" class="px-4 py-3 text-sm font-semibold border"></td>
                        <td class="px-4 py-3 text-sm font-semibold border">R$ {{ round($entrada->valortotalnota, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($entrada->status == 0)
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                FINALIZAR ENTRADA
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <form id="realizarEntrada" method="POST" class="flex flex-col pt-3 md:pt-8"
                        action="{{ route('entrada.finalizarentrada', $entrada->identrada) }}">
                        @csrf
                        <div class="mb-3">
                            <label>VALOR TOTAL DA ENTRADA</label>
                            <input type="text" value="R$ {{ round($entrada->valortotalnota, 2) }}"
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
                    if (confirm(
                            "Possui produto selecionado! Deseja mesmo finalizar a entrada sem inserir o item?"
                        )) {
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
