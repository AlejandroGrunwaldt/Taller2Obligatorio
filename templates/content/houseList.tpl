<div class="row" id="casas">
    {foreach from = $casas item=casa}
        {include file = 'content/houseCell.tpl'}
    {/foreach}
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12" id="numbers">
            <ul class="pagination">
                {for $i=1 to $paginas max = 20}
                    <li {if $i == 1}class="active"{/if} value="{$i}">
                        <a href="#">{$i}</a>
                    </li>
                {/for}
                {if $paginas > 20}
                    <li>
                        <a href="#">....</a>
                    </li>
                {/if}
            </ul>
        </div>
    </div>
</div>