@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <!-- Definir um logo -->
            <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
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
            <center>
                <h4 class="card-title">Central do Assinante</h4>
                <h6 class="card-subtitle mb-2 text-muted">Informe seu CPF ou CNPJ para acessar a area do cliente.</h6>
            </center>
            <form method="POST" action="{{route('central.login')}}" name="form_consulta">
            {!! csrf_field() !!}
                <div class="form-group">
                    <!--<input type="text" name="record" id="name" class="form-control" placeholder="CPF ou CNPJ do assinante" name="record" />-->
                    <div style="float:left;">
                        <input type="radio" value="cpf" name="rad" onClick =0>CPF
                        <input type="radio" value="cnpj" name="rad" onClick =0 style="padding-left:10px;">CNPJ
                    </div>
                    <input type="text" class="form-control" name="record" size="18" OnKeyUp="cnpj_cpf(this.name,this.value,'form_consulta',this.form)" onKeypress="campo_numerico()" maxlength="18" value='' placeholder="CPF ou CNPJ do assinante">
                </div>
                <button class="btn btn-info btn-sm btn-block" type="submit">
                    <a id="btnSubmit">Acessar a Central do Assinante</a>
                </button>
            </form>
        </div>  
    </div>    
@stop