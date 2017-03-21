{extends file ='layout.tpl'}

{block name = contentBlock}
<div id="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Busqueda
                <small>Busca casas</small>
            </h1>
        </div>
    </div>
    <div id="filters" class="row">
        {include file = 'content/filters.tpl'}
    </div>
    <div id="houseListContainter">
        <h1>Casas</h1>
            {include file = 'content/houseList.tpl'}
    </div>
</div>
{/block}

{block name = scripts}
    <script type="text/javascript" src="./js/homepage.js"></script>
{/block}