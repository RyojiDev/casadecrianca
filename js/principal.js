// Essa Função Garante Que Os JavaScript, Só Vão Ser Rodados Apos Toda A pagina serem Carregadas//

window.onload = function() {

    function block() {

        $("#cpf").val("");
        $("#nome").val("");
        $("#sexo").val("");
        $("#nascimento").val("");
        $("#turno").val("");
        $("#serie").val("");
        $.blockUI({
            message: "Aguarde...",
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                color: "#fff",
                "font-size": "16px",
                "font-weight": "bold"

            }

        });
    }

    var data = new Date();



    console.log("datas sao iguais");


    var count = 0;
    var aguardando = window.setInterval(function() {


        $("#aguardando").hide();


        $.ajax({
            url: "selecionarConfig.php",
            type: "POST",
            data: data,
            success: function(data) {
                console.log(data);
                if (data == "true") {
                    window.clearInterval(aguardando);
                    $("#enquantocarrega").hide();
                    $.unblockUI();
                    $("#aguardando").fadeIn();
                }
            }
        });

        console.log(count);



        console.log(data)

        count++;
    }, 1000);
}

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




function MascaraData(data) {
    if (document.getElementById(data).value.length == 2) document.getElementById(data).value += '/';
    if (document.getElementById(data).value.length == 5) document.getElementById(data).value += '/';
}


// Aqui Todas as chamadas do Jquery Devem ser carregadas//
$(document).ready(function() {

});