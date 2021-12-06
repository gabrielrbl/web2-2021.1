@extends('layouts.dashboard')

@section('title', 'Potências')

@section('content')
    <main class="container-fluid bg-light text-dark">
        <section class="container py-3">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2">
                    <a href="{{ route('consulta.motor') }}" class="btn btn-primary">VOLTAR</a>
                </div>

                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">CADASTRAR POTÊNCIA DE MOTOR</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light vh-100">
            <section class="container min-vh-100 py-5">
                <form method="GET" id="form">
                    <div class="row">
                        <div class="col-6 col-md-4 col-sm-12 mb-3">
                            <label for="potencia" class="form-label black-text">POTÊNCIA DO MOTOR</label>
                            <input type="text" oninput="validaInput(this, true)" id="potencia" name="potencia"
                                class="form-control" maxlength="3" placeholder="POTÊNCIA" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row text-start">
                        <div class="col-6 col-md-12 col-sm-6 mb-3">
                            <button type="button" id="cadastrar" class="btn btn-primary">CADASTRAR</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection('content')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#form").on("click", "#cadastrar", function() {
                    event.preventDefault();
                    $("button[type=submit]").prop("disabled", true);
                    $("button[type=submit]").text("CADASTRANDO...");

                    window.location.href = '{{ route('consulta.motor') }}';
                }
            });
        });
    </script>
@endpush('scripts')
