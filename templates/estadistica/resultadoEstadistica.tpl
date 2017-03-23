<div class="col-lg-offset-3 col-lg-6">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td>Barrio</td>
                <td>Cantidad Disponible</td>
                <td>Promedio ({$moneda}/m2)</td>
            </tr>
        </thead>
        <tbody>
            {if $datos}
                {foreach from = $datos item=dato}
                    <tr>
                        <td>{$dato.barrio.nombre}</td>
                        <td>{$dato.cantidad}</td>
                        <td>{$dato.promedio}</td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="3">
                        No se encontraron datos
                    </td>
                </tr>
            {/if}
        </tbody>
    </table>
</div>