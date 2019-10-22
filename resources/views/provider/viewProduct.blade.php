@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Produtos do Fornecedor</p>
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
    <div class="row">
        <div class="form-group col-md-12">
            <a href="{{route('provider.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
    </div><hr>
    <div class="table-responsive">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo de Barra</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Preço Entrada</th>
                    <th scope="col">Preço Venda</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Nota Fiscal</th>
                </tr>
            </thead>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $data){ ?>
                    <tr>
                        <td>{{$data->cod}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->brand}}</td>
                        <td>R$ {{$data->priceNew}}</td>
                        <td>R$ {{$data->priceOld}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{$data->invoice}}</td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop