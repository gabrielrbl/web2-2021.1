@extends('layouts.main')

@section('title', 'Editar Venda')

@section('content')
    <div>
        <p id="title">
            <span>Editar venda</span>

            <small>
                <a href="{{ route("vendas.create") }}">Adicionar</a>
            </small>
        </p>

        <form action="{{ route("vendas.update") }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $venda->id }}" />

            <div class="input">
                <label for="idcliente">Selecione um cliente</label>
                <select name="idcliente">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($clientes as $cliente)
                        @if($cliente->id == $venda->idcliente)
                            <option value="{{ $cliente->id }}" selected>{{ $cliente->nome }}</option>
                        @else
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endif
                    @endforeach
                </select>
                @error('idcliente') <strong>{{ $message }}</strong> @enderror
            </div>

            <div class="input">
                <a href="#" class="add-btn">
                    ADICIONAR PRODUTO
                </a>
            </div>

            <div class="input" id="produtos">
                @foreach($venda->itensVenda as $itemVenda)
                    <div class="area-produto">
                        <div class="input-produto-quant d-flex">
                            <div class="input-group">
                                <label for="idproduto">Selecione o produto</label>
                                <select name="idproduto[]" onchange="setValor(this)">
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach($produtos as $produto)
                                        @if($produto->id == $itemVenda->idproduto)
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
                                <input type="number" name="quantidade[]" value="{{ $itemVenda->quantidade }}" min="1" onchange="setValor(this)" required>
                                @error('quantidade') <strong>{{ $message }}</strong> @enderror
                            </div>
                            <div class="input-group">
                                <label for="valor-unit">Valor unitário <small>(R$)</small></label>
                                <input type="text" class="valor-unit" value="R$ {{ $itemVenda->valorunitario }}" disabled>
                                @error('precocompra') <strong>{{ $message }}</strong> @enderror
                            </div>
                            <div class="input-group">
                                <label>Valor total <small>(R$)</small></label>
                                <input type="text" class="valor-total" value="R$ {{ $itemVenda->quantidade * $itemVenda->valorunitario }}" disabled>
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
                <input type="text" class="valor-total-venda" value="R$ {{ $venda->valortotal }}" disabled>
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
                if($(this).attr('name') == 'quantidade[]') {
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
                $(element).closest('.input-produto-quant').find('.valor-unit').val("R$ 0.00");
                $(element).closest('.input-produto-quant').find('.valor-total').val("R$ 0.00");
                $(element).closest('.input-produto-quant').find('select[name="idproduto[]"]').val("");
                $(element).closest('.input-produto-quant').find('input[name="quantidade[]"]').val(0);
                setValorTotal();
            }
        }

        let produtos = [];

        <?php foreach($produtos as $produto): ?>
            produtos.push({
                id: <?= $produto->id ?>,
                nome: '<?= $produto->nome ?>',
                valor: parseFloat('<?= $produto->precovenda ?>')
            });
        <?php endforeach; ?>
        
        function setValor(element) {
            let idproduto = $(element).closest('.input-produto-quant').find('select[name="idproduto[]"]').val();
            let quantidade = $(element).closest('.input-produto-quant').find('input[name="quantidade[]"]').val();
            let produto = produtos.find(produto => produto.id == idproduto);

            if(produto) {
                let valor_unit = produto.valor;
                let valor_total = valor_unit * quantidade;

                $(element).closest('.input-produto-quant').find('.valor-unit').val(`R$ ${valor_unit.toFixed(2)}`);
                $(element).closest('.input-produto-quant').find('.valor-total').val(`R$ ${valor_total.toFixed(2)}`);
                setValorTotal();
            }
        }
        
        function setValorTotal() {
            let valor_total = 0;

            $('.valor-total').each(function() {
                valor_total += parseFloat($(this).val().replace('R$ ', ''));
            });

            $('.valor-total-venda').val(`R$ ${valor_total.toFixed(2)}`);
        }
    </script>
@endpush('scripts')