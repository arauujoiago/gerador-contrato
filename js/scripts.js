// FORMATADOR CAMPO CPF
/*
function formatacpf(campo, teclapres) {
    var tecla = teclapres.keyCode;
    var vr = new String(campo.value);
    vr = vr.replace(".", "");
    vr = vr.replace("/", "");
    vr = vr.replace("-", "");
    tam = vr.length + 1;
    if (tecla != 14) {
        if (tam == 4)
            campo.value = vr.substr(0, 3) + '.';
        if (tam == 7)
            campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.';
        if (tam == 11)
            campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.' + vr.substr(7, 3) + '-';

    }
}

*/

// FORMATADOR CAMPO RG

function formatarg(campo, teclapres) {
    var tecla = teclapres.keyCode;
    var vr = new String(campo.value);
    vr = vr.replace(".", "");
    vr = vr.replace("/", "");
    vr = vr.replace("-", "");
    tam = vr.length + 1;
    if (tecla != 14) {
        if (tam == 4)
            campo.value = vr.substr(0, 3) + '.';
        if (tam == 7)
            campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.';
    }
}

// FORMATADOR CAMPO CNPJ
/*
function formatacnpj(campo, teclapres) {
    var tecla = teclapres.keyCode;
    var vr = new String(campo.value);
    vr = vr.replace(".", "");
    vr = vr.replace("/", "");
    vr = vr.replace("-", "");
    tam = vr.length + 1;
    if (tecla != 14) {
        if (tam == 3)
            campo.value = vr.substr(0, 2) + '.';
        if (tam == 6)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
        if (tam == 10)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
        if (tam == 15)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
    }
}

// MUDA O CAMPO CPF/CNPJ

var cpf = document.getElementById('cpf');
var cpf_label = document.getElementById('cpf_label');

var cnpj = document.createElement('input');
var cnpj_label = document.createElement('label');
var att_class = document.createAttribute("class");
var att_maxlen = document.createAttribute("maxlength");
var att_onkeyup = document.createAttribute("onkeyup");
var att_placeholder = document.createAttribute("placeholder");
var att_name = document.createAttribute("name")

att_class.value = "form-control";
att_maxlen.value = "18";
att_onkeyup.value = "formatacnpj(this,event)";
att_placeholder.value = "XX.XXX.XXX/XXXX-XX";
att_name.value = "cnpj"

cnpj.setAttributeNode(att_class);
cnpj.setAttributeNode(att_maxlen);
cnpj.setAttributeNode(att_onkeyup);
cnpj.setAttributeNode(att_placeholder);
cnpj.setAttributeNode(att_name);

document.getElementById('pessoa').addEventListener('change', function() {
    if (this.value === 'juridica') {
        cnpj_label.innerHTML = 'CNPJ:';
        cpf_label.parentNode.replaceChild(cnpj_label, cpf_label);
        cpf.parentNode.replaceChild(cnpj, cpf);
    } else {
        cpf_label.innerHTML = 'CPF:';
        cnpj_label.parentNode.replaceChild(cpf_label, cnpj_label);
        cnpj.parentNode.replaceChild(cpf, cnpj);
    }
});

*/

// AUTOCOMPLETAR DO BANCO DE DADOS
$(document).ready(function() {
    $("#buscar-cpf").click(function() {
        var $nome = $("input[name='nome']");
        var $nacionalidade = $("input[name='nacionalidade']");
        var $profissao = $("input[name='profissao']");
        var $est_civ = $("input[name='est_civ']");
        var $cep = $("input[name='cep']");
        var $rua = $("input[name='rua']");
        var $bairro = $("input[name='bairro']");
        var $cidade = $("input[name='cidade']");
        var $estado = $("input[name='estado']");
        var $rg = $("input[name='rg']");
        var $numero = $("input[name='numero']");
        var $complemento = $("input[name='complemento']");
        $.getJSON('pages/function_db_material.php', {
            cpf: $("#cpf").val()
        }, function(json) {
            $nome.val(json.nome);
            $nacionalidade.val(json.nacionalidade);
            $profissao.val(json.profissao);
            $est_civ.val(json.est_civ);
            $rg.val(json.rg);
            $cep.val(json.cep);
            $rua.val(json.rua);
            $cidade.val(json.cidade);
            $bairro.val(json.bairro);
            $estado.val(json.estado);
            $cep.val(json.cep);
            $numero.val(json.numero);
            $complemento.val(json.complemento);
        });
    });
});

//AUTOCOMPLETAR CEP
$(document).ready(function() {
    $("#buscar-cep").click(function() {
        var $rua = $("input[name='rua']");
        var $numero = $("input[name='numero']");
        var $complemento = $("input[name='complemento']");
        var $bairro = $("input[name='bairro']");
        var $cidade = $("input[name='cidade']");
        var $estado = $("input[name='estado']");
        var $cep = $("input[name='cep']");
        $.getJSON('https://viacep.com.br/ws/' + $cep.val() + '/json/', {}, function(json) {
            $rua.val(json.logradouro);
            $numero.val(json.numero);
            $complemento.val(json.complemento);
            $bairro.val(json.bairro);
            $cidade.val(json.localidade);
            $estado.val(json.uf);
        });
    });
});

//ESCONDE MOSTRA CAMPOS
$(document).ready(function() {
    var $cargo = document.getElementById('cargo');
    $cargo.addEventListener('change', function() {
        if ($cargo.value == "ator") {
            $("#divDisciplina").fadeOut("slow");
            $("#divDisciplina2").fadeOut("slow");
        } else if ($cargo.value == "conteudista" || $cargo.value == "revisor") {
            $("#divDisciplina2").fadeOut("slow");
            $("#divDisciplina").fadeIn("slow");
        } else if ($cargo.value == "rev-abnt" || $cargo.value == "rev-lpt" || $cargo.value == "rev-lpt/abnt") {
            $("#divDisciplina").fadeOut();
            $("#divDisciplina2").fadeIn("slow");
        }
    });
});

// //BUSCAR NO BANCO -> TRAZ CONTEUDO DO SELECT CPF
// $(function() {
//     $('#buscar').click(function() {
//         $.getJSON('function2_db_material.php?search=', {
//             pessoa: $("#pessoa").val(),
//             horas: $("#horas").val(),
//             cargo: $("#cargo").val(),
//             nivel: $("#nivel").val(),
//             ajax: 'true'
//         }, function(j) {
//             if (j == null) {
//                 $('#cpf').html('<option value="">SEM REGISTROS!!!</option>');
//                 return false;
//             }
//             var options = '<option value="">SELECIONE UM CPF.</option>';
//             for (var i = 0; i < j.length; i++) {
//                 options += '<option value="' + j[i].cpf + '">' + j[i].cpf + '</option>';
//             }


//             $('#cpf').html(options);
//         })
//     });
// });