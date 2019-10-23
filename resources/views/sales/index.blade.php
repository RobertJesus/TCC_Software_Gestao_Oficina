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
    <a href="{{route('sales.pdf')}}">
        <button type="button" class="btn btn-success">Gerar PDF</button>
    </a>
    <a href="{{route('sales.new')}}">
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nova Venda</button><br><br>
    </a>
    <div class="table-responsive" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Protocol</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo Pagamento</th>
                    <th scope="col">Total</th>
                    <th scope="col">Data da venda</th>
                    <th scope="col">PDF</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $data){ ?>
                    <tr>
                        <td>{{$data->protocol}}</td>
                        <td>{{$data->client_id}}</td>
                        <td>{{$data->typePay}}</td>
                        <td>R$ {{$data->totalPay}}</td>
                        <td>{{date("d/m/Y", strtotime($data->created_at))}}</td>
                        <td><a href="{{ route('sales.pdfSales', $data->protocol)}}" class="text-danger"><i class="fa fa-file-pdf-o"></i></a></td>
                        <td><a href="{{ route('sales.destroy', $data->protocol)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar esta?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
@stop