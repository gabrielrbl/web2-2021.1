<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Socape - @yield('title')</title>
</head>

<body>
    <img class="img-fluid w-100" src="{{ asset('images/titulo.png') }}">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-1">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacao">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navegacao">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}">INÍCIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('venda.index') }}">VENDER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entrada.index') }}">DAR ENTRADA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">CONSULTAR</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="{{ route('consulta.cliente') }}">CLIENTE</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.fornecedor') }}">FORNECEDOR</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('consulta.produto') }}">PRODUTO</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.carro') }}">CARRO</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.localizacao') }}">LOCALIZAÇÃO</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('consulta.valvula') }}">VÁLVULA</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.categoria') }}">CATEGORIA</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.motor') }}">MOTOR</a></li>
                            <li><a class="dropdown-item" href="{{ route('consulta.fabricacao') }}">FABRICAÇÃO</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('consulta.marca') }}">MARCA</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">MINHA
                            CONTA</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <h6 class="dropdown-header">Olá Gabriel Lobo</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('usuario.perfil') }}">PERFIL</a></li>
                            <li><a class="dropdown-item" href="{{ route('usuario.logout') }}">SAIR</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/validaInput.js') }}"></script>
    <script src="{{ asset('js/mascara.js') }}"></script>
</body>

@stack('scripts')

</html>
