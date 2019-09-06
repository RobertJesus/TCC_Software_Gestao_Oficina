@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Clientes</p>
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
        <div class="form-group col-md-6">
            <a href="{{route('client.new')}}" class=""> 
                <button type="submit" class="btn btn-success">Novo Cliente</button>
            </a>
        </div>
        <div class="form-group col-md-6">
            <form class="form-inline" action="{{ route('client.search') }}" method="post">
            {!! csrf_field() !!}
                <div class="form-row float-right" style="margin-bottom: 10px">
                    <input type="text" class="form-control" style="margin-right: 10px;" placeholder="Pesquisar cliente" name="name">
                    <button type="submit" class="btn btn-primary my-1">Buscar</button>
                </div>
            </form>
        </div>
    </div><hr>
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">OS</th>
                </tr>
            </thead>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $client){ ?>
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->phoneP}}</td>
                        <td><a href="{{ route('client.view', $client->id)}}" class="text-success"><i class="fa fa-file-text-o"></i></a></td>
                        <td><a href="{{ route('client.edit', $client->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('client.destroy', $client->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa fa-trash"></i></a></td>
                        <td><a href="" class="text-danger"><i class="fa fa-file-text-o"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop