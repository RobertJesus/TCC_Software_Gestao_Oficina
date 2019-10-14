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
                <h5>Fornecedores</h5>
            </center>
            <div class="row card" style="border: 1px solid black;">
                <div class="form-row">
                    <table class="table" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
                        <thead>
                            <tr>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        @forelse($providers as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->nameFant}}</td>
                            <td>{{$data->record}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phoneP}}</td>
                        </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>