@extends('layouts.dashboard')

@section('title', 'Início')

@section('content')
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto flex flex-wrap">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                PRODUTOS MAIS VENDIDOS
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6 pt-4">
                            ESCAPX20-X10
                        </div>
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                            R$ 140,00
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none shadow p-6">
                    <div class="flex items-center justify-start">
                        <button
                            class="mx-auto lg:mx-0 hover:underline text-black font-bold rounded-full my-6 py-4 px-8 shadow-lg">
                            Visualizar
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6 pt-4">
                            ESCAPX20-X10
                        </div>
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                            R$ 140,00
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none shadow p-6">
                    <div class="flex items-center justify-center">
                        <button
                            class="mx-auto lg:mx-0 hover:underline text-black font-bold rounded-full my-6 py-4 px-8 shadow-lg">
                            Visualizar
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6 pt-4">
                            ESCAPX20-X10
                        </div>
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                            R$ 140,00
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none shadow p-6">
                    <div class="flex items-center justify-start">
                        <button
                            class="mx-auto lg:mx-0 hover:underline text-black font-bold rounded-full my-6 py-4 px-8 shadow-lg">
                            Visualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
