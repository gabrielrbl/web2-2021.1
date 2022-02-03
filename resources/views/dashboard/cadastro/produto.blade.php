@extends('layouts.dashboard')

@section('title', 'Produtos')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CADASTRAR PRODUTO
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-full flex flex-col text-black">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('produto.store') }}">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="idmotor"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">MOTOR</label>
                        <select id="idmotor" name="idmotor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($motores as $motor)
                                <option value="{{ $motor->idmotor }}">{{ $motor->potencia }}</option>
                            @endforeach
                        </select>
                        @error('idmotor') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idcarro"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">CARRO</label>
                        <select id="idcarro" name="idcarro"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($carros as $carro)
                                <option value="{{ $carro->idcarro }}">{{ $carro->modelo }}</option>
                            @endforeach
                        </select>
                        @error('idcarro') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idvalvulas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">VÁLVULA</label>
                        <select id="idvalvulas" name="idvalvulas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($valvulas as $valvula)
                                <option value="{{ $valvula->idvalvulas }}">{{ $valvula->quantidade }}</option>
                            @endforeach
                        </select>
                        @error('idvalvulas') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idfabricacao"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">FABRICAÇÃO</label>
                        <select id="idfabricacao" name="idfabricacao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($fabricacoes as $fabricacao)
                                <option value="{{ $fabricacao->idfabricacao }}">{{ $fabricacao->ano }}</option>
                            @endforeach
                        </select>
                        @error('idfabricacao') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idlocalizacao"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">LOCALIZAÇÃO</label>
                        <select id="idlocalizacao" name="idlocalizacao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($localizacoes as $localizacao)
                                <option value="{{ $localizacao->idlocalizacao }}">{{ $localizacao->departamento }}
                                </option>
                            @endforeach
                        </select>
                        @error('idlocalizacao') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idcategoria"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">CATEGORIA</label>
                        <select id="idcategoria" name="idcategoria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->idcategoria }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                        @error('idcategoria') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="idmarca"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">MARCA</label>
                        <select id="idmarca" name="idmarca"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value>SELECIONE</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->idmarca }}">{{ $marca->marca }}</option>
                            @endforeach
                        </select>
                        @error('idmarca') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="referencia" class="text-lg">REFERÊNCIA</label>
                        <input type="text" id="referencia" oninput="validaInput(this, true)" name="referencia"
                            placeholder="REFERÊNCIA" autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('referencia') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="unidade" class="text-lg">UNIDADE</label>
                        <input type="text" id="unidade" oninput="validaInput(this, false)" name="unidade"
                            placeholder="UNIDADE" autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('unidade') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <input type="submit" value="CADASTRAR"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
            </div>
        </div>
    </section>
@endsection('content')