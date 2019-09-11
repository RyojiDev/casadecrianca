$(document).ready(function() {
    $("#atualizar_config_confirm").hide();
    $("#salvar_config_confirm").show();

    $("#chamar_modal_config").click(function() {
        dataIni = $("#dataIni").val("");
        horaIni = $("#horaIni").val("");
        dataFim = $("#dataFim").val("");
        horaFim = $("#horaFim").val("");
        cabecalho = $("#cabecalho").val("");
        descricao = $("#descricao").val("");
        observacao = $("#observacao").val("");
        $("#atualizar_config_confirm").hide();
        $("#salvar_config_confirm").show();

    });
    //chama Listar configuracoes
    listar_config();


    $("#form_config").submit(function(e) {
        e.preventDefault();
    });

    // Metodo para salvar configuração

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

    // metodo para Listar Dados Dos Config


    function listar_config() {

        $("#tabela_config_body").html("");
        var action = "listar";

        $.ajax({
            url: "listarConfig.php",
            type: "POST",
            data: {
                action,

            },
            beforeSend: function() {

            },
            success: function(data) {
                console.log(data);
                $("#tabela_config_body").html(data);
            }
        });
    }


    // Metodo De mostrar as configuracoes para Atualizar , aqui captura o id no clique do botão

    $(document).on('click', '.atualizar_config', function() {

        action = "buscarano";
        let element = $(this);
        console.log(element);
        let id_config = element.attr('id');

        $.ajax({
            url: "atualizarconfig.php",
            type: "POST",
            data: {
                action,
                id_config,
            },
            success: function(data) {
                console.log(data);
                dados = data;
                config_json = JSON.parse(dados);
                console.log(config_json);
                $("#salvar_config_confirm").hide();
                $("#atualizar_config_confirm").show();
                $("#modal_config").modal("show");
                ano = $("#ano").val(config_json.ano);
                dataIni = $("#dataIni").val(config_json.data_ini);
                horaIni = $("#horaIni").val(config_json.hora_ini);
                dataFim = $("#dataFim").val(config_json.data_fim);
                horaFim = $("#horaFim").val(config_json.hora_fim);
                cabecalho = $("#cabecalho").val(config_json.cabecalho);
                descricao = $("#descricao").val(config_json.descricao);
                observacao = $("#observacao").val(config_json.observacao);

            },
            error: function() {

            }
        });
    });


    // Metodo De Atualizar a serie, após carregado , ao clicar no botão atualizar, faz update das series no banco

    $("#atualizar_config_confirm").click(function() {
        var action = "atualizar"
        id_ano = $("#ano").val();
        dataIni = $("#dataIni").val();
        horaIni = $("#horaIni").val();
        dataFim = $("#dataFim").val();
        horaFim = $("#horaFim").val();
        cabecalho = $("#cabecalho").val();
        descricao = $("#descricao").val();
        observacao = $("#observacao").val();



        $.ajax({
            url: "atualizarconfig.php",
            type: "POST",
            data: {

                id_ano,
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
                if (data == "" || data == undefined || data == false) {
                    $.growl.warning({ title: "Erro", message: "Ao atualizar as definições" });
                } else {
                    $.growl.notice({ title: "Sucesso", message: "Definições atualizadas com Sucesso!" });
                    $("#modal_config").modal("hide");


                    listar_config();
                }

            },
            error: function() {

            }

        });

    });




});