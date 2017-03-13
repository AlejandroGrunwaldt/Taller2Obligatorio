<div class="col-lg-12">
    <div class="col-lg-5">
        <div class="form-group">
            <label>Tipo de Operacion</label>
            <select class="form-control" id="tipo-operacion">
                <option value="N" selected="true"> - </option>
                <option value="V">Venta</option>
                <option value="A">Alquiler</option>
            </select>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label>Ciudad</label>
            <select class="form-control" id="ciudad">
                <option value="N" selected="true">...</option>
            </select>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="col-lg-5">
        <input type="checkbox" id="busqueda-avanzada"><label style="margin-left: 5px;"> Busqueda Avanzada</label>
    </div>
</div>
<div class="col-lg-12" hidden="true" id="filtros-avanzados">
    <div class="col-lg-2">
        <div class="form-group">
            <label>Tipo de Propiedad</label>
            <select class="form-control" id="tipo-propiedad">
                <option value="N" selected="true"> - </option>
                <option value="C">Casa</option>
                <option value="A">Apartamento</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>Barrio</label>
            <select class="form-control" id="barrios">
                <option value="N" selected="true">Seleccione un barrio</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>Cantidad de Habitaciones</label>
            <input class="form-control" type="number">
        </div>
    </div>
</div>