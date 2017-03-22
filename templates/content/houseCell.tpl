<div class="col-lg-4">
    <div class="panel panel-info portfolio-item">
        <div class="panel-heading">
            <a href="./housePage.php?id={$casa.id}" target="_blank">
                {$casa.titulo}
            </a>
        </div>
        <div class="panel-body">
            <p>{$casa.texto|truncate:150:"...":true}</p>
            <p><strong>Barrio: </strong>{$casa.nombre}</p>
            <p><strong>Habitaciones: </strong>{$casa.habitaciones}</p>
            <p><strong>Baños: </strong>{$casa.banios}</p>
            <p><strong>Precio: </strong>${$casa.precio}</p>
        </div>
        <div class="col-lg-12">
            <a href="./pdfCasa.php?id={$casa.id}" class="btn btn-success" target="_blank">Descargar</a>
            {if isset($usuario)} 
                 <a href="./housePage.php?id={$casa.id}&e=T" target="_blank"  class="btn btn-default">Editar</a>
            {/if}  
        </div> 
    </div>
</div>