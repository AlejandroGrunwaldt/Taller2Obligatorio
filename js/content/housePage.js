$(document).ready(function () {

    $('#guardarPregunta').click(function () {
        crearPregunta();
    });
});
function crearPregunta() {
    var pregunta = $('#pregunta').val();
    var url = window.location.href;
    var id = url.split('#').pop().split('=').pop();
    $.ajax({url: 'ingresarPregunta.php',
        data: {
            pregunta: pregunta,
            id: id
        },
        type: 'post',
        success: function (output) {
            alert(output);
            $('#pregunta').val("")
        },
        fail: function(output){
            alert(output);
        }
    });
}
