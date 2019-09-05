@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
        <p class="login-box-msg">Cadastrar Produto</p>
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
            <a href="{{route('indexP')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="pai">
        <?php foreach($product as $data){ ?>
            <form action="{{ route('updateProd', $data->id) }}" method="post">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Codigo do Produto</label>
                        <input type="text" name="cod" class="form-control nameClient" value="{{$data->cod}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Descrição</label>
                        <input type="text" name="description" class="form-control nameClient" value="{{$data->description}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>Marca</label>
                        <input for="text" name="brand" class="form-control idenClient" value="{{$data->brand}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('CPF/CNPJ'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('CPF/CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2 has-feedback {{$errors->has('endereco') ? 'has-error' : '' }}">
                        <label for="inputCity">Preço Entrada</label>
                        <input type="text" name="priceNew" class="form-control endClient" value="{{$data->priceNew}}" id="inputCity">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('bairro') ? 'has-error' : '' }}">
                        <label>Preço Venda</label>
                        <input type="text" name="priceOld" class="form-control bairroClient" value="{{$data->priceOld}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Quantidade</label>
                        <input type="text" name="amount" class="form-control numClient" min="1" value="{{$data->amount}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Fornecedor</label>
                        <select name="provider" class="form-control stateClient" >
                                <?php foreach($provider as $dat){ ?>
                                    <option>{{$dat->name}}</option>
                                <?php }?>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label name="">Nota Fiscal</label>
                        <input type="text" name="invoice" class="form-control compClient" value="{{$data->invoice}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        <?php }?>
        </div>
    </div>
    <!-- /.form-box -->
@stop