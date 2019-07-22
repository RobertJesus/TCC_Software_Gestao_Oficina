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
                    <div class="form-group col-md-6 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control inputEmail"
                            placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="text" name="email" class="form-control inputEmail"
                            placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Endereço</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputNum">Numero</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-2">
                        <label for="inputZip">CEP</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.form-box -->
@stop