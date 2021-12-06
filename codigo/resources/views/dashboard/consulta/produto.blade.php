@extends('layouts.dashboard')

@section('title', 'Produtos')

@section('content')
    <main class="container-fluid bg-light min-vh-100 text-dark">
        <section class="container py-3 text-center container">
            <div class="row">
                <div class="col-6 col-md-6 col-sm-6 mx-auto">
                    <h1 class="display-6">CONSULTAR PRODUTO</h1>
                </div>
            </div>
        </section>

        <section class="container-fluid text-dark">
            <div class="row">
                <div class="col mb-3">
                    <input type="text" id="txtBusca" class="form-control border border-5 border-dark" placeholder="Pesquisar por categoria, marca ou referência..." aria-describedby="produtoHelp" autofocus>
                    <div id="produtoHelp" class="form-text">Digite a categoria, marca ou referência do produto...</div>
                </div>
                <div class="col mb-3">
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('cadastro.produto') }}">NOVO CADASTRO</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CATEGORIA/MARCA</th>
                        <th scope="col">REFERÊNCIA</th>
                        <th scope="col">QUANTIDADE</th>
                        <th scope="col">VALOR DE VENDA</th>
                        <th scope="col">LOCALIZAÇÃO</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>CATALISADOR/TUPER</td>
                        <td>X9POTE-03SIENA</td>
                        <td>40</td>
                        <td>R$ 118.99</td>
                        <td>DEPART. 1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="#">VISUALIZAR/EDITAR</a>
                                <button class="btn btn-sm btn-dark" onclick="deletar('1', 'X9POTE-03SIENA', 'CATALISADOR/TUPER')">APAGAR</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection('content')

@push('scripts')
    <script>
        function deletar(id, referencia, categoria) {
            if (confirm("Deseja realmente excluir o produto de referência " + referencia + " " + categoria + "?")) {
                alert("Produto excluído com sucesso!");
                window.location.href = '';
                return false;
            }
        }

        $(document).ready(function() {
            $("#txtBusca").on("keyup", function() {
                const value = $(this).val().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "").indexOf(value) > -1);
                });
            });
        });
    </script>
@endpush('scripts')