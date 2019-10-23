<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Título Opcional</title>
        <link rel="stylesheet" href="{{url('public/css/style.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('public/css/app.css')}}" type="text/css">
        
    </head>
    <body>
        <div class="container" style="border: 1px solid black;">
            <div class="row">
                <div class="form-row">
                    <div class="form-group col">
                        <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;">
                        <ul style="float:right; list-style-type: none;padding-right:50px;">
                            <li>GR Software</li>
                            <li>CNPJ 00.000.000/0001-84</li>
                            <li>Telefone 3866-0000</li>
                        </ul>
                    </div>
                </div>
                </div><hr>
                    <center>
                        <h5>Cliente</h5>
                    </center><hr>
                    <div class="form-row">
                        @forelse($client as $data)
                        <table class="table">
                            <tr>
                                <td>Nome: {{$data->name}} CPF: {{$data->record}}</td>
                            </tr>
                            <tr>
                                <td>Endereço: {{$data->address}}, {{$data->district}} - {{$data->numberHouse}}, {{$data->city}} / {{$data->cep}}</td>
                            </tr>
                            <tr>
                                <td>Telefone: {{$data->phoneP, $data->phoneS}}</td>
                            </tr>
                        </table>
                        @empty
                        @endforelse
                    </div>
                    <hr>
                    <center>
                    <h5>Ordem de Serviço</h5>
                    </center>
                </div>
                <div class="row card" style="border: 1px solid black;">
                    <div class="form-row">
                        <table class="table" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
                            <thead>
                                <tr>
                                    <th>Protocolo</th>
                                    <th>Serviço</th>
                                    <th>Prioridade</th>
                                    <th>Status</th>
                                    <th>Responsavel</th>
                                </tr>
                            </thead>
                            @forelse($order as $data)
                            <tr>
                                <td>{{$data->protocol}}</td>
                                <td>{{$data->service}}</td>
                                <td>{{$data->priority}}</td>
                                <td>{{$data->status}}</td>
                                <td>{{$data->responsible}}</td>
                            </tr>
                        </table>
                        <div class="form-row" style="border:1px solid black;padding-bottom:100px;">
                            <h5>Descrição</h5>
                            {{$data->description}}
                        </div>
                        <div class="form-row" style="border:1px solid black;padding-bottom:100px;">
                            <h5>Observação</h5>
                            @empty
                            @endforelse
                        </div>
                        <div class="form-row">
                            <center>
                            <p>________________________________________</p>
                            <p>Assinatura do cliente</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>