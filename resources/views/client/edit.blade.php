@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
        <p class="login-box-msg">Editar Cadastro do Cliente</p>
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
        <div class="row">
        <?php foreach($client as $data){ ?>
            <form action="{{ route('client.update', $data->id) }}" method="post" onsubmit="return valida_form(this)">
                {!! csrf_field() !!}
                
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Nome/Razão Social</label>
                        <input type="text" name="name" id="name" class="form-control nameClient"
                            placeholder="{{ trans('adminlte::adminlte.full_name') }}" value="{{$data->name}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Data de Nascimento</label>
                        <input type="date" name="date" id="date" class="form-control dateClient" value="{{$data->date}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>CPF/CNPJ</label>
                        <input for="text" name="record" id="record" class="form-control idenClient" placeholder="12345678" value="{{$data->record}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('CPF/CNPJ'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('CPF/CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label>Sexo</label>
                            <select class="form-control sexoClient" name="sex" id="sex" value="{{$data->sex}}">
                                <option selected>Feminino</option>
                                <option>Masculino</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label>E-mail</label>
                        <input type="text" name="email" id="email" class="form-control emailClient"
                            placeholder="{{ trans('adminlte::adminlte.email') }}" value="{{$data->email}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('celular') ? 'has-error' : '' }}">
                        <label>Celular 1</label>
                        <input type="text" name="phoneP" id="phoneP" class="form-control celClient" placeholder="19-99121-0699" value="{{$data->phoneP}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('celular'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label name="celular2">Celular 2</label>
                        <input type="text" name="phoneS" class="form-control celClient" placeholder="19-99121-0699" value="{{$data->phoneS}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label name="telefone">Telefone</label>
                        <input type="text" name="tell" class="form-control celClient" placeholder="19-3866-0000" value="{{$data->tell}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5 has-feedback {{$errors->has('endereco') ? 'has-error' : '' }}">
                        <label for="inputCity">Endereço</label>
                        <input type="text" name="address" id="address" class="form-control endClient" id="inputCity" placeholder="Endereço" value="{{$data->address}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('bairro') ? 'has-error' : '' }}">
                        <label for="inputCity">Bairro</label>
                        <input type="text" name="district" id="district" class="form-control bairroClient" id="inputCity" placeholder="Bairro" value="district">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Numero</label>
                        <input type="text" name="numberHouse" id="numberHouse" class="form-control numClient" placeholder="123" min="1" value="{{$data->numberHouse}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label name="complemento">Complemento</label>
                        <input type="text" name="comp" class="form-control compClient" placeholder="Complemento" value="{{$data->comp}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cidade</label>
                        <input type="text" name="city" -id="city" class="form-control cityClient" id="inputCity" placeholder="Cidade" value="{{$data->city}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{$errors->has('uf') ? 'has-error' : '' }}">
                        <label for="inputState">Estado</label>
                        <select id="inputState" name="state" id="state" class="form-control stateClient" value="{{$data->state}}">
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
                        <input type="number" name="cep" id="cep" class="form-control cepClient" id="inputZip" placeholder="13835-000" value="{{$data->cep}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <?php } ?>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>
    <!-- /.form-box -->
@stop