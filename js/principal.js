// Essa Função Garante Que Os JavaScript, Só Vão Ser Rodados Apos Toda A pagina serem Carregadas//

window.onload = function() {







}

function Teste() {
    alert("cheguei aqui");
    return "XXXXX";
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

var titulo = document.getElementById("h2");

function Enviar() {
    var cpf = document.getElementById("cpf");
    var nome = document.getElementById("nome");
    var sexo = document.getElementById("sexo");
    var nascimento = document.getElementById("nascimento");
    var turno = document.getElementById("turno");
    var serie = document.getElementById("serie");

    if (cpf.value != "") {
        alert('Obrigado sr(a) ' + cpf.value + nome.value + sexo.value + nascimento.value + turno.value +
            serie.value + ' os seus dados foram encaminhados com sucesso');
    }

}





function MascaraData(data) {
    if (document.getElementById(data).value.length == 2) document.getElementById(data).value += '/';
    if (document.getElementById(data).value.length == 5) document.getElementById(data).value += '/';
}


// Aqui Todas as chamadas do Jquery Devem ser carregadas//
$(document).ready(function() {

});