$(document).ready(function() {


    // Metodo De Salvar Series

    $("#salvar_series_confirm").submit(function(e) {
        e.preventDefault();
    });
    $("#salvar_series_confirm").click(function() {
        var action = "inserir"
        var serie = $("#serie_number").val();
        var turno = $("#turno").val();
        var serie_longa = $("#serie_longa").val();
        var data_ini = $("#data_Ini").val();
        var data_fim = $("#data_Fim").val();
        var vagas = $("#vagas").val();
        var matriculados = $("#matriculados").val();
        var caminho_pdf = $("#caminho_pdf").val();
        var observacao = $("#observacao_serie").val();
        $.ajax({

            url: "salvarserie.php",
            type: "POST",
            data: {
                action,
                serie,
                turno,
                serie_longa,
                data_ini,
                data_fim,
                vagas,
                matriculados,
                caminho_pdf,
                observacao
            },
            success: function(data) {
                if (data == 1) {
                    $.growl.warning({ title: "Série", message: "Já Cadastrada, Por favor insira uma nova Série" });


                } else {
                    $.growl.notice({ title: "Aluno", message: "Série adicionada com sucesso" });
                    console.log(data);
                    listar_series();
                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("deu erro");
            }

        });




    });

    $(document).on('click', '.atualizar_series', function() {
        action = "atualizar";
        let element = $(this);
        console.log(element);
        let id_serie = element.attr('id');
        id_cortado = id_serie.split("");

        id_s = id_serie[0];
        id_t = id_serie[1];

        $.ajax({
            url: "salvarserie.php",
            type: "POST",
            data: {
                action,
                id_s,
                id_t,
            },
            success: function(data) {
                console.log(data);
            },
            error: function() {

            }
        });


    });

});