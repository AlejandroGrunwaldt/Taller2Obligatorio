{extends file ='layout.tpl'}

{block name = contentBlock}
<div id='houseTemplate' class="col-lg-12">
    <div id='title' class="col-lg-8 col-lg-offset-2">
        <h1 style="text-align: center;">{$casa.titulo}</h1>
    </div>
    <div id='description' class="col-lg-12">
        <h2 style="text-align: center;">Descripción</h2>
        <p> {$casa.texto} </p>
    </div>
    <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Información
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            Tipo:
                            <span class="pull-right text-muted small"><em>{if $tipo == "A"}Apartamento{else}Casa{/if}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Precio:
                            <span class="pull-right text-muted small"><em>{$moneda} {$casa.precio}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Precio por Mts2:
                            <span class="pull-right text-muted small"><em>{$precioXMts2} {$moneda}/m2</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Ubicación:
                            <span class="pull-right text-muted small"><em>{$casa.barrio}, {$casa.ciudad}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Precio promedio del barrio:
                            <span class="pull-right text-muted small"><em>{$promedio} {$moneda}/m2</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Habitaciones:
                            <span class="pull-right text-muted small"><em>{$casa.habitaciones}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Baños:
                            <span class="pull-right text-muted small"><em>{$casa.banios}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Garage:
                            <span class="pull-right text-muted small"><em>{if $garage == 1}Si{else}No{/if}</em>
                            </span>
                        </div>
                        <div class="list-group-item">
                            Operación:
                            <span class="pull-right text-muted small"><em>{$operacion}</em>
                            </span>
                        </div>
                    </div>
                    <div class="btn btn-default btn-block">{if $precioXMts2 > $promedio}<label class="danger">Arriba del Promedio</label> {else}<label class="success"> Debajo del Promedio</label> {/if}</div>
                </div>
            </div>
        </div>
    <div id='entrarPregunta' class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Entrar preguntas
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Pregunta:</label>
                    <textarea id='pregunta' type="text" class="form-control" name="pregunta" width="100%"></textarea>
                </div>
                <input type='button' id='guardarPregunta' value="Submit">
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-lg-offset-2 panel panel-default imagen">
        {foreach from=$imagenes item=img}
            <img src="./imagenes/{$casa.id}/{$img}" />
        {/foreach}
    </div>
    <div id='questions' class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Preguntas
            </div>
            <div class="panel-body">
                <div class="list-group">
                    {if $preguntas}
                        {foreach from = $preguntas item=pregunta}
                            <div class="list-group-item">
                                <div class='pregunta'>{$pregunta.texto}</div>
                                <div class='respuesta'>{$pregunta.respuesta}</div>
                            </div>
                        {/foreach}
                    {else}
                         <div class="list-group-item">
                            <h3>No hay preguntas</h3>
                         </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <a href="./pdfCasa.php?id={$casa.id}" class="btn btn-success" target="_blank">Descargar</a>
</div>
{/block}
{block name = scripts}
    <script type="text/javascript" src="./js/content/housePage.js"></script>
    <link href="css/housePage.css" rel="stylesheet">
{/block}