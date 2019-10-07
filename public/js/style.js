function valida_form (){
    if(document.getElementById("name").value.length < 3){
    alert('Por favor, preencha o campo Nome/Razão Social');
    document.getElementById("name").focus();
    return false
    }
    if(document.getElementById("date").value.length < 3){
    alert('Por favor, preencha o campo data');
    document.getElementById("date").focus();
    return false
    }
    if(document.getElementById("record").value.length < 3){
    alert('Por favor, preencha o campo CPF/CNPJ');
    document.getElementById("record").focus();
    return false
    }
    if(document.getElementById("sex").value.length < 3){
    alert('Por favor, preencha o campo sexo');
    document.getElementById("sex").focus();
    return false
    }
    if(document.getElementById("email").value.length < 3){
    alert('Por favor, preencha o campo email');
    document.getElementById("email").focus();
    return false
    }
    if(document.getElementById("phoneP").value.length < 3){
    alert('Por favor, preencha o campo Telefone');
    document.getElementById("phoneP").focus();
    return false
    }
    if(document.getElementById("address").value.length < 3){
    alert('Por favor, preencha o campo rua');
    document.getElementById("address").focus();
    return false
    }
    if(document.getElementById("district").value.length < 3){
    alert('Por favor, preencha o campo bairro');
    document.getElementById("district").focus();
    return false
    }
    if(document.getElementById("numberHouse").value.length < 3){
    alert('Por favor, preencha o campo numero');
    document.getElementById("numberHouse").focus();
    return false
    }
    if(document.getElementById("city").value.length < 3){
    alert('Por favor, preencha o campo cidade');
    document.getElementById("city").focus();
    return false
    }
    if(document.getElementById("status").value.length < 3){
    alert('Por favor, preencha o campo estado');
    document.getElementById("status").focus();
    return false
    }
    if(document.getElementById("cep").value.length < 3){
    alert('Por favor, preencha o campo cep');
    document.getElementById("cep").focus();
    return false
    }
    if(document.getElementById("cod").value.length < 3){
        alert('Por favor, preencha o campo codigo do produto');
        document.getElementById("cod").focus();
        return false
    }
    if(document.getElementById("description").value.length < 3){
        alert('Por favor, preencha o campo descrição');
        document.getElementById("description").focus();
        return false
    }
    if(document.getElementById("brand").value.length < 3){
        alert('Por favor, preencha o campo marca');
        document.getElementById("brand").focus();
        return false
    }
    if(document.getElementById("priceNew").value.length < 3){
        alert('Por favor, preencha o campo preço entrada');
        document.getElementById("priceNew").focus();
        return false
    }
    if(document.getElementById("priceOld").value.length < 3){
        alert('Por favor, preencha o campo preço venda');
        document.getElementById("priceOld").focus();
        return false
    }
    if(document.getElementById("amount").value.length < 3){
        alert('Por favor, preencha o campo quantidade');
        document.getElementById("amount").focus();
        return false
    }
    if(document.getElementById("provider").value.length < 3){
        alert('Por favor, preencha o campo fornecedor');
        document.getElementById("provider").focus();
        return false
    }
    if(document.getElementById("invoice").value.length < 3){
        alert('Por favor, preencha o campo quantidade');
        document.getElementById("invoice").focus();
        return false
    }
}

 
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