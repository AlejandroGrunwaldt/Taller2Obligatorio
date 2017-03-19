$(document).ready(function () {

    $('#guardarRespuesta').click(function () {
        guardarRespuesta();
    });
});
function guardarRespuesta() {
    var respuesta = event.currentTarget.parentElement.previousElementSibling.value;
    var id = event.currentTarget.parentElement.parentElement.dataset.id;
    $.ajax({url: 'preguntas.php',
        data: {
            respuesta: respuesta,
            id: id
        },
        type: 'post',
        success: function (output) {
            alert(output);
        },
        fail: function(output){
            alert(output);
        }
    });
}
