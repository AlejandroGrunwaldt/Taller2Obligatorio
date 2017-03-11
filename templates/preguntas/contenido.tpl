<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Preguntas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row col-lg-12">
    {foreach from = $preguntas item = pregunta}
        {include file = 'preguntas/pregunta.tpl'}
    {/foreach}
</div>