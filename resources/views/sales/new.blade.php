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
    <form action="" method="post">
        {!! csrf_field() !!}
        <div class="form-row">
            <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Cliente</label>
                <select name="name" class="form-control stateClient">
                    <?php if(empty($client) == null) { ?>
                        <option></option>
                        <?php foreach($client as $data){ ?>
                            <option>{{$data->name}}</option>
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
            <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Tipo de Comprovante</label>
                <select name="service" class="form-control stateClient">
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
            <div class="form-group col-md-4">
                <label>Número Comprovante</label>
                <input type="text" name="protocol" class="form-control" placeholder="Número do Comprovante..">
            </div>
        </div>
    </form>
    <form action="" method="post" id="products">
        <div class="form-row">
            <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Produto</label>
                <select name="produto" class="form-control stateClient">
                        <option></option>
                    <?php if(empty($product) == null) { ?>
                        <?php foreach($product as $data){ ?>
                            <option>{{$data->description}}</option>
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
                <select name="amount" class="form-control" value="[]">
                    <option></option>
                </select>
                
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
                </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Preço</label>
                <select name="priceOld" class="form-control" value="[]">
                    <option></option>
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
                <input type="text" class="form-control">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>            
        </div>
        <button type="btn" class="btn btn-success" onclick="fechar_div();">Adicionar Produto</button> 
    </form>
        <button type="submit" class="btn btn-success">Adicionar</button>                 

    <div class="row" id="filho" style="display:none;">
        <div class="form-group col-md-12">
            <h1>Produtos</h1><hr>
            <table id="grid" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@section('post-script')
<script type="text/javascript">
    $('select[name=produto]').change(function () {
        var idproduct = $(this).val();
        $.get('get-product/' + idproduct, function (produtos) {
            $('select[name=amount]').empty();
            $('select[name=priceOld]').empty();
            $.each(produtos, function (key, value) {
                $('select[name=amount]').append('<option value=' + value.id + '>' + value.amount + '</option>');
                $('select[name=priceOld]').append('<option value=' + value.id + '>' + value.priceOld + '</option>');
            });
        });
    });

    function fechar_div(){
            var x = document.getElementById('filho');
            if (x.style.display === 'none') {
                x.style.display = 'block';
            }
        }

    $(document).ready(function(){
	    $('#products').submit(function(){
		var $this = $(this) ;
		var tr = '<tr>'+
			'<td>'+$this.find("select[name='produto']").val()+'</td>'+
			'<td>'+$this.find("select[name='amount']").val()+'</td>'+
			'<td>'+$this.find("select[name='priceOld']").val()+'</td>'+
			'</tr>'
		$('#grid').find('tbody').append( tr );

		return false;
	});
});
</script>
@endsection

@stop