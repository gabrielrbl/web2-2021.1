@extends('layouts.dashboard')

@section('title', 'Categorias')

@section('content')
    <main class="container-fluid bg-light text-dark">
        <section class="container py-3">
            <div class="row align-items-center d-flex">
                <div class="col-2 col-md-2 col-sm-2">
                    <a href="{{ route('consulta.categoria') }}" class="btn btn-primary">VOLTAR</a>
                </div>

                <div class="col-8 col-md-8 col-sm-8 text-center">
                    <span class="display-6">CADASTRAR CATEGORIA</span>
                </div>
            </div>
        </section>

        <div class="py-5 bg-light">
            <section class="container min-vh-100 py-5">
                <form method="GET" id="form">
                    <div class="row">
                        <div class="col-6 col-md-4 col-sm-12 mb-3">
                            <label for="categoria" class="form-label black-text">CATEGORIA</label>
                            <input type="text" id="categoria" name="categoria" oninput="validaInput(this, false)"
                                class="form-control" placeholder="CATEGORIA" maxlength="30" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4 col-sm-12 mb-3">
                            <button type="submit" class="btn btn-primary">CADASTRAR</button>
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
            $("#form").on("submit", function() {
                event.preventDefault();
                $("button[type=submit]").prop("disabled", true);
                $("button[type=submit]").text("CADASTRANDO...");

                window.location.href = '{{ route('consulta.valvula') }}';
            });
        });
    </script>
@endpush('scripts')
