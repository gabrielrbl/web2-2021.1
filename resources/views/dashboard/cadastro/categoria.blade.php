@extends('layouts.dashboard')

@section('title', 'Categorias')

@section('content')
    <section class="bg-gray-100 py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            CADASTRAR CATEGORIA
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div class="w-full flex flex-col text-black">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <form class="flex flex-col pt-3 md:pt-8" method="GET" id="form">
                    <div class="flex flex-col pt-4">
                        <label for="categoria" class="text-lg">CATEGORIA</label>
                        <input type="text" id="categoria" oninput="validaInput(this, true)" name="categoria" maxlength="30"
                            placeholder="CATEGORIA" autocomplete="off" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <input type="submit" value="CADASTRAR"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
            </div>
        </div>
    </section>
@endsection('content')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#form").on("submit", function() {
                event.preventDefault();
                $("input[type=submit]").prop("disabled", true);
                $("input[type=submit]").text("CADASTRANDO...");

                window.location.href = '{{ route('consulta.categoria') }}';
            });
        });
    </script>
@endpush('scripts')
