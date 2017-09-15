<?php
function construir_barra_acciones($Menu){?>
<br>
<nav class="navbar navbar-default " >
    <div class="container-fluid">
        <div class="navbar-header" id="barra_acciones" >
            
            <!-- <div class="tooltip-demo"> -->
            <?php foreach ($Menu as $contenido) { ?>
                <!--<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="<?php print $contenido["Etiqueta"]; ?>" id="<?php print $contenido["Identificador"]; ?>">-->
                <a href="<?php print $contenido["Funcion"]; ?>" class="navbar-brand" id="<?php print $contenido["Identificador"]; ?>" title="<?php print $contenido["Etiqueta"]; ?>"> <!-- data-toggle="tooltip" data-placement="bottom" -->
                    <img src="<?php print $contenido["Imagen"]; ?>" alt="<?php print $contenido["Etiqueta"]; ?>"> </img>
                </a>
                <!--    </button>-->
            <?php }
            ?>
            <!-- </div>-->
            
        </div>
    </div>
</nav>

<!-- 

<script>
//$('.tooltip-demo').tooltip({
  //      selector: "[data-toggle=tooltip]",
    //    container: "body"
    //})
</script>

-->



    <?php
}?>

