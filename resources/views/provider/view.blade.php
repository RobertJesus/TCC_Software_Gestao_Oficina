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
        <a href="{{route('provider.index')}}"> 
            <button type="submit" class="btn btn-info" >Voltar</button>
        </a>
    </div>
    <div class="row">
    <table class="table table-hover">
        <tbody>
            <?php foreach($list as $provider){ ?>
                <tr class="float-left">
                    <td>Razão Social:</td>
                    <td>{{$provider->name}}</td>
                </tr>
                <tr class="float-left">
                    <td>Nome Fantasia:</td>
                    <td>{{$provider->nameFant}}</td>
                </tr>
                <tr class="float-left">
                    <td>CPF/CNPJ:</td>
                    <td>{{$provider->record}}</td>
                </tr>
                <tr class="float-left">
                        <td>Email:</td>
                        <td>{{$provider->email}}</td>
                </tr>
                <tr class="float-left">
                        <td>Celular:</td>
                        <td>{{$provider->phoneP}}</td>
                        <td>Telefone</td>
                        <td>{{$provider->tell}}</td>
                </tr>
                <tr class="float-left">
                    <td>Endereço:</td>
                    <td>{{$provider->address}}, {{$provider->bai}}, {{$provider->numberHouse}} - {{$provider->cep}} - {{$provider->city}} / {{$provider->state}} - {{$provider->comp}}</td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop