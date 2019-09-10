// Essa Função Garante Que Os JavaScript, Só Vão Ser Rodados Apos Toda A pagina serem Carregadas//


function Teste() {
    alert("cheguei aqui");
    return "XXXXX";
}

function serieTurno() {
    var nascimento = document.getElementById("nascimento").value;
    //var serie = document.getElementById("serie").value;
    console.log(nascimento);


    var dados = { nascimento }
    console.log(dados);

    $.ajax({
        url: "serieTurno.php",
        type: "GET",
        data: dados,

    }).done(function(response) {
        console.log(response);
        $('#turno').html(response);
        $("#serie_number").val('');
        $("#serie").val('');

    });
}

function cpfConsulta() {
    var cpf = document.getElementById("cpf").value;

    if (cpf.length != 14) return;

    var dados = { cpf }
    console.log(dados);

    $.ajax({
        url: "selecionarCPF.php",
        type: "GET",
        data: dados,

    }).done(function(response) {
        console.log(response);
        if (response > 0) {
            $("#nome").val('');
            $("#nome").prop("disabled", true);
            $.growl.warning({ title: "Responsável", message: ` O CPF: ${response} já consta no cadastro` });
            $("#adicionar_aluno").hide();


        } else {
            $("#nome").prop("disabled", false);

        }
    });
}


function serieConsulta() {
    var nascimento = document.getElementById("nascimento").value;
    var turno = document.getElementById("turno").value;
    //var serie = document.getElementById("serie").value;
    console.log(nascimento);
    console.log(turno);

    var dados = { nascimento, turno }
    console.log(dados);

    $.ajax({
        url: "serieConsulta.php",
        type: "GET",
        data: dados,

    }).done(function(response) {
        console.log(response);
        numero_serie = response.split("-", 6);
        console.log(numero_serie);
        $("#serie_number").val(numero_serie[0]);
        $("#serie").val(numero_serie[1]);


    });


}

function listar_config() {

    $("#tabela_config_body").html("");
    var action = "listar";

    $.ajax({
        url: "listarConfig.php",
        type: "POST",
        data: {
            action,

        },
        beforeSend: function() {

        },
        success: function(data) {
            console.log(data);
            $("#tabela_config_body").html(data);
        }
    });
}

function listar_series() {

    $("#tabela_serie_body").html("");
    var action = "listar";

    $.ajax({
        url: "listarSerie.php",
        type: "POST",
        data: {
            action,

        },
        beforeSend: function() {

        },
        success: function(data) {
            console.log(data);
            $("#tabela_serie_body").html(data);
        }
    });
}


function MascaraData(data) {
    if (document.getElementById(data).value.length == 2) document.getElementById(data).value += '/';
    if (document.getElementById(data).value.length == 5) document.getElementById(data).value += '/';
}


// Aqui Todas as chamadas do Jquery Devem ser carregadas//
$(document).ready(function() {

});