{extends file ='layout.tpl'}

{block name = contentBlock}
<div id='houseTemplate'>
    <div id='title'>
        <h1>{$casa.titulo}</h1>
    </div>
    <div id='description'>
        <h2>Descripción</h2>
        <p> {$casa.texto} </p>
        <br>
        <h2>Precio</h2>
        <p> {$casa.precio} </p>
        <br>
        <h2>Barrio</h2>
        <p> {$casa.barrio} </p>
        <br>
        <h2>Ciudad</h2>
        <p> {$casa.ciudad} </p>
        <br>
        <h2>Baños</h2>
        <p> {$casa.banios} </p>
        <br>
    </div>
    <div id='questions'>
        <h1>Preguntas</h1>
        {if $preguntas}
            {foreach from = $preguntas item=pregunta}
                <div class='pregunta'>{$pregunta.texto}</div>
                <div class='respuesta'>{$pregunta.respuesta}</div>
            {/foreach}
        {else}
            <h3>No hay preguntas</h3>
        {/if}
        <div id='entrarPregunta'>
            <h4>Entrar preguntas</h4>
            Pregunta: <input id='pregunta' type="text" name="pregunta"><br>
            <input type='button' id='submit' value="Submit">
        </div>
        
    </div>
</div>
{/block}