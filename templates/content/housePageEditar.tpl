{extends file ='layout.tpl'}

{block name = contentBlock}
<form class="" action="housesBD.php" method="post">
    <div id='houseTemplate'>
        <div id='title'>
            <h1>{$casa.titulo}</h1>
        </div>
        <div id='description'>
            <h2>Descripción</h2>
            <input type="text" name="description" value="{$casa.texto}">
            <br>
            <h2>Precio</h2>
            <input type="text" name="description" value="{$casa.precio}">
            <br>
            <h2>Barrio</h2>
            <input type="text" name="description" value="{$casa.barrio}">
            <br>
            <h2>Ciudad</h2>
            <input type="text" name="description" value="{$casa.ciudad}">
            <br>
            <h2>Baños</h2>
            <input type="text" name="description" value="{$casa.banios}">
            <br>
        </div>
    </div>
</form>
{/block}