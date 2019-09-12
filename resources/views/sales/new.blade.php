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
    <form action="{{ route('sales.new') }}" method="post">
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
            <div class="form-row">
                <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Produto</label>
                    <select name="nome" class="form-control stateClient">
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
                    
                    {!! Form::label('product', 'Produto') !!}
                    {!! Form::select('product', []) !!}
                    
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('cidade'))
                        <span class="help-block">
                            <strong class="error">{{ $errors->first('cidade') }}</strong>
                        </span>
                    @endif
                    </div>
                <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Preço Venda</label>
                    <select name="name" class="form-control stateClient">
                            <option></option>
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
                                <option>R$ {{$data->priceOld}}</option>
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
        <button type="submit" class="btn btn-success" >Adicionar</button>                 
    </form>
    
</div>
@section('post-script')
<script type="text/javascript">
    $('select[name=nome]').change(function () {
        var idproduct = $(this).val();
        $.get('/get-product/' + product, function (product) {
            $('select[name=product]').empty();
            $.each(cidades, function (key, value) {
                $('select[name=product]').append('<option value=' + value.id + '>' + value.product + '</option>');
            });
        });
    });
</script>
@endsection

@stop