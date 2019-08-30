$(document).ready(function() {

    var cpf_aluno;
    var senha_aluno;
    var nome_aluno;
    var telefone_aluno;
    var email_aluno;



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


            $("#carregando").fadeIn(1500);
            $.unblockUI();
        },
        1000);

    $(".cpf").mask('000.000.000-00', { reverse: true });

    $(".telefone_aluno").mask("(00) 0000-00009");

    $(".telefone_aluno").blur(function(event) {
        if ($(this).val().length == 15) {
            $(".telefone_aluno").mask("(00) 00000-0009")
        } else {
            $(".telefone_aluno").mask("(00) 0000-00009")
        }
    });

    $(".email_aluno").mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });

    $("#salvar_aluno_confirm").submit(function(e) {
        return false;

    });

    $("#salvar_aluno_confirm").click(function(e) {
        e.preventDefault();
        cpf_aluno = $("#cpf_aluno").val();
        senha_aluno = $("#senha_aluno").val();
        nome_aluno = $("#nome_aluno").val();
        telefone_aluno = $("#telefone_aluno").val();
        email_aluno = $("#email_aluno").val();

        $.ajax({
            url: "cadastro.php",
            type: 'POST',
            data: $("#form_cadastro_aluno").serialize(),
            success: function(data) {
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