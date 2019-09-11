$(document).ready(function() {
    // Assim que carregar a pagina, esconde botão atualizar do modal
    $("#atualizar_series_confirm").hide();
    // Metodo De Salvar Series

    listar_series();

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

    // Metodo Para Listar as series


    function listar_series() {

        $("#tabela_serie_body").html("");
        var action = "listar";

        $.ajax({
            url: "listarSerie.php",
            type: "POST",
            data: {
                action,

            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log(data);
                $("#tabela_serie_body").html(data);
            }
        });
    }

    // Metodo De mostrar as series para Atualizar , aqui captura o id no clique do botão

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
                if (data == "" || data == undefined || data == false) {
                    $.growl.warning({ title: "Erro", message: "Ao Buscar os dados, por favor verifique e tente novamente" });
                } else {


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

                }
            },
            error: function() {

            }
        });


    });



    // Metodo De Atualizar a serie, após carregado , ao clicar no botão atualizar, faz update das series no banco

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
            success: function(data) {
                console.log(data);
                if (data == "" || data == undefined || data == false) {
                    $.growl.warning({ title: "Erro", message: "Ao atualizar a Série" });
                } else {
                    $.growl.notice({ title: "Sucesso", message: "Série atualizada com Sucesso!" });
                    $("#modal_series").modal("hide");


                    listar_series();
                }

            },
            error: function() {

            }

        });

    });

});