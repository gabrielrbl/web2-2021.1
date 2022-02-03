@extends('layouts.dashboard')

@section('title', 'Marcas')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CADASTRAR MARCA
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-full flex flex-col text-black">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('marca.store') }}">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="marca" class="text-lg">MARCA</label>
                        <input type="text" id="marca" oninput="validaInput(this, false)" name="marca" placeholder="MARCA"
                            autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        @error('marca') <strong>{{ $message }}</strong> @enderror
                    </div>

                    <input type="submit" value="CADASTRAR"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
            </div>
        </div>
    </section>
@endsection('content')
