function homePage() {

    this.options = {
        DOM: {
            filtros: "#filters",
            avanzada: "#busqueda-avanzada",
            selectCiudades: "#ciudad",
            filtrosAvanzados: "#filtros-avanzados",
            selectBarrios: "#barrios"
        },
        URL: {
            ciudades: 'ciudades_Ajax.php',
            barrios: 'barrios_Ajax.php'
        }
    };
}
;

homePage.prototype.init = function () {
    var self = this,
            opt = self.options;

    $(opt.DOM.avanzada).click(function () {
        var checked = $(this).prop("checked");
        var $filtros = $(opt.DOM.filtrosAvanzados);
        if (checked)
            $filtros.show();
        else
            $filtros.hide();
    });

    $(opt.DOM.selectCiudades).change(function () {
        var ciudadId = $(this).val();
        self.cargarBarrios(ciudadId);
    });

    self.cargarCiudades();
};

homePage.prototype.cargarCiudades = function () {
    var self = this,
            opt = this.options;

    $.ajax({
        url: opt.URL.ciudades
    }).done(function (data) {
        var ciudades = JSON.parse(data).datos;
        var opts = '<option value="0">Seleccione una ciudad</option>';
        for (var idx in ciudades) {
            var ciudad = ciudades[idx];
            opts += '<option value="' + ciudad.id + '">' + ciudad.nombre + '</option>';
        }
        $(opt.DOM.selectCiudades).html(opts);
    }).fail(function (err) {
        alert(JSON.stringify(err));
    });
};

homePage.prototype.cargarBarrios = function (ciudadId) {
    var self = this,
        opt = self.options;

    if (ciudadId !== undefined || ciudadId > 0) {
        $.ajax({
            url: opt.URL.barrios,
            dataType: 'html',
            data: {ciudadId: ciudadId}
        }).done(function (data) {
            var barrios = JSON.parse(data).datos;
            var opts = '<option value="0">Seleccione un barrio</option>';
            for (var idx in barrios) {
                var barrio = barrios[idx];
                opts += '<option value="' + barrio.id + '">' + barrio.nombre + '</option>';
            }
            $(opt.DOM.selectBarrios).html(opts);
        }).fail(function (err) {
            alert(JSON.stringify(err));
        });
    }
};

$(function () {
    var home = new homePage();
    home.init();
});


