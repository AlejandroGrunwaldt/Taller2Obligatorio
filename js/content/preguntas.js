$(document).ready(function () {

    $('.guardarRespuesta').click(function () {
        var id = $(this).data("id");
        var textAreaId = "#" + id;
        var respuesta = $(textAreaId).val();
        guardarRespuesta(respuesta, id);
    });
});

function guardarRespuesta(respuesta, id) {
    $.ajax({url: 'responderPregunta.php',
        data: {
            respuesta: respuesta,
            id: id
        },
        type: 'post',
        success: function (response) {
            $("#contenido-preguntas").html(response);
            $('.guardarRespuesta').click(function () {
                var id = $(this).data("id");
                var textAreaId = "#" + id;
                var respuesta = $(textAreaId).val();
                guardarRespuesta(respuesta, id);
            });
        },
        fail: function(output){
            alert(output);
        }
    });
}
