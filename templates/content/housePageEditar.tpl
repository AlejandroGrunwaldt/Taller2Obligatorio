{extends file ='layout.tpl'}

{block name = contentBlock}
<form class="" action="actualizarDatosCasa.php" method="post" id="editForm">
    <input id="idCasa" type="text" name="idCasa" value="{$casa.id}" hidden>
    <input id="editar" type="text" name="editar" value="true" hidden>
    <div id='houseTemplate'>
        <div id='title'>
            <h1>{$casa.titulo}</h1>
        </div>
        <div id='description'>
            <div>
                <h3>Descripción</h3>
                <textarea id="descripcionTA" style="width: 700px" form="editForm" rows="7" name="descripcionTA" value="">{$casa.texto}</textarea>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Tipo de Operacion</label>
                    <select class="form-control" id="tipo-operacion" name="operacion">
                        <option value="V" {if $casa.operacion = 'C'}selected{/if}>Venta</option>
                        <option value="A" {if $casa.operacion = 'C'}selected{/if}>Alquiler</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Tipo de Propiedad</label>
                    <select class="form-control" id="tipo-propiedad" name="propiedad">
                        <option value="C" {if $casa.propiedad = 'C'}selected{/if}>Casa</option>
                        <option value="A"{if $casa.propiedad = 'V'}selected{/if}>Apartamento</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Dar de baja</label>
                    <select class="form-control" id="tipo-propiedad" name="motivo_baja">
                        <option value="0" selected="true"> - </option>
                        <option value="1">Se vendio/alquilo</option>
                        <option value="2">Dueño se arrepintio</option>
                        <option value="3">Otros</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Precio</label>
                <input id="precio" type="text" name="precio" value="{$casa.precio}">
            </div>
            <div>
                <input type="checkbox" id="editar-ciudad" name="editar-ciudad"><label style="margin-left: 5px;"> Editar ciudad/barrio</label>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Ciudad actual: {$casa.ciudad}</label>
                    <select class="form-control" id="ciudad" name="ciudad">
                        <option value="N" selected="true">{$casa.ciudad}</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Barrio actual: {$casa.barrio}</label>
                    <input id="idBarrioActual" type="text" name="idBarrioActual" value="{$casa.barrio_id}" hidden>
                    <select class="form-control" id="barrios" disabled="true" name="barrio">
                        <option value="N" selected="true">...</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Baños</label>
                <input id="banios" type="text" name="banios" value="{$casa.banios}">
            </div>
            <div>
                <label>Habitaciones</label>
                <input id="habitaciones" type="text" name="habitaciones" value="{$casa.habitaciones}">
            </div>
            <div>
                <label>Mts2</label>
                <input id="mts2" type="text" name="mts2" value="{$casa.mts2}">
            </div>
            <div>
                <input type="checkbox" id="editar-garage" name="editar-garage"><label style="margin-left: 5px;">Garage</label>
            </div>
            
        </div>
    </div>
    <input type="submit" value="Guardar" id="guardarCambios">
</form>
{/block}
{block name = scripts}
    <script type="text/javascript" src="./js/homepage.js"></script>
    <script type="text/javascript" src="./js/content/editarCasa.js"></script>
{/block}