<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Central do Assinante</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    </head>
    <body style="background-color: #F2F7F8;">
        <div class="row">
            <div class="card form-group col-md-12" style="margin-top:0px!important" >
            <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link">{{$name}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('central.central')}}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills cor" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Inicio</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ordens de Serviço</a>
                </div>
            </div>
            <div class="col-md-9 cor">
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
                            <th scope="col">Observações</th>
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
                                <td><a href="{{ route('service.notes', $data->id)}}" class="text-success"><i class="fa-search"></i></td>
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