$(document).ready(function () {

    $('#guardarCambios').click(function () {
        guardarCambios();
    });
    
    $('#editar-ciudad').click(function () {
        var checked = $(this).prop("checked");
        var $selectorCiudades = $('#ciudad');
        var $selectorBarrios = $('#barrios');
        if (checked){
            $selectorCiudades[0].disabled = false;
            $selectorBarrios[0].disabled = false;
        }else{
            $selectorCiudades[0].disabled = true;
            $selectorBarrios[0].disabled = true;
        }
    });
});
function guardarCambios() {
    var form = jQuery('#editForm');
    
    var url = window.location.href;
    var id = url.split('#').pop().split('=').pop();
    $.ajax({url: 'housesBD.php',
        data: {
            datos: form,
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

