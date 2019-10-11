@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
        <p class="login-box-msg">Cadastrar Fornecedor</p>
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
            <a href="{{route('provider.new')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="pai">
            <form action="{{ route('provider.store') }}" method="post" name="form_consulta">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label>Razão Social</label>
                        <input type="text" name="name" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('data') ? 'has-error' : '' }}">
                        <label>Nome Fantasia</label>
                        <input type="text" name="nameFant" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('data'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('data') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{ $errors->has('CPF/CNPJ') ? 'has-error' : '' }}">
                        <label>
                        
                            <input type="radio" value="cnpj" name="rad" onClick =0 checked="checked">CNPJ
                        </label>
                        <input type="text" class="form-control" name="record" size="18" OnKeyUp="cnpj_cpf(this.name,this.value,'form_consulta',this.form)" onKeypress="campo_numerico()" maxlength="18" value=''>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('CPF/CNPJ'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('CPF/CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{ $errors->has('celular') ? 'has-error' : '' }}">
                        <label>Celular 1</label>
                        <input type="text" name="phoneP" class="form-control">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('celular'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label name="telefone">Telefone</label>
                        <input type="text" name="tell" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('endereco') ? 'has-error' : '' }}">
                        <label for="inputCity">Endereço</label>
                        <input type="text" name="address" class="form-control" id="inputCity">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 has-feedback {{$errors->has('bairro') ? 'has-error' : '' }}">
                        <label>Bairro</label>
                        <input type="text" name="bai" class="form-control" id="inputCity">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2 {{$errors->has('numero') ? 'has-error' : '' }}">
                        <label>Numero</label>
                        <input type="text" name="numberHouse" class="form-control" min="1">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label name="complemento">Complemento</label>
                        <input type="text" name="comp" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cidade</label>
                        <input type="text" name="city" class="form-control" id="inputCity">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3 has-feedback {{$errors->has('uf') ? 'has-error' : '' }}">
                        <label for="inputState">Estado</label>
                        <select id="inputState" name="state" class="form-control">
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
                        <input type="number" name="cep" class="form-control" id="inputZip">
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
    <script type="text/javascript">
    function campo_numerico (){
        if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
    }
    /*function cnpj_cpf verifica qual das funcoes tem que chamar cpf ou cnpj*/
    function cnpj_cpf(campo,documento,f,formi){
            mascara_cnpj (campo,documento,f);
    }

    function mascara_cnpj (campo,documento,f){
        var mydata = '';
        mydata = mydata + documento;

        if(mydata.length == 2){
            mydata = mydata + '.';
            ct_campo = eval("document."+f+"."+campo+".value = mydata");
            ct_campo;
        }
        if(mydata.length == 6){
            mydata = mydata + '.';
            ct_campo = eval("document."+f+"."+campo+".value = mydata");
            ct_campo;
        }
        if(mydata.length == 10){
        mydata = mydata + '/';
        ct_campo1 = eval("document."+f+"."+campo+".value = mydata");
        ct_campo1;
        }
        if(mydata.length == 15){
            mydata = mydata + '-';
            ct_campo1 = eval("document."+f+"."+campo+".value = mydata");
            ct_campo1;
        }

        if(mydata.length == 18){
            valida_cnpj(f,campo);
        }
    }
    function mascara_cpf (campo,documento,f){
        var mydata = '';
        mydata = mydata + documento;
        if (mydata.length == 3){
            mydata = mydata + '.';
            ct_campo = eval("document."+f+"."+campo+".value = mydata");
            ct_campo;
        }
        if(mydata.length == 7){
            mydata = mydata + '.';
            ct_campo = eval("document."+f+"."+campo+".value = mydata");
            ct_campo;
        }
        if(mydata.length == 11){
            mydata = mydata + '-';
            ct_campo1 = eval("document."+f+"."+campo+".value = mydata");
            ct_campo1;
        }
        if(mydata.length == 14){
            valida_cpf(f,campo);
        }
    }


    function valida_cnpj(f,campo){
        pri = eval("document."+f+"."+campo+".value.substring(0,2)");
        seg = eval("document."+f+"."+campo+".value.substring(3,6)");
        ter = eval("document."+f+"."+campo+".value.substring(7,10)");
        qua = eval("document."+f+"."+campo+".value.substring(11,15)");
        qui = eval("document."+f+"."+campo+".value.substring(16,18)");

        var i;
        var numero;
        var situacao = '';

        numero = (pri+seg+ter+qua+qui);

        s = numero;

        c = s.substr(0,12);
        var dv = s.substr(12,2);
        var d1 = 0;

        for(i = 0; i < 12; i++){
        d1 += c.charAt(11-i)*(2+(i % 8));
        }
        if(d1 == 0){
        var result = "falso";
        }
        d1 = 11 - (d1 % 11);
        if(d1 > 9) d1 = 0;
        if(dv.charAt(0) != d1){
            var result = "falso";
        }
        d1 *= 2;
        for(i = 0; i < 12; i++){
        d1 += c.charAt(11-i)*(2+((i+1) % 8));
        }
        d1 = 11 - (d1 % 11);
        if(d1 > 9) d1 = 0;
        if(dv.charAt(1) != d1){
            var result = "falso";
        }
        if(result == "falso") {
        alert("CNPJ incorreto!");
        aux1 = eval("document."+f+"."+campo+".focus");
        aux2 = eval("document."+f+"."+campo+".value = ''");
        }
    }
    function valida_cpf(f,campo){
        pri = eval("document."+f+"."+campo+".value.substring(0,3)");
        seg = eval("document."+f+"."+campo+".value.substring(4,7)");
        ter = eval("document."+f+"."+campo+".value.substring(8,11)");
        qua = eval("document."+f+"."+campo+".value.substring(12,14)");

        var i;
        var numero;

        numero = (pri+seg+ter+qua);

        s = numero;
        c = s.substr(0,9);
        var dv = s.substr(9,2);
        var d1 = 0;

        for(i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
        }
        if(d1 == 0){
        var result = "falso";
        }
        d1 = 11 - (d1 % 11);
        if(d1 > 9) d1 = 0;
        if(dv.charAt(0) != d1){
        var result = "falso";
        }
        d1 *= 2;
        for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
        }
        d1 = 11 - (d1 % 11);
        if(d1 > 9) d1 = 0;
        if(dv.charAt(1) != d1){
        var result = "falso";
        }
        if(result == "falso") {
        alert("CPF incorreto!");
        aux1 = eval("document."+f+"."+campo+".focus");
        aux2 = eval("document."+f+"."+campo+".value = ''");
    }
}
</script>
@stop