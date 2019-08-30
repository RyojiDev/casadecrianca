$(document).ready(function () {

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

    var intervalo = setInterval(function () {
        clearInterval(intervalo);


        $("#carregando").fadeIn(1500);
        $.unblockUI();
    },
        1000);

    $(".cpf").mask('000.000.000-00', { reverse: true });

    $(".telefone").mask("(00) 0000-00009");

    $(".telefone").blur(function (event) {
        if ($(this).val().length == 15) {
            $(".telefone").mask("(00) 00000-0009")
        } else {
            $(".telefone").mask("(00) 0000-00009")
        }
    });

    $(".email").mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });

    $("#salvar_confirm").submit(function (e) {
        return false;

    });

    $("#salvar_confirm").click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "cadastro.php",
            type: 'POST',
            data: $("#form_cadastro").serialize(),
            success: function (data) {
                $("#receber_dados").html(data);
            }
        });


    });

    $("#nascimento").datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        endDate: "today",

    });



});