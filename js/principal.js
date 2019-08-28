// Essa Função Garante Que Os JavaScript, Só Vão Ser Rodados Apos Toda A pagina serem Carregadas//

window.onload = function() {



    function atualizarSeries() {
        var nascimento = document.getElementById("nascimento");
        var turno = document.getElementById("turno");
        console.log(nascimento.value);
        console.log(turno.value);
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

}

function MascaraData(data) {
    if (document.getElementById(data).value.length == 2) document.getElementById(data).value += '/';
    if (document.getElementById(data).value.length == 5) document.getElementById(data).value += '/';
}


// Aqui Todas as chamadas do Jquery Devem ser carregadas//
$(document).ready(function() {

});