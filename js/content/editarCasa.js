$(document).ready(function () {

    $('#guardarCambios').click(function () {
        guardarCambios();
    });
    $('#crearPropiedad').click(function () {
        crearPropiedad();
    });
    
    $('#ciudad')[0].disabled = true;
    
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
    var editarCiudad = $('#editar-ciudad').is(':checked');
    var tieneGarage = $('#editar-garage').is(':checked');

    $.ajax({url: 'actualizarDatosCasa.php',
        data: {
            datos: form,
            editarCiudad:editarCiudad,
            tieneGarage: tieneGarage
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
function crearPropiedad() {
    var form = jQuery('#editForm');
    var editarCiudad = $('#editar-ciudad').is(':checked');
    var tieneGarage = $('#editar-garage').is(':checked');

    $.ajax({url: 'nuevaPropiedad.php',
        data: {
            datos: form,
            editarCiudad:editarCiudad,
            tieneGarage: tieneGarage
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

