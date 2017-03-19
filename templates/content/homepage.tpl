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
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li value="0" id="back">
                    <a href="#">&laquo;</a>
                </li>
                {for $i=1 to $paginas max = 10}
                    <li {if $i == 1}class="active"{/if} value="{$i}">
                        <a href="#">{$i}</a>
                    </li>
                {/for}
                <li value="0" id="foward">
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{/block}

{block name = scripts}
    <script type="text/javascript" src="./js/homepage.js"></script>
{/block}