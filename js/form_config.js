$("#form_config").submit(function(e) {
    e.preventDefault();
});



$("#salvar_config_confirm").click(function() {
    action = "inserir";
    dataIni = $("#dataIni").val();
    horaIni = $("#horaIni").val();
    dataFim = $("#dataFim").val();
    horaFim = $("#horaFim").val();
    cabecalho = $("#cabecalho").val();
    descricao = $("#descricao").val();
    observacao = $("#observacao").val();


    $.ajax({
        url: "salvarconfig.php",
        type: 'POST',
        data: {
            action,
            dataIni,
            horaIni,
            dataFim,
            horaFim,
            cabecalho,
            descricao,
            observacao,
        },
        success: function(data) {
            console.log(data);
        }

    });



});

$("#exportar").click(function() {
    window.location.href = "exportar.php";
});