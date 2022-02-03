@extends('layouts.dashboard')

@section('title', 'Venda')

@section('content')
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">REALIZAR VENDA</p>

                <form id="realizarVenda" method="POST" class="flex flex-col pt-3 md:pt-8"
                    action="{{ route('venda.store') }}">
                    @csrf

                    <div class="flex flex-col">
                        <label for="name" class="text-lg">CLIENTE</label>
                        <input type="text" autocomplete="off" id="barraPesquisa"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                        <input id="idcliente" type="hidden" name="idcliente" required>
                        @error('idcliente') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <input type="hidden" name="idformapagamento" value="1" />
                    @error('idformapagamento') <strong>{{ $message }}</strong> @enderror

                    <input type="hidden" name="data" value="{{ date('Y-m-d') }}" />
                    @error('data') <strong>{{ $message }}</strong> @enderror

                    <input type="hidden" name="valortotal" value="0" />
                    @error('valortotal') <strong>{{ $message }}</strong> @enderror

                    <input type="hidden" name="status" value="0" />
                    @error('status') <strong>{{ $message }}</strong> @enderror

                    <input type="submit" value="REALIZAR VENDA"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
                </form>
            </div>
        </div>

        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            VENDAS
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
                            <th class="px-4 py-3">CLIENTE</th>
                            <th class="px-4 py-3">FORMA DE PAGAMENTO</th>
                            <th class="px-4 py-3">DATA</th>
                            <th class="px-4 py-3">STATUS</th>
                            <th class="px-4 py-3">ITENS</th>
                            <th class="px-4 py-3">VALOR TOTAL</th>
                            <th class="px-4 py-3">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($vendas as $venda)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-black">
                                                {{ strtoupper(explode(' ', $venda->cliente->nome)[0]) }}</p>
                                            <p class="text-xs text-gray-600">
                                                {{ strtoupper(explode(' ', $venda->cliente->nome)[1]) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                    {{ strtoupper($venda->formapagamento->forma . ' - ' . $venda->formapagamento->condicao) }}
                                </td>
                                <td class="px-4 py-3 text-sm border">{{ date('d M Y', strtotime($venda->data)) }}</td>
                                <td class="px-4 py-3 text-xs border">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-{{ $venda->status == 1 ? 'green-700 bg-green-100' : 'red-700 bg-red-100' }} rounded-sm">{{ $venda->status == 1 ? 'FINALIZADA' : 'ABERTA' }}</span>
                                </td>
                                {{-- <td class="px-4 py-3 text-xs border">
                                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm">
                                        PENDENTE </span>
                                </td>
                                {{-- <td class="px-4 py-3 text-xs border">
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">
                                        RECUSADO </span>
                                </td> --}}
                                <td class="px-4 py-3 text-sm font-semibold border">{{ $venda->itensvenda->count() }}</td>
                                <td class="px-4 py-3 text-sm font-semibold border">R$ {{ round($venda->valortotal, 2) }}
                                </td>
                                <td class="px-4 py-3 text-xs border">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button"
                                            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            <a class="btn btn-primary"
                                                href="{{ route('venda.itensvenda', $venda->idvenda) }}">VISUALIZAR</a>
                                        </button>
                                        <button type="button"
                                            onclick="deletar('{{ $venda->idvenda }}', '{{ strtoupper(explode(' ', $venda->cliente->nome)[0]) .' ' .strtoupper(explode(' ', $venda->cliente->nome)[1]) }}')"
                                            class="py-2 px-4 text-sm font-medium text-gray-900 bg-red-100 rounded-r-md border border-gray-200 hover:bg-red-300 hover:text-black-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            APAGAR
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection('content')

@push('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('#barraPesquisa').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('venda.getAutocomplete') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            nome: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 3,
                select: (event, ui) => {
                    $("#barraPesquisa").val(ui.item.label);
                    $("#idcliente").val(ui.item.value);

                    return false;
                }
            });

            $("#realizarVenda").on("click", "input[type=submit]", function(e) {
                e.preventDefault();

                if ($("#idcliente").val() == "") {
                    alert("Informe o cliente!");

                    return false;
                } else {
                    $("#realizarVenda").submit();
                    $("#realizarVenda input[type=submit]").prop("disabled", true);
                    $("#realizarVenda input[type=submit]").val("VENDENDO...");
                }
            });
        });

        function deletar(id, nome) {
            alert("Função ainda não disponível!");
            // if (confirm("Deseja realmente excluir a venda de " + nome + "?")) {
            //     alert("Venda excluída com sucesso!");
            //     window.location.href = '';
            //     return false;
            // }
        }
    </script>
@endpush('scripts')
