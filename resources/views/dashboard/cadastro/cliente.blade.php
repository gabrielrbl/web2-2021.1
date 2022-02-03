@extends('layouts.dashboard')

@section('title', 'Clientes')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CADASTRAR CLIENTE
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-full flex flex-col text-black">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('cliente.store') }}">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="selecionar"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">TIPO</label>
                        <select id="selecionar" name="tipoCliente"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="fisico">FÍSICO</option>
                            <option value="juridico">JURIDICO</option>
                        </select>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="nome" class="text-lg">NOME</label>
                        <input type="text" id="nome" oninput="validaInput(this, false)" name="nome" placeholder="NOME"
                            autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('nome') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="telefone" class="text-lg">TELEFONE</label>
                        <input type="text" id="telefone" oninput="mascara(this, 'tel')" name="telefone"
                            placeholder="TELEFONE" autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('telefone') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4 rowCpf">
                        <label for="cpf" class="text-lg">CPF</label>
                        <input type="text" id="cpf" oninput="mascara(this, 'cpf')" name="cpf" placeholder="CPF"
                            autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('cpf') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4 rowCnpj hidden">
                        <label for="cnpj" class="text-lg">CNPJ</label>
                        <input type="text" id="cnpj" oninput="mascara(this, 'cnpj')" name="cnpj" placeholder="CNPJ"
                            autocomplete="off"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('cnpj') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <input type="hidden" name="debito" value="0" />

                    <input type="submit" value="CADASTRAR"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
            </div>
        </div>
    </section>
@endsection('content')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#selecionar").change(function() {
                if ($(this).val() == "fisico") {
                    $("#cnpj").removeAttr("required");
                    $(".rowCnpj").addClass("hidden");
                    $(".rowCpf").removeClass("hidden");
                    $("#cpf").addAttr("required");
                } else if ($(this).val() == "juridico") {
                    $("#cpf").removeAttr("required");
                    $(".rowCpf").addClass("hidden");
                    $(".rowCnpj").removeClass("hidden");
                    $("#cnpj").addAttr("required");
                }
            });
        });
    </script>
@endpush('scripts')
