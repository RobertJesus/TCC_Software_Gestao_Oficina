@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Vendas</p>
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
    <div class="form-row">
        <p class="login-box-msg">Lista de Vendas</p>
        <a href="{{route('sales.new')}}">
        <button type="button" class="btn btn-success float-left" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nova Venda</button><br><br>
        </a>
        
    </div><hr>
    <div class="form-row">
        <div class="pai">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Tipo Comprovante</th>
                        <th scope="col">Taxa</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                
                <?php if(empty($list) == null){ ?>
                    <?php foreach($list as $sales){ ?>
                        <tr>
                            <td>{{$client->data}}</td>
                            <td>{{$client->client}}</td>
                            <td>{{$client->vouchertype}}</td>
                            <td>{{$client->rate}}</td>
                            <td>{{$client->total }}</td>
                            <td>{{$client->state}}</td>
                            <td><a href="{{ route('sales.view', $client->id)}}" class="text-danger"><i class="fa fa-file-text-o"></i></a></td>
                            <td><a href="{{ route('sales.destroy', $client->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar esta?')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
@stop