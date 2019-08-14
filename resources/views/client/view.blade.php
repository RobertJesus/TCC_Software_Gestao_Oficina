@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Cadastro do cliente</p>
    <div class="pai">
    <table class="table table-hover">
        <tbody>
            <?php foreach($list as $client){ ?>
                <tr class="float-left">
                    <td>Nome</td>
                    <td>{{$client->name}}</td>
                </tr>
                <tr class="float-left">
                    <td>Data de Nascimento</td>
                    <td>{{date("d/m/Y", strtotime($client->date))}}</td>
                </tr>
                <tr class="float-left">
                    <td>CPF/CNPJ</td>
                    <td>{{$client->record}}</td>
                </tr>
                <tr class="float-left">
                        <td>Sexo</td>
                        <td>{{$client->sex}}</td>
                </tr>
                <tr class="float-left">
                        <td>Email</td>
                        <td>{{$client->email}}</td>
                </tr>
                <tr class="float-left">
                        <td>Celular</td>
                        <td>{{$client->phoneP}}</td>
                        <td>{{$client->phoneS}}</td>
                        <td>{{$client->tell}}</td>
                        <td><button type="button" class="btn btn-success" style="width:50px">SMS</button></td>
                </tr>
                <tr class="float-left">
                    <td>Endereço</td>
                    <td>{{$client->address}}, {{$client->numberHouse}} - {{$client->cep}} - {{$client->city}}/{{$client->state}} - {{$client->comp}}</td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop