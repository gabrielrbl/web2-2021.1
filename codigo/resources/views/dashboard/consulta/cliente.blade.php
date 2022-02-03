@extends('layouts.dashboard')

@section('title', 'Clientes')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CONSULTAR CLIENTE
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex justify-end">
                <a href="{{ route('cadastro.cliente') }}">
                    <button type="button"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        NOVO CADASTRO</button>
                </a>
            </div>

            <div class="flex flex-col pt-6">
                <div class="flex items-center w-full mx-auto bg-white rounded-full">
                    <div class="w-full">
                        <input type="search" class="w-full px-4 py-1 text-gray-900 rounded-full focus:outline-none"
                            placeholder="Pesquisar nome..." id="txtBusca">
                    </div>

                    <div>
                        <button type="submit"
                            class="flex items-center justify-center w-12 h-12 text-gray-100 bg-gray-300 rounded-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mb-8 px-3 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">NOME</th>
                            <th class="px-4 py-3">TELEFONE</th>
                            <th class="px-4 py-3">TIPO/IDENTIFICAÇÃO</th>
                            <th class="px-4 py-3">DÉBITO</th>
                            <th class="px-4 py-3">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($clientes as $cliente)
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
                                                {{ strtoupper(explode(' ', $cliente->nome)[0]) }}</p>
                                            <p class="text-xs text-gray-600">
                                                {{ strtoupper(explode(' ', $cliente->nome)[1]) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $cliente->telefone }}</td>
                                <td class="px-4 py-3 text-sm border">Cliente
                                    {{ $cliente->cpf ? 'PF / CPF: ' . $cliente->cpf : 'PJ / CNPJ: ' . $cliente->cnpj }}
                                </td>
                                <td class="px-4 py-3 text-xs border">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $cliente->debito }}</span>
                                </td>
                                {{-- <td class="px-4 py-3 text-xs border">
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm">
                                PENDENTE </span>
                        </td>
                        {{-- <td class="px-4 py-3 text-xs border">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">
                                RECUSADO </span>
                        </td> --}}
                                <td class="px-4 py-3 text-xs border">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button"
                                            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            <a class="btn btn-primary" onclick="alert('Função ainda não disponível!'); return false;" href="#">VISUALIZAR</a>
                                        </button>
                                        <button type="button"
                                            onclick="deletar('{{ $cliente->idcliente }}', '{{ strtoupper(explode(' ', $cliente->nome)[0]) . ' ' . strtoupper(explode(' ', $cliente->nome)[1]) }}')"
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
        function deletar(id, nome) {
            alert("Função ainda não disponível!");
            // if (confirm("Deseja realmente excluir " + nome + "?")) {
            //     alert("Cliente excluído com sucesso!");
            //     window.location.href = '';
            //     return false;
            // }
        }

        $(document).ready(function() {
            $("#txtBusca").on("keyup", function() {
                const value = $(this).val().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                $("table tbody tr td div div p").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().normalize('NFD').replace(
                        /[\u0300-\u036f]/g, "").indexOf(value) > -1);
                });
            });
        });
    </script>
@endpush('scripts')
