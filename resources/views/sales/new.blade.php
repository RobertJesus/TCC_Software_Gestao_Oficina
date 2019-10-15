@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Nova Venda</p>
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-group">
        <a href="{{route('service.index')}}"> 
            <button type="submit" class="btn btn-info" >Voltar</button>
        </a>
    </div>
    <form action="{{route('sales.store')}}" method="post">
        {!! csrf_field() !!}
        <div class="form-row">
            <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Cliente</label>
                <select name="name" class="form-control">
                    <?php if(empty($client) == null) { ?>
                        <option></option>
                        <?php foreach($client as $data){ ?>
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        <?php }?>
                    <?php }?>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Tipo de Comprovante</label>
                <select name="service" class="form-control">
                        <option>Dinheiro</option>
                        <option>Cartão</option>
                        <option>Cheque</option>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label>Número Comprovante</label>
                <input type="text" name="protocol" class="form-control" value="<?php echo date('YmdHis') ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Produto</label>
                <select name="produto" id="produto" class="form-control">
                        <option value="0"></option>
                    <?php if(empty($product) == null) { ?>
                        <?php foreach($product as $data){ ?>
                            <option value="{{$data->id}}">{{$data->description}}</option>
                        <?php }?>
                    <?php }?>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">      
                <label name="amount">Quantidade</label>
                <input type="number" step="1" name="amount" id="amount" class="form-control">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Preço</label>
                <select name="priceOld" id="priceOld" class="form-control" value="[]">
                    <option value="[]"></option>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Desconto</label>
                <input type="text" name="desc" id="desc" class="form-control" onblur="calcular()">
                
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Total</label>
                <input type="text" name="totalPro" id="totalPro" class="form-control">
                
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>             
        </div>
        <button type="button" class="btn btn-primary btn-block" id="novoproduto" onclick="fechar_div();">Adicionar Produto</button>               
        <div class="pai" id="filho" style="display:none;">
            <div class="form-group col-md-12">
                <h1>Produtos</h1><hr>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Desconto</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="items"></tbody>
                </table>
                <table class="table"> 
                    <tr>
                        <td>TOTAL PRODUTOS</td>
                        <td style="text-align:right;"><b><span id="totalProdutos"></span></b></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td style="text-align:right;"><b><span id="total"></span></b></td>
                    </tr>
                </table>
                    
                    <input type="hidden" name="status" value="pedido" id="status">
                    <input type="submit" onclick="pedido();" class="btn btn-success" style="aling-center;" value="Finalizar"></button>
            </div>
        </div>
    </form>
</div>
@section('post-script')
<script type="text/javascript">
    $('select[name=produto]').change(function () {
        var idproduct = $(this).val();
        $.get('get-product/' + idproduct, function (produtos) {
            $('select[name=priceOld]').empty();
            $.each(produtos, function (key, value) {
                $('select[name=priceOld]').append('<option value=' + value.priceOld + '>' + value.priceOld + '</option>');
            });
        });
    });
    function calcular(){
        var amount = document.getElementById("amount").value;
        var n1 = document.getElementById("priceOld").value;
        var n2 = document.getElementById("desc").value;
        var n3 = amount * (n1 - n2);
        document.getElementById("totalPro").value = n3.toFixed(2);
    }
    function fechar_div(){
        var x = document.getElementById('filho');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        }
    }
 // Script bruno
    var cliente;
    var produtos = [];
    var produto = null;

    function pedido() {
        $('#status').val('Pendente');
    }
    $('#novoproduto').click(function(e) {
        produto.qtde = +$('#amount').val();
        produto.preco_venda = +$('#priceOld').val();
        produto.nome = +$('#produto').val();
        $('#produto').val(0);;
        $('#amount').val(0);
        $('#priceOld').val(0);
        produto.total = +(produto.qtde * produto.preco_venda);
        produtos.push(produto);
        produto = null;
        criaLista(produtos);
        $('#idproduto').focus();
        calculaTotalPedido();
    });
    function criaLista(novosProdutos) {
        $('#items').empty();
        if (!novosProdutos || !novosProdutos.length) {
            return;
        }
        novosProdutos.forEach(function(produto) {
            var template =
            '<tr> ' +
                '<td colspan="3" class="visible-xs">' + produto.codigo + ' - ' + produto.nome + '</td>'+
            '</tr>' +
            '<tr> ' +
                '<input type="hidden" name="prod_id[]" value="' + produto.id + '">'+
                '<input type="hidden" name="prod_nome[]" value="' + produto.nome + '">'+
                '<input type="hidden" name="prod_qtde[]" value="' + produto.qtde + '">'+
                '<input type="hidden" name="prod_pr[]" value="' + produto.preco_venda + '">'+
                '<input type="hidden" name="prod_tot[]" value="' + produto.total + '">'+
                '<td class="hidden-xs">' + produto.codigo + ' - ' + produto.nome +'</td>'+
                '<td style="text-align:right;">' + produto.qtde + '</td>'+
                '<td style="text-align:right;">' + produto.preco_venda + '</td>'+
                '<td style="text-align:right;">' + produto.total + '</td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-remover" data-codigo="' + produto.id + '">Remover</button></td>'
            '</tr>';
            $('#items').append(template);
        });
        $('.btn-remover').on('click', function(e) {
            if (!confirm('Remover o produto?')) {
                return;
            }

            var prodId = $(e.target).data('codigo');
            
            produtos = produtos.filter(function(x) {
                return x.id != prodId;
            });

            criaLista(produtos);
        });
    }
    function calculaTotalPedido() {
        var total = produtos.sum('total');
        $('#total').text(total);
    }

</script>
@endsection
@stop