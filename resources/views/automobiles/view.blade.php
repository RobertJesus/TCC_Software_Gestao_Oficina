@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Detalhes do veiculo</p>
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
        <div class="form-group">
            <a href="{{route('automobiles.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="pai" id="pai">
        <table class="table table-hover">
            <tbody>
                <?php foreach($auto as $data){ ?>
                <tr class="float-left">
                    <td>Cliente:</td>
                    <td>{{$data->client}}</td>
                </tr>
                <tr class="float-left">
                    <td>Quilometro Entrada:</td>
                    <td>{{$data->km}}</td>
                    <td>Média dia:</td>
                    <td>{{$data->kmDay}}</td>
                </tr>
                <tr class="float-left">
                    <td>Proxima Revisão:</td>
                    <td>{{date("d/m/Y", strtotime($data->dateReview))}}</td>
                    <td>Marca Veiculo:</td>
                    <td>{{$data->brand}}</td>
                </tr>
                <?php }?>
        </div><hr>
    </div>
@stop