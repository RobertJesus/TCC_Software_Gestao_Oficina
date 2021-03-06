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
                <h5>Produtos</h5>
            </center>
            <div class="row card" style="border: 1px solid black;">
                <div class="form-row">
                    <table class="table" >
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