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
            <form>
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
                    <div class="form-group col-md-3 has-feedback {{$errors->has('date') ? 'has-erro' : '' }}">
                        <label for="inputData">Data de Nascimento</label>
                        <input for="date" class="form-control" placeholder="19/09/1997">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCpf">CPF/CNPJ</label>
                        <input for="text" class="form-control" placeholder="12345678">
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('sexo') ? 'has-erro' : '' }}">
                        <label>Sexo</label>
                            <select class="form-control">
                                <option selected>Feminino</option>
                                <option>Masculino</option>
                            </select>
                        </label>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
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
                    <div class="form-group col-md-2 has-feedback {{$errors->has('tel') ? 'has-error' : '' }}">
                        <label for="inputTel">Celular 1</label>
                        <input type="tel" class="form-control" placeholder="19-99121-0699">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('date') }}</strong>
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
                    <div class="form-group col-md-5 has-feedback {{$errors->has('end') ? 'has-error' : '' }}">
                        <label for="inputCity">Endereço</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Endereço">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('end'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('end') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('num') ? 'has-error' : '' }}">
                        <label for="inputNum">Numero</label>
                        <input type="number" class="form-control" placeholder="123">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('num'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('num') }}</strong>
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
                        <input type="text" class="form-control" id="inputCity" placeholder="Cidade">
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
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('uf'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('uf') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('cep') ? 'has-error' : '' }}">
                        <label for="inputZip">CEP</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="13835-000">
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