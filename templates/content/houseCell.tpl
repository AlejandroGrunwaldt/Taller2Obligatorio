<div class="col-md-3 portfolio-item">
    <a href="./housePage.php?id={$casa.id}">
        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
    </a>
    <p class='title'>{$casa.titulo} </p>
    {if $usuario}
        <div class=""> Editar </div>
        <div class=""> Eliminar </div>
    {/if}
</div>