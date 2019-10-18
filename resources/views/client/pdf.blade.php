<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Título Opcional</title>
        <link rel="stylesheet" href="{{asset('public/css/style.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('public/css/app.css')}}" type="text/css">
        
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
                <h5>Clientes</h5>
            </center>
            <div class="row card" style="border: 1px solid black;">
                <div class="form-row">
                    <table class="table" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF/CPNJ</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        @forelse($client as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->record}}</td>
                            <td>{{$data->record}}</td>
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