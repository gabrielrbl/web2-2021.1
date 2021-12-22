<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

    <title>Socape - @yield('title')</title>
</head>

<body class="leading-normal tracking-normal text-white">
    <nav class="bg-white fixed w-full z-30 top-0">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-black no-underline font-bold text-2xl lg:text-4xl" href="#">
                    SOCAPE
                </a>
            </div>

            <div
                class="w-full flex-grow lg:flex lg:items-center lg:w-auto mt-2 lg:mt-0 bg-white lg:bg-transparent p-4 lg:p-0 z-20">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline py-2 px-4"
                            href="{{ route('dashboard.index') }}">INÍCIO</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline py-2 px-4"
                            href="{{ route('venda.index') }}">VENDER</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline py-2 px-4"
                            href="{{ route('entrada.index') }}">DAR ENTRADA</a>
                    </li>
                    <li class="mr-3">
                        <div class="dropdown inline-block relative">
                            <button class="inline-block text-black no-underline py-2 px-4">CONSULTAR</button>
                            <ul class="dropdown-menu absolute hidden text-black pt-1 bg-gray-300">
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.cliente') }}">CLIENTE</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.fornecedor') }}">FORNECEDOR</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.produto') }}">PRODUTO</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.carro') }}">CARRO</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.localizacao') }}">LOCALIZAÇÃO</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.valvula') }}">VÁLVULA</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.categoria') }}">CATEGORIA</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.motor') }}">MOTOR</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.fabricacao') }}">FABRICAÇÃO</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('consulta.marca') }}">MARCA</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mr-3">
                        <div class="dropdown inline-block relative">
                            <button class="inline-block text-black no-underline py-2 px-4">MINHA CONTA</button>
                            <ul class="dropdown-menu absolute hidden text-black pt-1 bg-gray-300">
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        {{-- href="{{ route('usuario.perfil') }}" --}}
                                        >PERFIL</a>
                                </li>
                                <li>
                                    <a class="rounded-t py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('usuario.logout') }}">SAIR</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <section class="bg-white pt-14 h-screen">
        @yield('content')
    </section>

    <footer class="bg-white fixed bottom-0 w-full">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="no-underline font-bold text-2xl lg:text-4xl" href="#">
                        SOCAPE
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Desenvolvido por Gabriel Lobo</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/validaInput.js') }}"></script>
    <script src="{{ asset('js/mascara.js') }}"></script>
</body>

@stack('scripts')

</html>
