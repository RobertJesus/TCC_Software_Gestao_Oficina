@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Recuperar Senha</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $user){ ?>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{date("d/m/Y", strtotime($user->created_at))}}</td>
                    <td><a href="#" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa fa-trash"></i></a></td>
                    <td><a href="{{ url('/password/reset') }}" class="text-success"><i class="fa fa-lock"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop
