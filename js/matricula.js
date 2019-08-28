window.onload = function() {



    // Focus = Changes the background color of input to yellow
    // onfocusin="focusFunction()" onfocusout="blurFunction()"
    function focusFunction() {
        var nascimento = document.getElementById("nascimento");
        var turno = document.getElementById("turno");
        var serie = document.getElementById("serie");
        console.log(nascimento.value);
        console.log(turno.value);
        console.log(serie.value);
        SeriesMenor($ano, nascimento, turno);
        // serie.value="ssssss";
    }

}