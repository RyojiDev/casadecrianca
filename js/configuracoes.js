$(document).ready(function() {

    function block() {

        $.blockUI({
            message: "Aguarde...",
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: .5,
                color: "#fff",
                "font-size": "16px",
                "font-weight": "bold"

            }

        });
    }

    block();

    var intervalo = setInterval(function() {
        clearInterval(intervalo);

        document.getElementById("carregando").style.display = "block";
        $.unblockUI();
    }, 1000);

    $("#cpf").mask('000.000.000-00', { reverse: true });


    $("#nascimento").datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',

    });



});