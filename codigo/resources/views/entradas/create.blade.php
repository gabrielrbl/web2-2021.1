@extends('layouts.main')

@section('title', 'Cadastro de Entradas')

@section('content')
   <div>
        <form action="{{ route('entradas.store') }}" method="post">
            @csrf

            <div class="input">
                <label for="idfornecedor">Selecione um fornecedor</label>
                <select name="idfornecedor">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
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
                <div class="area-produto">
                    <div class="input-produto-quant d-flex">
                        <div class="input-group">
                            <label for="idproduto">Selecione o produto</label>
                            <select name="idproduto[]" onchange="setValor(this)">
                                <option value="" disabled selected>Selecione</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>
                            @error('idproduto') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="input-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade[]" value="0" min="1" onchange="setValor(this)" required>
                            @error('quantidade') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="input-group">
                            <label for="precocompra">Valor compra <small>(R$)</small></label>
                            <input type="number" min="1" step="any" name="precocompra[]" value="0" onchange="setValor(this)" required>
                            @error('precocompra') <strong>{{ $message }}</strong> @enderror
                        </div>
                        <div class="input-group">
                            <label>Valor total <small>(R$)</small></label>
                            <input type="text" class="valor-total" value="R$ 0.00" disabled>
                        </div>
                        <div style="margin-top:40px">
                            <a href="#" class="btn btn-danger remove-btn" onclick="remove(this)">REMOVER</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input">
                <label>TOTAL</label>
                <input type="text" class="valor-total-venda" value="R$ 0.00" disabled>
            </div>

            <div class="input">
                <button type="submit">
                    REGISTRAR
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