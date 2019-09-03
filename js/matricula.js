$("#adicionar_aluno").click(function() {
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
        }

    })

});