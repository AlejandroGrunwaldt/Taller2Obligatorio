<div class="row">
    {foreach from = $productos item=prod}
        {include file = 'content/itemCell.tpl'prod=$prod}
    {/foreach}
    
</div>