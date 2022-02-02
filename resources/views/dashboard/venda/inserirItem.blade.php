@extends('layouts.window')

@section('title', 'Inserir item')

@section('content')
    <section class="bg-gray-100 h-screen">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            INSERIR ITEM
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <form>
            <div class="container mx-auto text-gray-800">
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <p class="text-center text-3xl">PESQUISAR</p>

                    <div class="flex flex-col">
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">CATEGORIA</span>
                            <select name="categoria">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->idcategoria }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">MARCA</span>
                            <select name="marca">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->idmarca }}">{{ $marca->marca }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">REFERÊNCIA</span>
                            <input type="text" name="referencia"
                                class="px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none">
                        </label>

                        <div class="mb-3">
                            <input type="submit" value="PESQUISAR"
                                class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="w-full mb-8 px-3 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">CATEGORIA</th>
                            <th class="px-4 py-3">MARCA</th>
                            <th class="px-4 py-3">REFERÊNCIA</th>
                            <th class="px-4 py-3">ESTOQUE</th>
                            <th class="px-4 py-3">PREÇO</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($produtos as $produto)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $produto->categoria->categoria }}
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $produto->marca->marca }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $produto->referencia }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $produto->quantidade }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">R$ {{ $produto->valorvenda }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                    <a href="#">
                                        <button >SELECIONAR</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection('content')
