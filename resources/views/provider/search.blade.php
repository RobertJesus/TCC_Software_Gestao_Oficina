@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Fornecedores</p>
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
    <form class="form-inline" action="{{ url(config('adminlte.provider', 'search')) }}" method="post">
    {!! csrf_field() !!}
        <div class="form-row float-right" style="margin-bottom: 10px">
            <input type="text" class="form-control" style="margin-right: 10px;" placeholder="Pesquisar fornecedor" name="name">
            <button type="submit" class="btn btn-primary my-1">Buscar</button>
        </div>
    </form><hr>
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $provider){ ?>
                    <tr>
                        <td>{{$provider->name}}</td>
                        <td>{{$provider->email}}</td>
                        <td>{{$provider->address}}</td>
                        <td>{{$provider->phoneP}}</td>
                        <td><a href="{{ route('viewPro', $provider->id)}}" class="text-success"><i class="fa fa-file-text-o"></i></a></td>
                        <td><a href="{{ route('editPro', $provider->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('destroyPro', $provider->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop