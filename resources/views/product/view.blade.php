@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Cadastro do Fornecedor</p>
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
    <table class="table table-hover">
        <tbody>
            <?php foreach($product as $data){ ?>
                <tr class="float-left">
                    <td>Codigo do Produto:</td>
                    <td>{{$data->cod}}</td>
                </tr>
                <tr class="float-left">
                    <td>Descrição:</td>
                    <td>{{$data->description}}</td>
                </tr>
                <tr class="float-left">
                    <td>Marca</td>
                    <td>{{$data->brand}}</td>
                </tr>
                <tr class="float-left">
                        <td>Preço Entrada:</td>
                        <td>{{$data->priceNew}}</td>
                        <td>Preço Venda:</td>
                        <td>{{$data->priceOld}}</td>
                </tr>
                <tr class="float-left">
                        <td>Fornecedor:</td>
                        <td>{{$data->provider}}</td>
                </tr>
                <tr class="float-left">
                    <td>Quantidade: </td>
                    <td>{{$data->amount}}</td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop