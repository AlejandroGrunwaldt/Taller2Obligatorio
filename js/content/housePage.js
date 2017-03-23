$(document).ready(function () {

    $('#guardarPregunta').click(function () {
        crearPregunta();
    });

    if ($("#slides img").length > 1) {
        $("#slides").slidesjs({
            width: 900,
            height: 500
        });
    }
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
        fail: function (output) {
            alert(output);
        }
    });
}
