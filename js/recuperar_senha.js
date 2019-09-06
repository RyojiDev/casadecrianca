$(document).ready(function() {


    $("#btn_recuperar_senha").submit(function(e) {
        e.preventDefault();
    });
    $("#btn_recuperar_senha").click(function() {

        $.ajax({

            url: "send_ps.php",
            type: "POST",
            data: $("#form_recuperar_senha").serialize(),
            success: function(data) {
                console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {

            }

        });
        return false;

    });
});