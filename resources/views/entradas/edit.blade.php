@extends('layouts.main')

@section('title', 'Editar Entrada')

@section('content')
    <div>
        <p id="title">
            <span>Editar entrada</span>

            <small>
                <a href="{{ route("entradas.create") }}">Adicionar</a>
            </small>
        </p>

        <form action="{{ route("entradas.update") }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $entrada->id }}" />

            <div class="input">
                <label for="idfornecedor">Selecione um fornecedor</label>
                <select name="idfornecedor">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($fornecedores as $fornecedor)
                        @if($fornecedor->id == $entrada->idfornecedor)
                            <option value="{{ $fornecedor->id }}" selected>{{ $fornecedor->nome }}</option>
                        @else
                            <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                        @endif
                    @endforeach
                </select>
                @error('idfornecedor') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <a href="#" class="add-btn">
                    ADICIONAR PRODUTO
                </a>
            </div>

            <div class="input" id="produtos">
                @foreach($entrada->itensEntrada as $itemEntrada)
                    <div class="area-produto">
                        <div class="input-produto-quant d-flex">
                            <div class="input-group">
                                <label for="idproduto">Selecione o produto</label>
                                <select name="idproduto[]" onchange="setValor(this)">
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach($produtos as $produto)
                                        @if($produto->id == $itemEntrada->idproduto)
                                            <option value="{{ $produto->id }}" selected>{{ $produto->nome }}</option>
                                        @else
                                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('idproduto') <strong>{{ $message }}</strong> @enderror
                            </div>
                            <div class="input-group">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" name="quantidade[]" value="{{ $itemEntrada->quantidade }}" min="1" onchange="setValor(this)" required>
                                @error('quantidade') <strong>{{ $message }}</strong> @enderror
                            </div>
                            <div class="input-group">
                                <label for="precocompra">Valor compra <small>(R$)</small></label>
                                <input type="number" value="{{ $itemEntrada->precocompra }}" min="1" step="any" name="precocompra[]" value="0" onchange="setValor(this)" required>
                                @error('precocompra') <strong>{{ $message }}</strong> @enderror
                            </div>
                            <div class="input-group">
                                <label>Valor total <small>(R$)</small></label>
                                <input type="text" class="valor-total" value="R$ {{ $itemEntrada->quantidade * $itemEntrada->precocompra }}" disabled>
                            </div>
                            <div style="margin-top:40px">
                                <a href="#" class="btn btn-danger remove-btn" onclick="remove(this)">REMOVER</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="input">
                <label>TOTAL</label>
                <input type="text" class="valor-total-venda" value="R$ {{ $entrada->valortotal }}" disabled>
            </div>

            <div class="input">
                <button type="submit">
                    ATUALIZAR
                </button>
            </div>
        </form>
    </div>
@endsection('content')

@push('scripts')
    <script>
        $('.add-btn').click(function() {
            let inputs = $('.input-produto-quant:first');
            inputs.clone().appendTo('#produtos').find('input').each(function() {
                if($(this).attr('name') == 'quantidade[]' || $(this).attr('name') == 'precocompra[]') {
                    $(this).val(0);
                } else {
                    $(this).val('R$ 0.00');
                }
            });
        });

        function remove(element) {
            if($('.input-produto-quant').length > 1) {
                $(element).closest('.input-produto-quant').remove();
                setValorTotal();
            } else {
                $(element).closest('.input-produto-quant').find('.valor-unid').val("R$ 0.00");
                $(element).closest('.input-produto-quant').find('.valor-total').val("R$ 0.00");
                $(element).closest('.input-produto-quant').find('.valor-compra').val(0);
                $(element).closest('.input-produto-quant').find('select[name="idproduto[]"]').val("");
                $(element).closest('.input-produto-quant').find('input[name="quantidade[]"]').val(0);
                setValorTotal();
            }
        }

        function setValor(element) {
            let idproduto = $(element).closest('.input-produto-quant').find('select[name="idproduto[]"]').val();
            let quantidade = $(element).closest('.input-produto-quant').find('input[name="quantidade[]"]').val();
            let precocompra = $(element).closest('.input-produto-quant').find('input[name="precocompra[]"]').val();
            if(idproduto) {
                let valor_total = precocompra * quantidade;
                $(element).closest('.input-produto-quant').find('.valor-total').val(`R$ ${valor_total.toFixed(2)}`);
                setValorTotal();
            }
        }

        function setValorTotal() {
            let valor_total_venda = 0;
            $('.valor-total').each(function() {
                valor_total_venda += parseFloat($(this).val().replace('R$ ', ''));
            });
            $('.valor-total-venda').val(`R$ ${valor_total_venda.toFixed(2)}`);
        }
    </script>
@endpush('scripts')