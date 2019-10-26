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
            <a href="{{route('client.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="">
        <?php foreach($list as $data){ ?>
            <fieldset>
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Nome/Razão Social</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.full_name') }}" value="{{$data->name}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Data de Nascimento</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{$data->date}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>CPF/CNPJ</label>
                        <input for="text" name="record" id="record" class="form-control" value="{{$data->record}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('CPF/CNPJ'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('CPF/CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label>Sexo</label>
                            <select class="form-control" name="sex" id="sex" value="{{$data->sex}}" readonly>
                                <option>{{$data->sex}}</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label>E-mail</label>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.email') }}" value="{{$data->email}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('celular') ? 'has-error' : '' }}">
                        <label>Celular 1</label>
                        <input type="text" name="phoneP" id="phoneP" class="form-control" value="{{$data->phoneP}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('celular'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top:32px;">MSG</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nova Mensagem</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('client.msg', $data->id) }}" method="post">
                                {!! csrf_field() !!}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Mensagem</label>
                                            <textarea class="form-control" id="message-text" name="msg"></textarea>
                                            <label class="col-form-label">Telefone</label>
                                            <input type="tel" class="form-control" name="num" value="55{{$data->phoneP}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Tem certeza que deseja enviar um SMS para o cliente?')">Enviar SMS</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label name="celular2">Celular 2</label>
                        <input type="text" name="phoneS" class="form-control" value="{{$data->phoneS}}" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label name="telefone">Telefone</label>
                        <input type="text" name="tell" class="form-control" value="{{$data->tell}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('endereco') ? 'has-error' : '' }}">
                        <label for="inputCity">Endereço</label>
                        <input type="text" name="address" id="address" class="form-control" id="inputCity" value="{{$data->address}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('bairro') ? 'has-error' : '' }}">
                        <label for="inputCity">Bairro</label>
                        <input type="text" name="district" id="district" class="form-control" id="inputCity" value="district" readonly> 
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Numero</label>
                        <input type="text" name="numberHouse" id="numberHouse" class="form-control" value="{{$data->numberHouse}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label name="complemento">Complemento</label>
                        <input type="text" name="comp" class="form-control" value="{{$data->comp}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cidade</label>
                        <input type="text" name="city" -id="city" class="form-control" id="inputCity" value="{{$data->city}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{$errors->has('uf') ? 'has-error' : '' }}">
                        <label for="inputState">Estado</label>
                        <select id="inputState" name="state" id="state" class="form-control" value="{{$data->state}}" readonly>
                            <option>{{$data->state}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cep') ? 'has-error' : '' }}">
                        <label for="inputZip">CEP</label>
                        <input type="number" name="cep" id="cep" class="form-control" id="inputZip" value="{{$data->cep}}" readonly>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <?php } ?>
                </fieldset>
        </div>
    </div>
    <!-- /.form-box -->
@stop