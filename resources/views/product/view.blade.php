@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
        <p class="login-box-msg">Dados do Produto</p>
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
            <a href="{{route('product.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="pai">
        <?php foreach($product as $data){ ?>
            <form action="{{ route('product.update', $data->id) }}" method="post" onsubmit="return valida_form_prod(this)">
            <fieldset disabled>
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Codigo do Produto</label>
                        <input type="text" name="cod" id="cod" class="form-control" value="{{$data->cod}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Descrição</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$data->description}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>Marca</label>
                        <input for="text" name="brand" id="brand" class="form-control" value="{{$data->brand}}">
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
                        <input type="text" name="priceNew" id="priceNew" class="form-control" value="{{$data->priceNew}}" id="inputCity">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('bairro') ? 'has-error' : '' }}">
                        <label>Preço Venda</label>
                        <input type="text" name="priceOld" id="priceOld" class="form-control" value="{{$data->priceOld}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Quantidade</label>
                        <input type="text" name="amount" id="amount" class="form-control" min="1" value="{{$data->amount}}">
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
                        <input type="text" name="provider" id="provider" class="form-control" min="1" value="{{$data->provider}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label name="">Nota Fiscal</label>
                        <input type="text" name="invoice" id="invoice" class="form-control" value="{{$data->invoice}}">
                    </div>
                </div>
                </fieldset>
            </form>
        <?php }?>
        </div>
    </div>
    <!-- /.form-box -->
@stop