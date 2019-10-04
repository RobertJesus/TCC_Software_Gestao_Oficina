@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Dados do Cliente</p>
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
            <a href="{{route('service.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <!--
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-3 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">Cliente</label>
                <select name="cliente" class="form-control stateClient">
                        <option></option>
                    <?php if(empty($client) == null) { ?>
                        <?php foreach($client as $data){ ?>
                            <option>{{$data->name}}</option>
                        <?php }?>
                    <?php }?>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-3 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">      
                <label name="email">E-mail</label>
                <select name="email" class="form-control" value="[]">
                    <option></option>
                </select>
                
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
                </div>
            <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                <label for="inputCity">CPF/CNPJ</label>
                <select name="record" class="form-control" value="[]">
                    <option></option>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>     
        </div>
    </div><br><br>-->
    <div class="register-box-body">
        <form action="{{ route('automobiles.store')}}" method="post">
        {!! csrf_field() !!}
            <div class="form-row">
                <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Cliente</label>
                    <select name="client" class="form-control stateClient">
                            <option></option>
                        <?php if(empty($client) == null) { ?>
                            <?php foreach($client as $data){ ?>
                                <option>{{$data->name}}</option>
                            <?php }?>
                        <?php }?>
                    </select>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('cidade'))
                        <span class="help-block">
                            <strong class="error">{{ $errors->first('cidade') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Quilometro Entrada</label>
                        <input type="text" name="km" id="km" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Média dia</label>
                        <input type="text" name="kmDay" id="kmDay" class="form-control" onblur="calcular()">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Proxima Revisão</label>
                        <input type="date" name="dateReview" id="dateReview" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Placa</label>
                        <input type="text" name="board" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Marca</label>
                        <input type="text" name="brand" class="form-control">
                    </div>
                
            </div>    
                <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
</div>
    <!-- /.form-box -->
    @section('post-script')
<script >
    function calcular(){
        var km, kmDay, revisao, total, cont, atual;
        total = 0;
        cont = 0;
        km = Number(document.getElementById('km').value);
        kmDay = Number(document.getElementById('kmDay').value);
        revisao = km + 1000;
        total = revisao / kmDay;
        total = Math.round(total);
        
        var hoje = new Date();
        var dataVenc = new Date(hoje.getTime() + (total * 24 * 60 * 60 * 1000));
    
        alert('A proxima revisão sera proximo ao dia ' +  dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear());
        //document.getElementById('dateRe').value = + dataVenc.getFullYear() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getDate();
        return;
    }
        $('select[name=cliente]').change(function () {
            var idclient = $(this).val();
            $.get('get-client/' + idclient, function (clients) {
                $('select[name=record]').empty();
                $('select[name=email]').empty();
                $.each(clients, function (key, value) {
                    $('select[name=record]').append('<option value=' + value.id + '>' + value.record + '</option>');
                    $('select[name=email]').append('<option value=' + value.id + '>' + value.email + '</option>');
                });
            });
        });
    </script>
@endsection
@stop