$(document).ready(function() {


    // Metodo De Salvar Series

    $("#salvar_series_confirm").submit(function(e) {
        e.preventDefault();
    });
    $("#salvar_series_confirm").click(function() {
        var action = "inserir"
        var ano = $("#ano").val();
        var serie = $("#serie_number").val();
        var serie_longa = $("#serie_longa").val();
        var data_ini = $("#data_Ini").val();
        var data_fim = $("#data_Fim").val();
        var vagas = $("#vagas").val();
        var caminho = $("#caminho_pdf").val();
        var observacao = $("#observacao_serie").val();
        $.ajax({

            url: "salvarserie.php",
            type: "POST",
            data: {
                action,
                ano,
                serie,
                serie_longa,
                data_ini,
                data_fim,
                vagas,
                caminho,
                observacao
            },
            success: function(data) {
                console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("deu erro");
            }

        });



    });


});