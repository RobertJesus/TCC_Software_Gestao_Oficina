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
            </div>
            <hr>
            <center>
                <h5>Protocolo da venda {{$protocol->protocol}}</h5>
            </center>
            <div class="row card" style="border: 1px solid black;">
                <div class="form-row">
                    <table class="table" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
                        <thead>
                            <tr>
                                <th>Protocolo</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th>Desconto</th>
                                <th>Preço Venda</th>
                            </tr>
                        </thead>
                        @forelse($sales as $data)
                        <tr>
                            <td>{{$data->protocol}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->amount}}</td>
                            <td>R$ {{$data->price}}</td>
                            <td>R$ {{$data->desc}}</td>
                            <td>R$ {{$data->priceV}}</td>
                        </tr>
                        @empty
                        @endforelse
                    </table><br><hr>
                    @forelse($total as $data)
                    <label style="float-right">Total R$ {{$data->totalPay}}</label>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </body>
</html>