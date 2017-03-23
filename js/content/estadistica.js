$(function(){
    cargarCiudades();
    
    $("#buscar").click(function(){
        obtenerEstadistica();
    });
});

function cargarCiudades() {
    $.ajax({
        url: 'ciudades_Ajax.php'
    }).done(function (data) {
        var ciudades = JSON.parse(data).datos;
        var opts = '<option value="0">Seleccione una ciudad</option>';
        for (var idx in ciudades) {
            var ciudad = ciudades[idx];
            opts += '<option value="' + ciudad.id + '">' + ciudad.nombre + '</option>';
        }
        $("#ciudad").html(opts);
    }).fail(function (err) {
        alert(JSON.stringify(err));
    });
};

function obtenerEstadistica() {
    var ciudad = $("#ciudad").val(),
        operacion = $("#tipo-operacion").val();
    if (ciudad === "0") {
        alert("Debe seleccionar una ciudad");
    } else if (operacion === "") {
        alert("Debe seleccionar un tipo de operacion");
    } else {
        $.ajax({
            url: 'estadistica_Ajax.php',
            type: "post",
            data: {idCiudad: ciudad, operacion: operacion}
        }).done(function (response, textStatus, jqXHR) {
            $("#resultado").html(response);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                    );
        });
    }
};


