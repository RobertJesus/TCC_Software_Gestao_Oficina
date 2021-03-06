@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Cadastrar Ordens de Serviço</p>
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
        <div class="pai" id="pai">
            <form action="{{ route('service.store') }}" method="post" >
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Protocolo</label>
                        <input type="text" name="protocol" id="protocol" class="form-control" value="<?php echo date('YmdHis') ?>">
                    </div>
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cliente</label>
                        <select name="name" id="name" class="form-control">
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
                    <div class="form-group col-md-4">
                    <label for="inputCity">Veiculo</label>
                        <select name="brand" id="brand" class="form-control" value="[]">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Serviço</label>
                        <select name="service" id="service" class="form-control">
                                <option>Financeiro</option>
                                <option>Manutenção</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Prioridade</label>
                        <select name="priority" id="priority" class="form-control">
                                <option>Alta</option>
                                <option>Normal</option>
                                <option>Baixa</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Status</label>
                        <select name="status" id="status" class="form-control">
                                <option>Aberto</option>
                                <option>Em andamento</option>
                                <option>Fechado</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Responsavel</label>
                        <select name="responsible" id="responsible" class="form-control">
                        <option></option>
                            <?php if(empty($user) == null) { ?>
                                <?php foreach($user as $data){ ?>
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
                    <div class="form-group col-md-6">
                        <label>Descrição</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Data de Execução</label>
                        <input type="date" name="dateExec" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
            </div>
    <!-- /.form-box -->
    @section('post-script')
    <script>
        $('select[name=name]').change(function () {
            var id = $(this).val();
            $.get('get-auto/' + id, function (autos) {
                $('select[name=brand]').empty();
                $.each(autos, function (key, value) {
                    $('select[name=brand]').append('<option value=' + value.id + '>' + value.brand + '</option>');
                });
            });
        });
        
        
    </script>
@endsection
@stop