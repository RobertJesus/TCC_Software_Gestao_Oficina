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
                    <div class="col-md-9">
                        <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;">
                    </div>
                    <div class="col-md-3">
                        <h5>GR Software</h5>
                        <p>CNPJ 00.000.000/0001-84</p>
                        <p>Telefone 3866-0000</p>
                    </div>
                </div>
            </div>
            <hr>
            <center>
                <h5>Produtos</h5>
            </center>
            <div class="row card" style="border: 1px solid black;">
                <div class="form-row">
                    <table class="table" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descrição</th>
                                <th>Marca</th>
                                <th>Preço Entrada</th>
                                <th>Preço Venda</th>
                                <th>Fornecedor</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->cod}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->brand}}</td>
                            <td>{{$product->priceNew}}</td>
                            <td>{{$product->priceOld}}</td>
                            <td>{{$product->provider}}</td>
                            <td>{{$product->amount}}</td>
                        </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>