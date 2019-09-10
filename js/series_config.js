$(document).ready(function() {

    $("#atualizar_series_confirm").hide();
    // Metodo De Salvar Series

    $("#chamar_modal_series").click(function() {

        $("#atualizar_series_confirm").hide();
        $("#salvar_series_confirm").show();
        $("#serie_number").val("");
        $("#turno").val("");
        $("#serie_longa").val("");
        $("#data_Ini").val("");
        $("#data_Fim").val("");
        $("#vagas").val("");
        $("#matriculados").val("");
        $("#caminho_pdf").val("");
        $("#observacao_serie").val("");

    });

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
        action = "buscarAnoSerieTurno";
        let element = $(this);
        console.log(element);
        let id_serie = element.attr('id');
        id_cortado = id_serie.split("");

        id_s = id_serie[0];
        id_t = id_serie[1];

        $.ajax({
            url: "atualizarseries.php",
            type: "POST",
            data: {
                action,
                id_s,
                id_t,
            },
            success: function(data) {
                console.log(data);
                dados = data;
                serie_json = JSON.parse(data);
                console.log(JSON.parse(dados));

                $("#serie_number").val(serie_json.serie);
                $("#turno").val(serie_json.turno);
                $("#serie_longa").val(serie_json.serie_longa);
                $("#data_Ini").val(serie_json.data_referencia_ini);
                $("#data_Fim").val(serie_json.data_referencia_fim);
                $("#vagas").val(serie_json.vagas);
                $("#matriculados").val(serie_json.matriculados);
                $("#caminho_pdf").val(serie_json.caminho_pdf);
                $("#observacao_serie").val(serie_json.observacao);

                $("#salvar_series_confirm").hide();
                $("#atualizar_series_confirm").show();


                $("#modal_series").modal("show");

            },
            error: function() {

            }
        });


    });





    $("#atualizar_series_confirm").click(function() {
        var action = "atualizar"
        var serie = $("#serie_number").val();
        var turno = $("#turno").val();
        var serie_longa = $("#serie_longa").val();
        var data_ini = $("#data_Ini").val();
        var data_fim = $("#data_Fim").val();
        var vagas = $("#vagas").val();
        var matriculados = $("#matriculados").val();
        var caminho_pdf = $("#caminho_pdf").val();
        var observacao = $("#observacao_serie").val();
        id_s = serie_json.serie;
        console.log(id_s);
        console.log(id_t);
        id_t = serie_json.turno;
        $.ajax({
            url: "atualizarseries.php",
            type: "POST",
            data: {

                id_s,
                id_t,
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
            success: function() {

            },
            error: function() {

            }

        });

    });

});