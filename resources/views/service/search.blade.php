@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Ordens de Serviço</p>
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
    <form class="form-inline" action="{{ url(config('adminlte.service', 'searchOs')) }}" method="post">
    {!! csrf_field() !!}
        <div class="form-row float-right" style="margin-bottom: 10px">
            <input type="text" class="form-control" style="margin-right: 10px;" placeholder="Pesquisar OS" name="name">
            <button type="submit" class="btn btn-primary my-1">Buscar</button>
        </div>
    </form><hr>
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
        </table>
    </div>
@stop