@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Produtos</p>
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
            <a href="{{route('newProd')}}" class=""> 
                <button type="submit" class="btn btn-success" >Novo Cliente</button>
            </a>
        </div>
        <div class="form-group col-md-6">
            <form class="form-inline" action="{{ url(config('adminlte.product', 'search')) }}" method="post">
            {!! csrf_field() !!}
                <div class="float-right" style="margin-bottom: 10px">
                    <input type="text" class="form-control" style="margin-right: 10px;" placeholder="Pesquisar produto" name="name">
                    <button type="submit" class="btn btn-primary my-1">Buscar</button>
                </div>
            </form>
        </div><hr>
    </div>
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo de Barra</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Preço Entrada</th>
                    <th scope="col">Preço Venda</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Exclui</th>
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
                        <td><a href="{{ route('viewProd', $data->id)}}" class="text-success"><i class="fa fa-file-text-o"></i></a></td>
                        <td><a href="{{ route('editProd', $data->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('destroyProd', $data->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop