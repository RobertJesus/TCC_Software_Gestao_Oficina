
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Central do Assinante</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <!--<div class="form-group">
                    <a class="navbar-brand"><img src="https://static.ferramentaskennedy.com.br/storage/assets/tools1.png" style="width:125px;"></a>
                </div>-->
            </header>
            <div class="row d-flex justify-content-center"> 
                <div class="form-group col-md-4">
                    <div class="central">
                        <div class="card card-body text-center">
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
                            <h4 class="card-title">Central do Assinante</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Informe seu CPF ou CNPJ para acessar a area do cliente.</h6>
                            <form method="POST" action="{{route('central.login')}}" name="form_consulta">
                            {!! csrf_field() !!}
                                <div class="form-group">
                                    <!--<input type="text" name="record" id="name" class="form-control" placeholder="CPF ou CNPJ do assinante" name="record" />-->
                                    <input type="text" class="form-control" name="record" size="18" OnKeyUp="cnpj_cpf(this.name,this.value,'form_consulta',this.form)" onKeypress="campo_numerico()" maxlength="18" value='' placeholder="CPF ou CNPJ do assinante">
                                    <input type="radio" value="cpf" name="rad" onClick =0>CPF
                                    <input type="radio" value="cnpj" name="rad" onClick =0 style="padding-left:10px;">CNPJ
                                </div>
                                <button class="btn btn-info btn-sm btn-block" type="submit">
                                    <a id="btnSubmit">Acessar a Central do Assinante</a>
                                </button>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    function campo_numerico (){
        if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
    }
    /*function cnpj_cpf verifica qual das funcoes tem que chamar cpf ou cnpj*/
    function cnpj_cpf(campo,documento,f,formi){
        form = formi;

        for(Count = 0; Count < 2; Count++){
            if (form.rad[Count].checked)
                break;
        }
        if (Count == 0){
            mascara_cpf (campo,documento,f);
        }else{
            mascara_cnpj (campo,documento,f);
        }
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