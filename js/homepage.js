function homePage() {

    this.options = {
        DOM: {
            filtros: "#filters",
            avanzada: "#busqueda-avanzada",
            selectCiudades: "#ciudad",
            filtrosAvanzados: "#filtros-avanzados",
            selectBarrios: "#barrios",
            filterForm: "#filter-form",
            pagination: ".pagination",
            casasContainer: "#casas",
            numbers: "#numbers",
            selectOperacion: "#tipo-operacion"
        },
        URL: {
            ciudades: 'ciudades_Ajax.php',
            barrios: 'barrios_Ajax.php',
            busqueda: 'buscarCasas.php',
        },
        currentPage: 1
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
        if (ciudadId > 0) {
            $(opt.DOM.selectBarrios).prop("disabled", false);
            self.cargarBarrios(ciudadId);
        } else {
            $(opt.DOM.selectBarrios).html('<option value="0">Seleccione un barrio</option>');
            $(opt.DOM.selectBarrios).prop("disabled", true);
        }
    });

    $(opt.DOM.filterForm).submit(function (e) {
        e.preventDefault();
        self.buscarCasas();
    });

    self.initPaginacion();

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

homePage.prototype.buscarCasas = function () {
    var self = this,
            opt = self.options,
            $form = $(opt.DOM.filterForm),
            $inputs = $form.find("input, select, button, textarea"),
            serializedData = $form.serialize().concat("&pagina=" + opt.currentPage);

    if ($(opt.DOM.selectCiudades).val() === "0") {
        alert("Debe seleccionar una ciudad");
    } else if ($(opt.DOM.selectOperacion).val() === "") {
        alert("Debe seleccionar un tipo de operacion");
    } else {
        $inputs.prop("disabled", true);
        var request = $.ajax({
            url: opt.URL.busqueda,
            type: "post",
            data: serializedData
        }).done(function (response, textStatus, jqXHR) {
            $(opt.DOM.casasContainer).html(response);
            self.initPaginacion();
            $("#" + opt.currentPage).addClass("active");
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                    );
        }).always(function () {
            $inputs.prop("disabled", false);
        });
    }
};

homePage.prototype.initPaginacion = function (){
    var self = this,
        opt = self.options;

    $(opt.DOM.pagination + " li a").click(function (e) {
        e.preventDefault();
        var $parent = $(this).parent('li');
        opt.currentPage = $parent.val();
        self.buscarCasas();
    });
};

$(function () {
    var home = new homePage();
    home.init();
});


