$(document).ready(function() {




    $("#adicionar_aluno").click(function() {

        if (cpfConsulta(cpf) != "") {

            action = "inserir_aluno",
                cpf = $("#cpf").val(),
                nome = $("#nome").val(),
                nascimento = $("#nascimento").val(),
                sexo = $("#sexo").val(),
                turno = $("#turno").val(),
                cpfresponsavel = $("#cpf_responsavel").val(),
                serie = $("#serie_number").val(),
                vaga = 0,
                nascimento = nascimento.split('/').reverse().join('-');

            $.ajax({
                url: "salvarmatricula.php",
                type: "POST",
                data: {
                    action,
                    cpf,
                    nome,
                    nascimento,
                    sexo,
                    turno,
                    cpfresponsavel,
                    serie,
                    vaga


                },
                success: function(data) {
                    console.log(data);
                    $("#cpf").val("");
                    $("#nome").val("");
                    $("#sexo").val("");
                    $("#nascimento").val("");
                    $("#turno").val("");
                    $("#serie").val("");
                    $.growl.notice({ title: "Aluno", message: "Adicionado com Sucesso!" });

                    listar_aluno_novo();

                },
                error: function() {

                }

            })
        } else {
            $.growl.warning({ title: "Responsável", message: "CPF Cadastrado, Digite um novo CPF" });


        }

    });


    //Listar Alunos Dinamicamente
    var action = "listar_aluno";
    cpfresponsavel = $("#cpf_responsavel").val(),

        $.ajax({
            url: "lista_alunos.php",
            type: "POST",
            data: {
                action,
                cpfresponsavel,



            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log(data);
                $("#tabela_matricula_body").html(data);

            }
        });


    validarForm();

    $("#cpf").change(validarForm);
    $("#nome").change(validarForm);
    $("#nacimento").change(validarForm);
    $("#sexo").change(validarForm);
    $("#turno").change(validarForm);
    $("#serie").change(validarForm);

    function validarForm() {

        if ($("#cpf").val().length > 0 && $("#nome").val().length > 0 && $("#nascimento").val().length > 0 && $("#sexo").val().length > 0 && $("#turno").val().length > 0 && $("#serie").length > 0) {
            $("#adicionar_aluno").css("display", "block");
        } else {

            console.log("nao estou caindo no if");

        }
    }

});

function listar_aluno_novo() {

    $("#tabela_matricula_body").html("");
    var action = "listar_aluno";
    cpfresponsavel = $("#cpf_responsavel").val(),

        $.ajax({
            url: "lista_alunos.php",
            type: "POST",
            data: {
                action,
                cpfresponsavel,



            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log(data);
                $("#tabela_matricula_body").html(data);
            }
        });
}