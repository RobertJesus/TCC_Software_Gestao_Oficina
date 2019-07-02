@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>nome</th>
                    <th>email</th>
                    <th>data</th>
                    <th>Excluir</th>
                    <th>Recuperar Senha</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $user){ ?>
                <tr>
                    <td><?=$user->id?></td>
                    <td><?=$user->name?></td>
                    <td><?=$user->email?></td>
                    <td><?=date("d/m/Y", strtotime($user->created_at))?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    <!-- /.form-box -->
@stop
