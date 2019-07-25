@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
        @if(session('success'))
            <div class="alert alert-info" role="alert">
                {{session('success')}}
            </div>
        @endif
        <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
        <div class="pai">
            <form action="{{ url(config('adminlte.client', 'insert')) }}" method="post">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Nome/Razão Social</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Data de Nascimento</label>
                        <input type="date" name="data" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>CPF/CNPJ</label>
                        <input for="text" name="CPF/CNPJ" class="form-control" placeholder="12345678">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('CPF/CNPJ'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('CPF/CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label>Sexo</label>
                            <select class="form-control">
                                <option selected>Feminino</option>
                                <option>Masculino</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('celular') ? 'has-error' : '' }}">
                        <label>Celular 1</label>
                        <input type="tel" name="celular" class="form-control" placeholder="19-99121-0699">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('celular'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputTel">Celular 2</label>
                        <input type="tel" class="form-control" placeholder="19-99121-0699">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputTel">Telefone</label>
                        <input type="tel" class="form-control" placeholder="19-3866-0000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5 has-feedback {{$errors->has('endereço') ? 'has-error' : '' }}">
                        <label for="inputCity">Endereço</label>
                        <input type="text" name="endereço" class="form-control" id="inputCity" placeholder="Endereço">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereço'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereço') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Numero</label>
                        <input type="number" name="numero" class="form-control" placeholder="123">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCom">Complemento</label>
                        <input type="text" class="form-control" placeholder="Complemento">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Cidade">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{$errors->has('uf') ? 'has-error' : '' }}">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control">
                            <option selected>Acre</option>
                            <option>Alagoas</option>
                            <option>Amapá</option>
                            <option>Amazonas</option>
                            <option>Bahia</option>
                            <option>Ceará</option>
                            <option>Espírito Santo</option>
                            <option>Goiás</option>
                            <option>Maranhão</option>
                            <option>Mato Grosso</option>
                            <option>Mato Grosso do Sul</option>
                            <option>Minas Gerais</option>
                            <option>Pará</option>
                            <option>Paraíba</option>
                            <option>Paraná</option>
                            <option>Pernambuco</option>
                            <option>Piauí</option>
                            <option>Rio de Janeiro</option>
                            <option>Rio Grande do Norte</option>
                            <option>Rio Grande do Sul</option>
                            <option>Rondônia</option>
                            <option>Roraima</option>
                            <option>Santa Catarina</option>
                            <option>São Paulo</option>
                            <option>Sergipe</option>
                            <option>Tocantins</option>
                            <option>Distrito Federal</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cep') ? 'has-error' : '' }}">
                        <label for="inputZip">CEP</label>
                        <input type="text" name="cep" class="form-control" id="inputZip" placeholder="13835-000">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>
    <!-- /.form-box -->
@stop