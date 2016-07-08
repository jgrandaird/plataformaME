<?php
function construir_barra_acciones($Menu){?>
    
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header" id="barra_acciones" >
            <?php foreach ($Menu as $contenido) { ?>
                <a href="<?php print $contenido["Funcion"]; ?>" class="navbar-brand" id="<?php print $contenido["Identificador"]; ?>" title="<?php print $contenido["Etiqueta"]; ?>">
                    <img src="<?php print $contenido["Imagen"]; ?>" alt="<?php print $contenido["Etiqueta"]; ?>"> </img>
                </a>
            <?php }
            ?>
            <br>
        </div>
    </div>
</nav>

    <?php
}?>

