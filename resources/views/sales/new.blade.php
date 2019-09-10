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
            <div class="form-group col-md-12 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Cliente</label>
                <select name="name" class="form-control stateClient">
                    <?php if(empty($client) == null) { ?>
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
                <label>Série Comprovante</label>
                <input type="text" name="protocol" class="form-control" value="Serie do Comprovante..">
            </div>
            <div class="form-group col-md-4">
                <label>Número Comprovante</label>
                <input type="text" name="protocol" class="form-control" value="Número do Comprovante..">
            </div>
        </div>
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Produto</label>
                    <select name="name" class="form-control stateClient">
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
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
                <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Quantidade</label>
                    <select name="name" class="form-control stateClient">
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
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
                <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Preço Venda</label>
                    <select name="name" class="form-control stateClient">
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
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
                <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Estoque</label>
                    <select name="name" class="form-control stateClient">
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
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
                <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Desconto</label>
                    <select name="name" class="form-control stateClient">
                        <?php if(empty($product) == null) { ?>
                            <?php foreach($product as $data){ ?>
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
                <div class="form-row">
                    <div class="form-group">
                        <a href="{{route('service.index')}}"> 
                        <button type="submit" class="btn btn-info" >Adicionar</button>
                    </div>
                </div>
                <div class="form-row">
                    
                </div>
            </div> 
        </div> 
                                       
    </form>
    
</div>
@stop