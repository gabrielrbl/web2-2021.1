@extends('layouts.dashboard')

@section('title', 'Válvulas')

@section('content')
    <main class="container-fluid bg-light min-vh-100 text-dark">
        <section class="container py-3 text-center container">
            <div class="row">
                <div class="col-6 col-md-6 col-sm-6 mx-auto">
                    <h1 class="display-6">CONSULTAR VÁLVULA</h1>
                </div>
        </section>

        <section class="container-fluid text-dark">
            <div class="row">
                <div class="col mb-3">
                    <input type="text" id="txtBusca" class="form-control border border-5 border-dark" placeholder="Pesquisar por quantidade de válvulas..." aria-describedby="Help">
                    <div id="Help" class="form-text">Digite a quantidade de válvulas...</div>
                </div>
                <div class="col mb-3">
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('cadastro.valvula') }}">NOVO CADASTRO</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">VÁLVULAS</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>8</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="#">VISUALIZAR/EDITAR</a>
                                <button class="btn btn-sm btn-dark" onclick="deletar('1', '8')">APAGAR</button>
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
        function deletar(id, quantidade) {
            if (confirm("Deseja realmente excluir a quantidade de " + quantidade + " valvúlas ?")) {
                alert("Quantidade de válvulas excluída com sucesso!");
                window.location.href = '';
                return false;
            }
        }

        $(document).ready(function() {
            $("#txtBusca").on("keyup", function() {
                const value = $(this).val().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endpush('scripts')