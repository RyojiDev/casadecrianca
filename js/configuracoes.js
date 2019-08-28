$(document).ready(function() {

    $("#cpf").mask('000.000.000-00', { reverse: true });


    $("#nascimento").datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',

    });



});