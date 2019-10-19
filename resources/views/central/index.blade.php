<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Central do Assinante</title>
       
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    </head>
    <body style="background-color: #F2F7F8;">
        <div class="row">
            <div class="form-row">
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filtro Avançado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                                @forelse($salesProduct as $data)
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
                                b  <label style="float-right">Total R$ {{$total}}</label>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><hr>
        

            <div class="card form-group col"  style="margin-top:0px!important;flex-direction: inherit;" >
            <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;">
                <ul class="nav justify-content-end float-left" style="padding-top:15px;">
                    <li class="nav-item">
                        <a class="nav-link">{{$name}}</a>
                        <?php if(empty($client) == null){ ?>
                            <?php foreach($client as $data){ ?>
                                <a class="nav-link">{{$data->record}}</a>
                            <?php } ?>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills cor" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Inicio</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ordens de Serviço</a>
                    <a class="nav-link" id="v-pills-profile-tab"  href="{{route('central.central')}}">Sair</a>
                </div>
            </div>
            <div class="col-md-9 cor"><br><br>
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
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card" style="margin-top:20px!important">
                        <p>Seja bem vindo a nossa central do assinante, aqui você pode ter informções a respeito da sua ordem de serviço.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h5 class="float-left">Ordens de Serviço</h5>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Protocolo</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Status</th>
                            <th scope="col">Data Abertura</th>
                            <th scope="col">Responsavel</th>
                            <th scope="col">Detalhe</th>
                            <th scope="col">Venda</th>
                        </tr>
                    </thead>
                    <?php if(empty($list) == null){ ?>
                        <?php foreach($list as $data){ ?>
                            <tr>
                                <td>{{$data->protocol}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->service}}</td>
                                <td>{{$data->status}}</td>
                                <td>{{date("d/m/Y", strtotime($data->created_at))}}</td>
                                <td>{{$data->responsible}}</td>
                                <td><a href="{{ route('service.notes', $data->id)}}" class="text-success"><i class="fa fa-search"></i></td>
                                <td>
                                    <a href="#" class="text-success" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-search">
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>