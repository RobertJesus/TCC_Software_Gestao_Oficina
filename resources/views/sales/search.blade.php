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
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Filtro Avançado</button>
    <div class="pai">
        <div class="form-row">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filtro Avançado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('sales.search') }}" method="post">
                        {!! csrf_field() !!}
                            <div class="modal-body">
                                <div class="form-group" style="width:350px;">
                                    <label for="message-text" class="col-form-label">Nome do cliente:</label><br>
                                    <input type="text" class="form-control" name="client">
                                </div>
                                <div class="form-group" style="width:200px;">
                                    <label for="message-text" class="col-form-label">Protocolo:</label><br>
                                    <input type="text" class="form-control" name="protocol">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><hr>
    </div>
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
                        <td><a href="{{ route('sales.pdfSales', $data->protocol)}}" class="text-warning"><i class="fa fa-file-pdf-o"></i></a></td>
                        <td><a href="{{ route('sales.destroy', $data->protocol)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar esta?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
    <div class="pai">
    {{ $list->links() }}
    </div>
</div>
@stop