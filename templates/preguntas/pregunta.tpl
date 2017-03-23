<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">{$pregunta.texto}</h3>
    </div>
    <div class="panel-body">
        <textarea id="{$pregunta.id}" style="width: 100%;"></textarea>
        <div class="col-lg-12">
            <button class="btn-info pull-right guardarRespuesta" data-id="{$pregunta.id}">Responder</button>
        </div>
    </div>
</div>