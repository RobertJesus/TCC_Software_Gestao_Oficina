@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Editar Ordem de Serviço</p>
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
        <?php foreach($order as $data){ ?>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Protocolo</label>
                    <select class="form-control">
                        <option>{{$data->protocol}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                    <label for="inputCity">Cliente</label>
                    <select name="name" id="name" class="form-control">
                                <option>{{$data->name}}</option>
                    </select>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('cidade'))
                        <span class="help-block">
                            <strong class="error">{{ $errors->first('cidade') }}</strong>
                        </span>
                    @endif
                </div>
            <form action="{{ route('service.update', $data->id) }}" method="post">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Setor</label>
                        <select name="service" id="service" class="form-control" value="{{$data->service}}">
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
                        <select name="priority" id="priority" class="form-control" value="{{$data->priority}}">
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
                        <select name="status" id="status" class="form-control" value="{{$data->status}}">
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
                        <select name="responsible" id="responsible" class="form-control" value="{{$data->responsible}}">
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
                        <label>Descrição do serviço</label>
                        <textarea type="text" name="descriptionSer" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Data de Execução</label>
                        <input type="date" name="dateExec" class="form-control" value="{{$data->dateExec}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label>Finalizar OS</label>
                        <select name="statusFin" class="form-control">
                                <option>Não</option>
                                <option>Sim</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        <?php }?>
        </div><hr>
        <!--
        <button type="submit" class="btn btn-secondary" onclick="fechar_div();">Cadastrar Veiculo</button>
        <div class="pai" id="filho" style="display:none;">
        <p class="login-box-msg">Veiculos</p>
        <?php if(empty($id) == null){ ?>
            <form action="{{ route('service.store', $id)}}" method="post">
                {!! csrf_field() !!}
                <?php }?>
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Quilometro Entrada</label>
                        <input type="text" name="km" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Média dia</label>
                        <input type="text" name="kmDay" class="form-control">
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
        </div>-->
        </div>
    </div>
</div>
    <!-- /.form-box -->
    <script>
        function fechar_div(){
            var x = document.getElementById('filho');
            var y = document.getElementById('pai');
            if (x.style.display === 'none') {
                x.style.display = 'block';
                y.style.display = 'none';
            } else {
                x.style.display = 'none';
                y.style.display = 'block';
            }
        }
    </script>
@stop