@extends('layouts.dashboard')

@section('title', 'Produtos')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            INSERIR PRODUTO
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <form method="POST" action="{{ route('produto.store') }}">
            @csrf

            <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idmotor" class="block text-sm font-medium text-gray-700">MOTOR</label>
                            <select id="idmotor" name="idmotor" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($motores as $motor)
                                    <option value="{{ $motor->idmotor }}">{{ $motor->potencia }}</option>
                                @endforeach
                            </select>
                            @error('idmotor') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idcarro" class="block text-sm font-medium text-gray-700">CARRO</label>
                            <select id="idcarro" name="idcarro" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($carros as $carro)
                                    <option value="{{ $carro->idcarro }}">{{ $carro->modelo }}</option>
                                @endforeach
                            </select>
                            @error('idcarro') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idvalvulas" class="block text-sm font-medium text-gray-700">VÁLVULA</label>
                            <select id="idvalvulas" name="idvalvulas" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($valvulas as $valvula)
                                    <option value="{{ $valvula->idvalvulas }}">{{ $valvula->quantidade }}</option>
                                @endforeach
                            </select>
                            @error('idvalvulas') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idfabricacao" class="block text-sm font-medium text-gray-700">FABRICAÇÃO</label>
                            <select id="idfabricacao" name="idfabricacao" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($fabricacoes as $fabricacao)
                                    <option value="{{ $fabricacao->idfabricacao }}">{{ $fabricacao->ano }}</option>
                                @endforeach
                            </select>
                            @error('idfabricacao') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idlocalizacao" class="block text-sm font-medium text-gray-700">LOCALIZAÇÃO</label>
                            <select id="idlocalizacao" name="idlocalizacao" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($localizacoes as $localizacao)
                                    <option value="{{ $localizacao->idlocalizacao }}">{{ $localizacao->departamento }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idlocalizacao') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idcategoria" class="block text-sm font-medium text-gray-700">CATEGORIA</label>
                            <select id="idcategoria" name="idcategoria" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->idcategoria }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                            @error('idcategoria') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idmarca" class="block text-sm font-medium text-gray-700">MARCA</label>
                            <select id="idmarca" name="idmarca" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->idmarca }}">{{ $marca->marca }}</option>
                                @endforeach
                            </select>
                            @error('idmarca') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="idunidade" class="block text-sm font-medium text-gray-700">UNIDADE</label>
                            <select id="idunidade" name="idunidade" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option selected disabled value>SELECIONE</option>
                                @foreach ($unidades as $unidade)
                                    <option value="{{ $unidade->idunidade }}">{{ $unidade->unidade }}</option>
                                @endforeach
                            </select>
                            @error('idunidade') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="referencia" class="block text-sm font-medium text-gray-700">REFERÊNCIA</label>
                            <input type="text" autocomplete="off" id="referencia" name="referencia" maxlength="20" required
                                oninput="validaInput(this, true)" onkeyup="this.value = this.value.toUpperCase();"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="REFERÊNCIA" />
                            @error('referencia') <strong>{{ $message }}</strong> @enderror
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 text-right sm:px-6 bg-white">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        INSERIR
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection('content')
