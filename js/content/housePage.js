$(document).ready(function () {

    $('#guardarPregunta').click(function () {
        crearPregunta();
    });
});
function crearPregunta() {
    var pregunta = jQuery('#pregunta').val();
    var url = window.location.href;
    var id = url.split('#').pop().split('=').pop();
    $.ajax({url: 'housesBD.php',
        data: {
            pregunta: pregunta,
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
