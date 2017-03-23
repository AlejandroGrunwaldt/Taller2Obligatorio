$(document).ready(function () {

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

