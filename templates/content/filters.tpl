<form id="filter-form">
    <div class="col-lg-12">
        <div class="col-lg-5">
            <div class="form-group">
                <label>Tipo de Operacion</label>
                <select class="form-control" id="tipo-operacion" name="operacion">
                    <option value="" selected="true"> - </option>
                    <option value="V">Venta</option>
                    <option value="A">Alquiler</option>
                </select>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label>Ciudad</label>
                <select class="form-control" id="ciudad" name="ciudad">
                    <option value="" selected="true">...</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-5">
            <input type="checkbox" id="busqueda-avanzada" name="avanzada"><label style="margin-left: 5px;"> Busqueda Avanzada</label>
        </div>
    </div>
    <div class="col-lg-12" hidden="true" id="filtros-avanzados">
        <div class="col-lg-2">
            <div class="form-group">
                <label>Tipo de Propiedad</label>
                <select class="form-control" id="tipo-propiedad" name="propiedad">
                    <option value="" selected="true"> - </option>
                    <option value="C">Casa</option>
                    <option value="A">Apartamento</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label>Barrio</label>
                <select class="form-control" id="barrios" disabled="true" name="barrio">
                    <option value="" selected="true">Seleccione un barrio</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label>Cantidad de Habitaciones</label>
                <input class="form-control" type="number" name="habitaciones">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Precio</label>
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        <label>Desde</label>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="number" name="desde">
                    </div>
                    <div class="col-lg-2">
                        <label>Hasta</label>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="number" name="hasta">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label>Garaje</label>
                <select class="form-control" id="barrios" name="garaje">
                    <option value="" selected="true">Indistinto</option>
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-5">
            <div class="form-group">
                <label>Ordenar Por: </label>
                <select class="form-control" id="tipo-operacion" name="orden">
                    <option value="" selected="true"> - </option>
                    <option value="precio">Precio</option>
                    <option value="mts2">Metros cuadrados</option>
                </select>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label>Ascendente / Descendente</label>
                <select class="form-control" id="ciudad" name="forma">
                    <option value="" selected="true"> - </option>
                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendente</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 15px;">Buscar</button>
    </div>
</form>