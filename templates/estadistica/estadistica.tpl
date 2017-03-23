{extends file ='layout.tpl'}

{block name = contentBlock}
    <div id='estadistica-template' class="col-lg-12">
        <div class="col-lg-12">
            <div class="col-lg-5">
                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" id="ciudad" name="ciudad">
                        <option value="" selected="true">...</option>
                    </select>
                </div>
            </div>
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
        </div>
        <div class="col-lg-12">
            <button id="buscar" type="button" class="btn btn-primary btn-lg" style="margin-left: 15px;">Buscar</button>
        </div>
    </div>
    <div class="col-lg-12" id="resultado">
        
    </div>
{/block}

{block name = scripts}
    <script type="text/javascript" src="./js/content/estadistica.js"></script>
{/block}