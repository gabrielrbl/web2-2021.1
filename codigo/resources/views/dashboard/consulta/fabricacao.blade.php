@extends('layouts.dashboard')

@section('title', 'Anos de fabricação')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CONSULTAR ANO DE FABRICAÇÃO
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <div class="flex justify-end">
                <a href="{{ route('cadastro.fabricacao') }}">
                    <button type="button"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        NOVO CADASTRO</button>
                </a>
            </div>
        </div>

        <div class="w-full mb-8 px-3 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">ANO</th>
                            <th class="px-4 py-3">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-ms font-semibold border">1990</td>
                            <td class="px-4 py-3 text-xs border">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button"
                                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        <a class="btn btn-primary" href="#">VISUALIZAR</a>
                                    </button>
                                    <button type="button" onclick="deletar('1', '1990')"
                                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-red-100 rounded-r-md border border-gray-200 hover:bg-red-300 hover:text-black-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        APAGAR
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection('content')

@push('scripts')
    <script>
        function deletar(id, ano) {
            if (confirm("Deseja realmente excluir o ano de fabricação " + ano + "?")) {
                alert("Ano de fabricação excluído com sucesso!");
                window.location.href = '';
                return false;
            }
        }
    </script>
@endpush('scripts')
